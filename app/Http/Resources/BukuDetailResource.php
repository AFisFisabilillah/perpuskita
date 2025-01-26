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
            'tahun_terbit' => $this->tahun_terbit,
            'status' => $this->resource->status,
            'penerbit' => $this->penerbit,
            'image' => $this->image

        ];
    }

    public function with($request){
        return[
            "status" => $this->status,
            "message" => $this->messege
        ];
    }
}
