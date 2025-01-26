<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ShowBuku extends Component
{
    public $toggle = false;
    public String $id;
    public $toggleNotif, $error = null;
    public $waktuReservasi = '';
    public $waktuKembali = '';
    public $buku;
    public function render()
    {
        return view('livewire.show-buku')->title('showbuku');
    }

    public function mount()
    {
        if (!session()->has('token')) {
            redirect()->route('home');
        }

        $token = Session::get(key: 'token');
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url') . '/buku/' . $this->id);

        $this->buku = $response->json()['data'];
    }

    public function reservation()
    {

        $user = Auth::user();
        if ($user->reservation->count() > 3) {
            $this->toggle = false;
            $this->addError('waktu', 'Maaf Anda sudah reservasi anda tidak boleh lebih dari 3 ');
            session()->flash('reservation_succes');
            $this->toggleNotif = true;

            $this->reset('waktuReservasi');
        } else {
            $token = Session::get(key: 'token');
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->post(config('app.api_url') . '/reservasi/add', [
                'buku_id' => $this->id,
                'waktu_ambil' => $this->waktuReservasi,
                'waktu_kembali' => $this->waktuKembali
            ]);
            $this->toggleNotif = true;
            $this->toggle = false;


            if ($response->successful()) {
                session()->flash('reservation_succes');
                $buku['status'] = 'reservasi';
            }

            if ($response->unprocessableEntity()) {
                $this->addError('waktu', $response->json()['message']);
                session()->flash('reservation_succes');
            }

            $this->error = null;
        }
    }

    public function updatedWaktuReservasi()
    {

        $this->waktuKembali = Carbon::parse($this->waktuReservasi)->addDays(5)->toDateString();
    }
    public function toggleActive()
    {
        $this->toggle = true;
    }

    public function toggleDisable()
    {
        $this->toggle = false;
    }

    public function toggleNotifDisable()
    {
        $this->toggleNotif = false;
    }
}
