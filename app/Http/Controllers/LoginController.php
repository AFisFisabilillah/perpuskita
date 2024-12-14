<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => "required|email",
            'password' => "required"
        ]);

       

        $user = User::where('email', $request['email'])->first();
        if(!$user||!Hash::check($request->password, $user->password)){

            return response()->json([
                "succes" => "false",
                "messege" => "Maaf email atau password salah"
            ], 401);

        }

        return new AuthResource(true, "succes for login", $user->createToken('authToken')->plainTextToken);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return new AuthResource(true, "succes for login","");
    }


    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['email:dns', 'required', 'lowercase', 'unique:'.User::class],
            'password'=>['required', 'min:6']
        ]);

        $user=$request->only(['name', 'email']);
        $user['password'] = Hash::make($request['password']);

        $user = User::create($user);
        
        return new AuthResource(true, "succes for login", $user->createToken('authToken')->plainTextToken);
    }

   
    

}
