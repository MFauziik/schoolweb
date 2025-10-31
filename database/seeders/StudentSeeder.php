<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    \App\Models\Student::create([
        'foto' => 'path/to/foto.jpg',
        'nisn' => '1234567890',
        'nama' => 'John Doe',
        'kelas' => 'XI',
        'jurusan' => 'Pengembangan Perangkat Lunak dan Gim',
        'tanggal_lahir' => '2005-01-01',
        'angkatan' => 2023,
        'is_active' => true,
    ]);
}
}