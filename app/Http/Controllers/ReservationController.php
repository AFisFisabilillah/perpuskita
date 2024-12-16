<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\History;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        $validasiReservation =  $request->validate([
            "buku_id" => ["required", "exists:buku,id"],
            "waktu_ambil" => ["required", "date"]
        ]);
        //mengambil dari user yang sedang login
        $validasiReservation['user_id'] = $request->user()->id;

        $validasiReservation['waktu_reservasi'] = Carbon::now();

        $buku = Buku::find($validasiReservation['buku_id']);
        if ($buku->status != "tersedia") {
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
        return response()->json([
            "status" => true,
            "message" => "reservasi berhasil di buat",
            "data" => [
                'user' => $reservasi->user->name,
                'buku' => $reservasi->buku->judul,
                'waktu_ambil' => $reservasi->waktu_ambil,
                'waktu_reservasi' => $reservasi->waktu_reservasi,
                'status' => $reservasi->status
            ]
        ]);
    }
    public function delete(string $id)
    {
        
        $reservasi = Reservation::findOr($id);
        if($reservasi->user_id != request()->user()->id){
            return "";
        }
        
        if (!$reservasi) {
            return response()->json([
                "status" => false,
                "message" => "not found id buku",
                "data" => []
            ], 404);
        }

        $reservasi->buku->update([
            "status" => "tersedia"
        ]);

        $reservasi->delete();

        return response()->json([
            "status" => true,
            "message" => "Reservasi berhasil dihapus",
            "data" => []
        ]);
    }

    public function reservasiAccept(Reservation $reservasi)
    {
        if($reservasi->status == "dipinjam"){
            return response()->json([
                "status" => false,
                "message" => 'maaf status reservasi sudah  dipinjam terlebih dahulu'
            ]);
        }else if($reservasi->status == "selesai"){
            return response()->json([
                "status" => false,
                "message" => 'maaf reservasi sudah selesai'
            ]);
        }

        $reservasi->update([
            "status" => "dipinjam"
        ]);
        $reservasi->buku->update([
            "status" => "pinjam"
        ]);

        return response()->json([
            "status" => true,
            "message" => "status reservasi telah di ubha meanjadi pinjam"
        ]);
    }

    public function reservasiFinish(Reservation $reservation)
    {

        if($reservation->status == "pending"){
            return response()->json([
                "status" => false,
                "message" => 'maaf status reservasi harus di pinjam terlebih dahulu'
            ]);
        }else   if($reservation->status == "selesai"){
            return response()->json([
                "status" => false,
                "message" => 'maaf reservasi sudah selesai'
            ]);
        }

        //mengubah status di pinjam menjadi selesai 
        $reservation->update([
            "status" => "selesai"
        ]);

        //mengubah status buku menjadi tersedia
        $reservation->buku->update([
            "status" => "tersedia"
        ]);

        $tanggalPinjam = Carbon::parse($reservation->waktu_pinjam);
        $tanggalKembali =  Carbon::now();

        $selisihHari = $tanggalPinjam->diffInDays($tanggalKembali);

        if ($selisihHari > 5) {
            $denda =  ($selisihHari - 5) * 10000;
        } else {
            $denda = 0;
        }


        History::create([
            "buku_id" => $reservation->buku->id,
            "user_id" => $reservation->user->id,
            "waktu_pinjam" => $reservation->waktu_reservasi,
            "waktu_kembali" => Carbon::now()
        ]);

        return  response()->json([
            "status" => true,
            "message" => "buku telah di kembalikan",
            "data" => [
                "denda" => $denda
            ]
        ]);
    }

    public function show()
    {
        return response()->json([
            "status" => true,
            "message" => "ini adlah semua reservasi",
            "total" => Reservation::count(),
            "data" => Reservation::all()
        ], 200);
    }
}
