<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class History extends Component
{
    public $histories;
    public function render()
    {
        return view('livewire.admin.history')->layout('layouts.admin');
    }

    public function mount(){
        $token = Session::get(key: 'token');
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url').'/admin/history');

        if ($response->forbidden()) {
            redirect()->route('home');
        }

        if($response->successful()){
             $this->histories = $response->json()["data"];
           
        }
    }
}
