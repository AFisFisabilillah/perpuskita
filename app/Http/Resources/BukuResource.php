<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{
    private $status, $messege;
    public $resource;
    public function __construct($status, $messege, $resource){

        parent::__construct($resource);
        $this->status = $status;
        $this->messege = $messege;

    }

   

    public function toArray(Request $request): array
    {
        return $this->resource;
    }

    public function with(Request $request){
        return [
            "status" => $this->status,
            "messege" => $this->messege
        ];
    }
}
