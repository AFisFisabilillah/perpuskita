<?php

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/buku', [BukuController::class, 'index'])->middleware(['auth:sanctum']);
    Route::get('/buku/{buku}',[BukuController::class, 'viewDetail']);
    Route::get('/profile', [UserController::class,'profile']);
    Route::get('/logout', [LoginController::class, 'logout']);
});