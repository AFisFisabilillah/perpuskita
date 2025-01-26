<?php

namespace App\Livewire\Admin;

use App\Models\Buku;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminBuku extends Component
{
    use WithFileUploads;

    public $buku;
    public $judul, $penulis, $penerbit, $tgl, $sinopsis, $id, $counter, $image = null, $pathImage = null;
    public $toggleNotif=false, $toggle = false, $q;
    public $message='';

    public $updateToggle = false; 

    public function mount(){
        $this->showBuku();
    }
    public function render()
    {
        return view('livewire.admin.admin-buku')->layout('layouts.admin');
    }

    public function showBuku(){

        $token = Session::get(key: 'token');

        $response =  Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url').'/buku');

       
        $this->buku =$response->json()['data'];
    }

    public function addBuku(){

        if($this->image != null){  
          
            $path = $this->image->store("buku");
            $this->pathImage = basename($path);
            Storage::disk("public")->deleteDirectory("livewire-tmp");
        }else{
            $this->pathImage = 'nullProfile.jpg';
        }
        

        $token = Session::get(key: 'token');
        $response =  Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->post(config('app.api_url').'/admin/buku/add', [
            "judul" => $this->judul,
            "penulis" => $this->penulis,
            "penerbit" => $this->penerbit,
            "tahun_terbit" => $this->tgl,
            "sinopsis" => $this->sinopsis,
            "image" => $this->pathImage
        ]);

       

        if($response->successful()){
            $this->toggleNotif = true;
            $this->message = 'berhasil menyimpa data buku';
            $idBuku = end($this->buku)['id'];
            $buku = [
                "id" => (int)$idBuku + 1,
                "judul" => $this->judul,
                "penulis" => $this->penulis,
                "penerbit" => $this->penerbit,
                "status" => "tersedia",
                "tahun_terbit" => $this->tgl,
                "sinopsis" => $this->sinopsis,
                "image" => $this->pathImage
            ];
            array_push($this->buku, $buku);

            $this->reset(['judul', 'penulis', 'penerbit', 'tgl', 'sinopsis','image','pathImage']);
            $this->toggleClose();
        }else if($response->unprocessableEntity()){
            $this->addError('waktu',  $response->json());
        }
    }

    public function toggleNotifDisable(){
        $this->toggleNotif = false;
    }

    public function updateButton($id){
        $buku = $this->buku[$id];
        $this->counter = $id;
        $this->judul = $buku['judul'];
        $this->penulis= $buku['penulis'];
        $this->penerbit= $buku['penerbit'];
        $this->tgl= $buku['tahun_terbit'];
        $this->sinopsis= $buku['sinopsis'];
        $this->id = $buku['id'];
        $this->pathImage=$buku['image'];
        $this->updateToggle =true;

        
    }

    public function toggleActive(){
        $this->toggle =true;
    }
    public function toggleClose(){
        $this->toggle =false;
    }

    public function updateToggleClose(){
        $this->updateToggle = false;
    }


    public function updateBuku(){
        if($this->image != null){

            if($this->pathImage != "null.jpg"){
                Storage::disk('public')->delete('buku/'.$this->pathImage);
            }
            
            $path = $this->image->store("buku");
            $this->pathImage = basename($path);
            Storage::disk("public")->deleteDirectory("livewire-tmp");

            
        };

        $token = Session::get(key: 'token');
        $response =  Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->patch(config('app.api_url').'/admin/buku/update/'.$this->id, [
            "judul" => $this->judul,
            "penulis" => $this->penulis,
            "penerbit" => $this->penerbit,
            "tahun_terbit" => $this->tgl,
            "sinopsis" => $this->sinopsis,
            "image" => $this->pathImage
        ]);


        if($response->successful()){
            $this->toggleNotif = true;
            $this->updateToggle = false;
            $this->message = 'berhasil menyimpa data buku';
            $this->buku[$this->counter] = [
                "id" => $this->id,
                "judul" => $this->judul,
                "penulis" => $this->penulis,
                "status" => 'tersedia',
                "penerbit" => $this->penerbit,
                "tahun_terbit" => $this->tgl,
                "sinopsis" => $this->sinopsis,
                "image" => $this->pathImage
            ];
            $this->reset(['judul', 'penulis', 'penerbit', 'tgl', 'sinopsis','pathImage','image']);
        }
    }
    public function deleteBuku($id){
        $token = Session::get(key: 'token');
        // $response =  Http::withHeaders([
        //     "Accept" => "application/json",
        //     "Authorization" => "Bearer " . $token
        // ])->delete(config('app.api_url').'/admin/buku/delete/'.$id);
        $buku = Buku::findOrFail($id);
        $path = $buku->image;
        if($path != "null.jpg"){
            Storage::disk('public')->delete('buku/'.$path);
        }
        $berhasil = $buku->delete();
        if($berhasil){
            $this->toggleNotif = true;
            $this->buku = array_filter($this->buku, function ($item) use ($id) {
                return $item['id'] !== $id; 
            });
            $this->message="Berhasil mengahps Buku";
        }
    }

    public function serachBuku(){
        $token = Session::get(key: 'token');
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $token
        ])->get(config('app.api_url').'/admin/buku/search?q=' . $this->q);
        $this->buku = $response->json()['data'];

        if (Str::of($this->q)->trim()->isEmpty()){
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->get(config('app.api_url').'/buku');

            $this->buku = $response->json()['data'];
        }
    }

}
