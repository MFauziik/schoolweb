<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang' => $this->faker->unique()->bothify('INV-####-???'),
            'nama_barang' => $this->faker->randomElement(['MacBook Pro M2', 'Logitech G502', 'Monitor Samsung 24"', 'Proyektor Epson', 'Router TP-Link', 'Meja Lab', 'Kursi Gaming']),
            'kategori' => $this->faker->randomElement(['Electronics', 'Furniture', 'Stationery', 'Networking']),
            'status' => $this->faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            'jumlah' => $this->faker->numberBetween(1, 50),
            'kondisi' => $this->faker->randomElement(['Excellent', 'Good', 'Fair', 'Poor']),
            'lokasi_barang' => $this->faker->randomElement(['Lab PPLG', 'Lab Animasi', 'Ruang Guru', 'Perpustakaan', 'Gudang']),
            'is_active' => true,
        ];
    }
}
