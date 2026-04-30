<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jurusans = [
            'Pengembangan Perangkat Lunak dan Gim',
            'Teknik Otomotif',
            'Teknik Pengelasan dan Fabrikasi Logam',
            'Broadcasting dan Film',
            'Animasi'
        ];

        return [
            'foto' => null,
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nama' => $this->faker->name(),
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'jurusan' => $this->faker->randomElement($jurusans),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2008-12-31'),
            'angkatan' => $this->faker->randomElement([2022, 2023, 2024]),
            'is_active' => true,
        ];
    }
}
