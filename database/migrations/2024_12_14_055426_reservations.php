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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("user_id")->constrained(
                table: "users", column: "id"
            );
            $table->foreignId("buku_id")->constrained("buku", "id");
            $table->timestamp("waktu_reservasi");
            $table->date("waktu_ambil");
            $table->date("waktu_kembali");
            $table->enum("status", ['pending', 'dipinjam','selesai'])->default("pending");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
