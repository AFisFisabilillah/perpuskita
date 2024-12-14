<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'Buku';
    use HasFactory;
    protected $guarded = ['id'];

    protected $filable = ['judul', 'sinopsis', 'penulis','tahun_terbit','penerbit','status'];
}
