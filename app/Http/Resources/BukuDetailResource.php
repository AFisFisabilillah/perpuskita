<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuDetailResource extends JsonResource
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
        return[
            'judul'=> $this->judul,
            'sinopsis' => $this->sinopsis,
            'penulis' => $this->penulis,
            'tahun_penerbit' => $this->tahun_penerbit,
            'penerbit' => $this->penerbit,
        ];
    }

    public function with($request){
        return[
            "status" => $this->status,
            "message" => $this->messege
        ];
    }
}
