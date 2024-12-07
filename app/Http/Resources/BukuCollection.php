<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BukuCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ["Buku" => $this->collection->map(function ($buku) {
            return [
                'judul' => $buku->judul,
                'sinopsis' => $buku->sinopsis,
                'penulis' => $buku->penulis,
                'tahun_penerbit' => $buku->tahun_penerbit,
                'penerbit' => $buku->penulis,
                'status' => $buku->status
            ];
        })];
    }
}
