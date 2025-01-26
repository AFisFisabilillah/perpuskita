<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use function PHPUnit\Framework\isNull;

class Profile extends Component
{
    public $reservasi, $history, $nama, $email, $id, $toggle, $image,  $uploadToggle = false, $pathImage;
    use WithFileUploads; // Menambahkan trait untuk menangani file upload

    protected $listeners = [
        "get-image" => "getImage",
    ];
    public function mount()
    {
        if (!session()->has('token')) {
            redirect()->route('home');
        }

        if ($this->id === null) {
            $token = Session::get(key: 'token');

            $response =  Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->get(config('app.api_url').'/reservasi');

            if ($response->successful()) {
                $this->nama = $response->json()['name'];
                $this->email = $response->json()['email'];
                $this->reservasi = $response->json()['data'];
                $this->pathImage = $response->json()['image'];
            }
        }
    }

    public function getImage($path)
    {
        $this->pathImage = $path;
    }

    public function render()
    {
        return view('livewire.profile')->title('profile');
    }

    public function deleteReservasi($id)
    {

        $token = Session::get(key: 'token');
        $response =  Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->delete(config('app.api_url').'/reservasi/delete/' . $id);

        if ($response->successful()) {
            $this->toggle = true;
            $this->reservasi = array_filter($this->reservasi, function ($item) use ($id) {
                return $item['id'] !== $id; // Kecualikan item yang dihapus
            });
        }
    }

    public function closeNotif()
    {
        $this->toggle = false;
    }

    public function showHistory()
    {
        $token = Session::get(key: 'token');

        $response =  Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url').'/history');

        if ($response->successful()) {

            return $response->json()['data'];
        } elseif ($response->notFound()) {
            return $response->json()['message'];
        }
    }

    public function uploadPhoto()
    {
        $this->validate([
            "image" => "required|image|file|max:8080"
        ]);
        $path = $this->image->store("profile");

        Storage::disk("public")->deleteDirectory("livewire-tmp");
        $token = Session::get(key: 'token');

        if($this->pathImage != "nullProfile.jpg"){
            Storage::disk("public")->delete("profile/".$this->pathImage);

        }


        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->post(config('app.api_url').'/upload', [
            "image" => basename($path)
        ]);

        if ($response->successful()) {
            $this->uploadToggle = false;
            $this->pathImage = $path;
        }
    }

    public function activeToggleUpload()
    {
        $this->uploadToggle = true;
    }
    public function closeToggleUpload()
    {
        $this->uploadToggle = false;
    }
}
