<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('Buku', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string("judul");
           $table->text("sinopsis")->nullable();
           $table->string('penulis');
           $table->date('tahun_terbit');
           $table->string('penerbit');
           $table->boolean('status')->default(true);
           $table->timestamps();
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
