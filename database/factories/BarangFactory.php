<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->words(2, true), 
            'kategori_id' => Kategori::inRandomOrder()->first()->id ?? 1, 
            'stok' => fake()->numberBetween(10, 100),
            'harga' => fake()->numberBetween(10, 50) * 10000, 
        ];
    }
}
