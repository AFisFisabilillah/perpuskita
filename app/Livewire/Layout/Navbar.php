<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Navbar extends Component
{
    public $nama, $email, $image;

    public function render()
    {
        return view('livewire.layout.navbar');
    }

    public function mount(){

        $token = Session::get(key: 'token');
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url').'/profile');
        if($response->successful()){
            $this->nama = $response->json()['name'];
            $this->email = $response->json()['email'];
            $this->image = $response->json()['image'];
            $this->dispatch("get-image",  $response->json()['image']);
        }
        
    }

    public function logout(){
        $token = Session::get(key: 'token');
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get('http://127.0.0.1:8000/logout');
        session()->forget('token');
        return redirect()->route('home');
    }
}
