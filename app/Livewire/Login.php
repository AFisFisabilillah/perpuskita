<?php

namespace App\Livewire;

use GuzzleHttp\Cookie\SetCookie;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class Login extends Component
{
    public $title = "login";
    public $email,$password;

    public function mount(){
        if(session()->has('token')){
            redirect()->route('home');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }

    public function login(){

        
       
        $response = Http::accept('application/json')->post(config('app.api_url')."/login",[
            "email" => $this->email,
            "password" => $this->password
        ]);

        if($response->getStatusCode()==422){
          $error = $response->json()['errors'];
          if(isset($error['email'])){
            $this->addError('email',$error['email'] );
          }
          if(isset($error['password'])){
            $this->addError('password',$error['password'] );
          }
        }else if($response->unauthorized()){
            $this->addError('loginFailed', $response->json()['messege']);
        }
        
        if($response->successful()){
            $token =  $response->json()["data"]["token"];
            session(['token'=>$token]);
            redirect()->route('home');
        }

    }
}
