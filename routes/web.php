<?php

use App\Livewire\Buku;
use App\Livewire\Home;
use App\Livewire\Profile;
use App\Livewire\ShowBuku;
use App\Livewire\Admin\History;
use App\Livewire\DashboardAdmin;
use App\Livewire\Admin\AdminBuku;
use App\Livewire\Admin\Reservasi;
use App\Livewire\Admin\DetailBuku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get("/", Home::class)->name("home");;
Route::get("/buku", Buku::class)->name("buku");
Route::get("/buku/{id}", ShowBuku::class)->name("detailukuBuku");
Route::get('/profile', Profile::class)->name('profile');

//rubah passsword
Route::get('/forgot-password',function(){
    return view('layouts.forgot-password');
})->name('forgotPassword');



//kirim email
Route::post('/password/email', [LoginController::class, 'sendResetLink'])->name("password.email");
//form update
Route::get("/reset-password/{token}", function(string $token){
    return view('layouts.reset-password',["token"=>$token] );
})->name("password.reset");

//update password
Route::post("/update-password", [LoginController::class, 'resetPasword'])->name("password.update");

//auth
Route::get('/login', function(){ return view('layouts.login');} )->name('login');
Route::get('/register', function(){ return view('layouts.register');} )->name('register');

//admin
Route::get('/admin', DashboardAdmin::class)->name('admin');
Route::get('/admin/buku', AdminBuku::class)->name('adminBuku');
Route::get('/admin/buku/detail/{id}', DetailBuku::class)->name('detailBuku');
Route::get('/admin/reservasi', Reservasi::class)->name('reservasi');
Route::get('/admin/history', History::class)->name('history');

//verify  email
Route::get("/email-verify", function(){
    return view('layouts.verify-email');
})->middleware('auth')->name("verification.notice");

//handler
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/login');
})->middleware('auth')->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    Auth::user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification email sent!');
})->name('verification.send');
 