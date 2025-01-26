<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Cookie;

class Register extends Component
{
    public $email, $name, $password;

    public function mount()
    {
        if (session()->has('token')) {
            redirect()->route('home');
        }
    }
    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'email' => ['email', 'required', 'lowercase', 'unique:' . User::class],
            'password' => ['required', 'min:6']
        ]);

        $user = ["email"=>$this->email,"name"=>$this->name];
        $user['password'] = Hash::make($this->password);

        $user = User::create($user);
        Auth::login($user);
        event(new Registered($user));
        
        return redirect()->route('verification.notice');
    }
}
