<?php

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

//verify Email

//users
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/buku', [BukuController::class, 'index'])->middleware(['auth:sanctum']);
    Route::get('/buku/{buku}',[BukuController::class, 'viewDetail']);
    Route::get('/profile', [UserController::class,'profile']);
    Route::get('/logout', [LoginController::class, 'logout']);
    //reservasi
    Route::post('/reservasi/add', [ReservationController::class, 'reservation']);
    Route::delete("/reservasi/delete/{id}", [ReservationController::class, 'delete'] );
    Route::get('/reservasi', [UserController::class, 'userReservasi']);
    Route::get('/buku/search', [BukuController::class, 'search']);
    Route::get("/admin/buku/search", [BukuController::class, "search"]);
    //reservasi
    //history
    Route::get("/history", [UserController::class, 'historyUser']);
    Route::post("/upload", [UserController::class, 'uploadProfile']);
});

Route::middleware(["admin", "auth:sanctum"])->group(function(){
    Route::post("/admin/buku/add", [BukuController::class, 'store']);
    Route::patch("/admin/buku/update/{id}", [BukuController::class, "update"]);
    Route::delete("/admin/buku/delete/{id}", [BukuController::class, "destroy"]);

    
    Route::get("/admin/reservasi", [ReservationController::class, 'show']);
    Route::patch("/admin/reservasi/accept/{reservasi}", [ReservationController::class, "reservasiAccept"]);
    Route::patch("/admin/reservasi/finish/{reservation}", [ReservationController::class, "reservasiFinish"]);

    //History
    Route::get("/admin/history", [HistoryController::class, "show"]);
});


