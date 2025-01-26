<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use SoftDeletes;
    protected $table = 'Buku';
    use HasFactory;
    protected $guarded = ['id'];

    protected $filable = ['judul', 'sinopsis', 'penulis','tahun_terbit','penerbit','status', 'image'];
}
