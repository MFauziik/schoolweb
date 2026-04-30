<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inventory_id' => Inventory::factory(),
            'peminjam_nama' => $this->faker->name(),
            'peminjam_kelas' => $this->faker->randomElement(['X PPLG 1', 'XI PPLG 2', 'XII ANIMASI 1']),
            'keperluan' => $this->faker->sentence(),
            'status_peminjaman' => $this->faker->randomElement(['dipinjam', 'dikembalikan']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
