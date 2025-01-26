<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function profile()
    {
        if(!cache()->has("profile_key")){
            $cache = Cache::remember('profile_key', 10, function () {
                return Auth::user();
            });;
        }
       

        return response()->json(Auth::user());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['email:dns', 'required', 'lowercase', 'unique:' . User::class],
            'password' => ['required', 'min:6']
        ]);
        $user = $request->only(['name', 'email']);
        $user['password'] = Hash::make($request['password']);
        $user = User::create($user);
        return response()->json([
            "status" => true,
            "message" => "berhasil membuat akun",
            "data" => []
        ]);
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['email:dns', 'required', 'lowercase', 'unique:' . User::class],
            'password' => ['required', 'min:6']
        ]);
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "User not found",
                "data" => []
            ], 404);
        }

        $user->update($valid);
        return response()->json([
            "status" => true,
            "message" => "User berhasil di ubah",
            "data" => [$user]
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);


        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "User not found",
                "data" => []
            ], 404);
        }
        $user->delete($id);
        return response()->json([
            "status" => true,
            "message" => "User berhasil di hapus",
            "data" => [$user]
        ], 200);
    }

    public function userReservasi()
    {
        // Cek apakah data reservasi sudah ada di cache
        $reservasiFinal = Cache::remember('user_' . Auth::id() . '_reservasi', 1, function () {
            // Mengambil data reservasi dengan relasi buku
            $reservasi = Auth::user()->reservation()->with('buku')->get();

            return $reservasi->map(function ($item) {
                $item->judul_buku = $item->buku->judul; // Menambahkan judul buku
                $item->image = $item->buku->image;
                unset($item->buku); // Menghapus relasi buku yang tidak diperlukan
                return $item;
            });
        });

        

        return response()->json([
            "status" => true,
            "name" => Auth::user()->name,
            "image" => Auth::user()->image,
            "email" => Auth::user()->email,
            "message" => "reservasi milik " . request()->user()->name,
            "total" => $reservasiFinal->count(),
            "data" => $reservasiFinal
        ]);
    }

    public function historyUser(){
        $history =  History::with("user:id,name","buku:id,judul,image")->where("user_id", Auth::id())->get();
        if(!$history){
            return response()->json([
                'status'=> false,
                'message'=>"maaf kamu belum perah meminjam nuku"
            ], 404);
        }
        return response()->json([
            'status' => true,
            "message"=>"ini adalah history bukuyang pernah kamu pinjam",
            "data" => $history
        ]);
    }

    public function uploadProfile(Request $request){
        $filename = $request->only("image");
        $user = User::where("id",Auth::id())->update([
            "image" => $filename['image']
        ]);
       return response()->json([
        "message" => "berhasil menambahkan gambar" 
       ]);
    }

   
}
