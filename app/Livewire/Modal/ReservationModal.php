<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Livewire\Admin\Reservasi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ReservationModal extends Component
{
    public $status,$id, $message, $judul, $user, $waktuAmbil;
    public function render()
    {
        
        return view('livewire.modal.reservation-modal');
    }

    public function closeModal()
    {
        $this->dispatch("close-modal")->to(Reservasi::class);
    }

    public function getMessageStatus()
    {
        if ($this->status == "pending") {
            $message = "Apakaha kamu ingin mengubah status reservasi menjadi pinjam ?";
        } else {
            $message = "apakah kamu ingin mengubah status reservasi menjadi selesai ";
        }
        return $message;
    }

    public function buttonAction(){
        if ($this->status == "pending") {
            $token = Session::get(key: 'token');
            $response =  Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->patch('http://127.0.0.1:8000/api/admin/reservasi/accept/'.$this->id);
            $this->message = $response->json()['message'];
            $this->closeModal();
            $this->dispatch("active-notification",  $this->message);
            $this->message = '';
        } else{
            $token = Session::get(key: 'token');
            $response =  Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->patch('http://127.0.0.1:8000/api/admin/reservasi/finish/'.$this->id);
            $this->message = $response->json()['message'];
            $this->closeModal();
            $this->dispatch("active-notification",  $this->message." dengan denda ".$this->denda());
        }
    }

    public function getDateNow(){
        return Carbon::now()->format("Y-m-d");
   }

   public function denda(){
    $tanggalPinjam = Carbon::parse($this->waktuAmbil);
        $tanggalKembali =  Carbon::now();

        $selisihHari = $tanggalPinjam->diffInDays($tanggalKembali);

        if ($selisihHari > 5) {
            return  ($selisihHari - 5) * 10000;
        } else {
            return  0;
        }
   }
}
