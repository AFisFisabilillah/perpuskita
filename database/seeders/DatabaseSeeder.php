<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Buku::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Buku::insert([
            [
                "judul" => 'sang pemimpi',
                "penulis" => "andrea hirata",
                "penerbit"=>"gramedia",
                "sinopsis" => "sdadsadsad dsasadsa sadsadsa",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'bulan',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis Bulan",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'Bumi',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis Bumi",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'mathari',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis mathari",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'laskar pelangi',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis laskar pelnagi",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'Study in the scarlate',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis Study in the scarlate",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'endles Night ',
                "penulis" => "agatha Christiea",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis endles Night ",
                'tahun_terbit' => "2004-12-21",
            ],[
                "judul" => 'Harry Potter',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis Haarry Potter",
                'tahun_terbit' => "2004-12-21"
            ],[
                "judul" => 'Dunia Shopie',
                "penulis" => "Tereliye",
                "penerbit"=>"gramedia",
                "sinopsis" => "Sinopsis D",
                'tahun_terbit' => "2004-12-21"
            ],
        ]);

        // User::create([
        //     'name' => 'afis',
        //     'email'=> 'afisfisabilillah21@gmail.com',
        //     'isAdmin'=>"Admin",
        //     'password'=>'password'
        // ]);
    }
}
