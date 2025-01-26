<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    protected $table = "reservations";
    protected $fillable = ["user_id", "buku_id","waktu_reservasi","waktu_ambil","status",'waktu_kembali'];
   
    public $timestamps = false;

    

    public function user(){
        return $this->belongsTo(User::class, "user_id",'id' );
    }

    public function buku()  {
        return $this->belongsTo(Buku::class);
    }

    
}
