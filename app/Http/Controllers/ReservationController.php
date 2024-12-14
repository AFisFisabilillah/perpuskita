<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller{
    public function reservation(Request $request){
        $validasiReservation =  $request->validate([
            "user_id"=> ["required", "exists:users,id"],
            "buku_id" =>["required", "exists:buku,id"],
            "waktu_ambil" => ["required", "date"]
        ]);

        $validasiReservation['waktu_reservasi'] = Carbon::now();
        $buku = Buku::find( $validasiReservation['buku_id']);
        if($buku->status != "tersedia"){
            return response()->json([
                "status" => false, 
                "message" => "buku sudah di reservasi atau di pinajam",
                "data" => []
            ]);
        }

        $reservasi = Reservation::create($validasiReservation);
        $buku->update([
            "status" => "reservasi"
        ]);

        dd($reservasi->buku()->judul);

        return response()->json([
            "status" => true,
            "message"=> "reservasi berhasil di buat",
            "data" => [
                'user' => $reservasi->user(),
                'buku' => $reservasi->buku(),
                'waktu_ambil' => $reservasi->waktu_ambil,
                'waktu_reservasi' => $reservasi->waktu_reservasi,
                'status' => $reservasi->status
            ]
        ]);
    }
}
