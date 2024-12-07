<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource{

    private $status;
    private $messege;
    public $resource;

    public function __construct($status, $messege, $resource){
        parent::__construct($resource);
        $this->status = $status;
        $this->messege = $messege;
    }
    
    public function toArray(Request $request): array
    {
        return[
            "token" => $this->resource
        ];
    }

    public function with(Request $request){
        return [
            "status" => $this->status,
            "messege" => $this->messege
        ];
    }
}
