<?php
// database/seeders/BorrowingSeeder.php

namespace Database\Seeders;

use App\Models\Borrowing;
use App\Models\Inventory;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    public function run(): void
    {
        $inventories = Inventory::where('is_active', true)->get();
        $kelas = ['X IPA 1', 'X IPA 2', 'XI IPA 1', 'XI IPS 1', 'XII IPA 1', 'XII IPS 1', 'Guru', 'Staff'];

        // Buat beberapa peminjaman aktif
        foreach ($inventories->take(8) as $inventory) {
            Borrowing::create([
                'inventory_id' => $inventory->id,
                'peminjam_nama' => fake()->name(),
                'peminjam_kelas' => fake()->randomElement($kelas),
                'keperluan' => $this->generateKeperluan($inventory->kategori),
                'status_peminjaman' => 'dipinjam',
                'created_at' => fake()->dateTimeBetween('-2 weeks', 'now'),
                'updated_at' => now(),
            ]);
        }

        // Buat beberapa peminjaman yang sudah dikembalikan
        foreach ($inventories->skip(8)->take(12) as $inventory) {
            $borrowDate = fake()->dateTimeBetween('-1 month', '-1 week');
            $returnDate = (clone $borrowDate)->modify('+'.fake()->numberBetween(1, 7).' days');
            
            Borrowing::create([
                'inventory_id' => $inventory->id,
                'peminjam_nama' => fake()->name(),
                'peminjam_kelas' => fake()->randomElement($kelas),
                'keperluan' => $this->generateKeperluan($inventory->kategori),
                'status_peminjaman' => 'dikembalikan',
                'created_at' => $borrowDate,
                'updated_at' => $returnDate,
            ]);
        }
    }

    private function generateKeperluan(string $kategori): string
    {
        $keperluan = [
            'Elektronik' => [
                'Untuk presentasi kelas',
                'Kegiatan pembelajaran multimedia',
                'Rapat guru dan staff',
                'Kegiatan ekstrakurikuler',
                'Lomba antar sekolah'
            ],
            'Laboratorium' => [
                'Praktikum kimia',
                'Praktikum biologi',
                'Praktikum fisika',
                'Penelitian siswa',
                'Olimpiade sains'
            ],
            'Olahraga' => [
                'Latihan basket',
                'Pertandingan persahabatan',
                'Ekstrakurikuler voli',
                'Pekan olahraga',
                'Pemanasan sebelum pelajaran'
            ],
            'Perabotan' => [
                'Rapat orangtua',
                'Kegiatan kelas',
                'Seminar pendidikan',
                'Pelatihan guru',
                'Acara sekolah'
            ],
            'Buku' => [
                'Referensi belajar',
                'Penelitian tugas',
                'Bahan presentasi',
                'Persiapan ujian',
                'Bacaan tambahan'
            ]
        ];

        $defaultKeperluan = [
            'Kegiatan pembelajaran',
            'Tugas sekolah',
            'Ekstrakurikuler',
            'Persiapan ujian',
            'Kegiatan kelas'
        ];

        return fake()->randomElement($keperluan[$kategori] ?? $defaultKeperluan);
    }
}