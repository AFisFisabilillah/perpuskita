<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardAdmin extends Component
{

    public $nama, $email;

    public function render()
    {
        return view('livewire.dashboard-admin')->layout('layouts.admin');
    }

    public function mount()
    {

        if (!session()->has('token')) {
            redirect()->route('login');
        } else {
            $token = Session::get(key: 'token');

            $response =  Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->get(config('app.api_url') . '/profile');


            $data = $response->json();

            if ($data['isAdmin'] != 'admin') {
                redirect()->route('home');
            }

            $this->nama = $data['name'];
            $this->email = $data['email'];
        }
    }
}
