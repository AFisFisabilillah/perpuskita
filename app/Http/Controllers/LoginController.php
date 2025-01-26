<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Mockery\Generator\StringManipulation\Pass\Pass;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users,email",
        ]);



        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json([
                "succes" => "false",
                "messege" => "Maaf email atau password salah"
            ], 401);
        }

        return new AuthResource(true, "succes for login", $user->createToken('authToken')->plainTextToken);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return new AuthResource(true, "succes for login", "");
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['email:dns', 'required', 'lowercase', 'unique:' . User::class],
            'password' => ['required', 'min:6']
        ]);

        $user = $request->only(['name', 'email']);
        $user['password'] = Hash::make($request['password']);

        $user = User::create($user);
        event(new Registered($user));
        return new AuthResource(true, "succes for login", "");
    }


    public function sendResetLink(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Kirim email reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Respon berdasarkan hasil
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6'
        ]);

        $status =  Password::reset($request->only(['email', 'token', 'password']), function (User $user , string $password){
            $user->forceFill([
                'password' => Hash::make($password)
            ]);
            $user->save();
        });

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}
