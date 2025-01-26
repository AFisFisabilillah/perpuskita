<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Buku extends Component
{
    public $buku, $q = '';
    public function render()
    {
        return view('livewire.buku')->title('buku');
    }

    public function mount()
    {
        if (!session()->has('token')) {
            redirect()->route('home');
        } else {
            $token = Session::get(key: 'token');
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->get(config('app.api_url') . '/buku');

            $this->buku = $response->json()['data'];
        }
    }

    public function deleteSearch()
    {
        $token = Session::get(key: 'token');
        $this->q = '';
    }

    public function search()
    {
        $token = Session::get(key: 'token');
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url') . '/admin/buku/search?q=' . $this->q);
        $this->buku = $response->json()['data'];

        if (Str::of($this->q)->trim()->isEmpty()) {
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->get(config('app.api_url') . '/buku');

            $this->buku = $response->json()['data'];
        }
    }
}
