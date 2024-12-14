<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
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
}
