<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Reservasi extends Component
{
    public $reservasi, $totalReservasi,$modalActive = false, $toggleNotif = false, $message, $data, $q;

    protected $listeners = [
        "close-modal"=>"closeModal",
        "active-notification" => "activeNotification"
    ];

    public function mount(){
        
        $this->showReservasi();
        
    }
    public function render()
    {
        return view('livewire.admin.reservasi')->layout("layouts.admin");
    }

    public function showReservasi(){
        $token = Session::get(key: 'token');
        $response =  Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url').'/admin/reservasi');

        if($response->successful()){
            $this->reservasi = $response->json()['data'];
            $this->totalReservasi = $response->json()['total'];
        }

    }

    public function activeModal($count){
        
        $this->modalActive = true;
        $this->data['status'] =$this->reservasi[$count]['status'];
        $this->data['waktu_ambil'] =$this->reservasi[$count]['waktu_ambil'];
        $this->data['waktu_kembali'] =$this->reservasi[$count]['waktu_kembali'];
        $this->data['judul'] =$this->reservasi[$count]['buku']['judul'];
        $this->data['user'] =$this->reservasi[$count]['user']['name'];
        $this->data['id'] =$this->reservasi[$count]['id'];
        
    }
    public function activeNotification(){
        $this->message = "status reservasi telah di ubah menjadi di pinjam";
        $this->toggleNotif = true;
    }
    public function closeNotification(){
        
        $this->toggleNotif = false;
    }

    public function closeModal(){
        $this->modalActive = false;
    }

    public function search(){
        $reservasi = Reservation::find($this->q);

        if($reservasi ==  null){
            $this->reservasi = Reservation::all() ;
        }else{
            $this->reservasi = $reservasi;
        }
    }


}
