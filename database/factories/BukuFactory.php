<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->words(4, true),
            'sinopsis'=>fake()->paragraphs(3,true),
            'penulis'=>fake()->name(),
            'tahun_terbit'=>fake()->date(),
            'penerbit'=>fake()->words(2, true)
            
        ];
    }
}
