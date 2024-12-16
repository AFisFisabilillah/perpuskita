<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("user_id")->constrained("users", "id");
            $table->foreignId("buku_id")->constrained("buku", "id");
            $table->date("waktu_pinjam"); 
            $table->date("waktu_kembali");
        });
    }

   
    public function down(): void
    {
        //
    }
};
