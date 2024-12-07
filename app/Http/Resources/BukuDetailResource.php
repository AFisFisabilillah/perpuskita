<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'judul'=> $this->judul,
            'sinopsis' => $this->sinopsis,
            'penulis' => $this->penulis,
            'tahun_penerbit' => $this->tahun_penerbit,
            'penerbit' => $this->penerbit,
            'status' => $this->status
        ];
    }
}
