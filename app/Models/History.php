<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "histories";
    protected $fillable = ["reservasi_id", "buku_id", "user_id", "waktu_pinjam", "waktu_kembali"];
    public $timestamps = false;

    public function buku(){
        return $this->belongsTo(Buku::class)->withTrashed();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
