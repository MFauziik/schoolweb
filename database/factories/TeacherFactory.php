<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('19################'),
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->randomElement(['Guru Matematika', 'Guru Bahasa Inggris', 'Guru Produktif PPLG', 'Guru Olahraga', 'Kepala Program']),
            'no_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'alamat' => $this->faker->address(),
            'is_active' => true,
        ];
    }
}
