<?php
// database/seeders/InventorySeeder.php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Elektronik', 'Laboratorium', 'Olahraga', 'Perabotan', 
            'Buku', 'Alat Tulis', 'Alat Musik', 'Kesenian', 'Kebersihan'
        ];

        $lokasi = [
            'Lab Komputer', 'Lab Fisika', 'Lab Kimia', 'Lab Biologi',
            'Perpustakaan', 'Ruang Guru', 'Ruang Kepala Sekolah',
            'Aula', 'Lapangan', 'Ruang OSIS', 'Ruang UKS'
        ];

        $status = ['Baik', 'Rusak Ringan', 'Rusak Berat', 'Perlu Perbaikan', 'Hilang'];

        // Data barang elektronik
        $elektronik = [
            ['Laptop', 'ELK-001'], ['Proyektor', 'ELK-002'], ['Speaker', 'ELK-003'],
            ['Microphone', 'ELK-004'], ['Printer', 'ELK-005'], ['Scanner', 'ELK-006'],
            ['Kamera', 'ELK-007'], ['TV', 'ELK-008'], ['AC', 'ELK-009'], ['Kipas Angin', 'ELK-010']
        ];

        // Data barang laboratorium
        $laboratorium = [
            ['Mikroskop', 'LAB-001'], ['Tabung Reaksi', 'LAB-002'], ['Pipet', 'LAB-003'],
            ['Bunsen', 'LAB-004'], ['Neraca', 'LAB-005'], ['Gelas Ukur', 'LAB-006'],
            ['Termometer', 'LAB-007'], ['PH Meter', 'LAB-008'], ['Centrifuge', 'LAB-009']
        ];

        // Data barang olahraga
        $olahraga = [
            ['Bola Basket', 'OLR-001'], ['Bola Voli', 'OLR-002'], ['Bola Sepak', 'OLR-003'],
            ['Jaring Voli', 'OLR-004'], ['Raket Badminton', 'OLR-005'], ['Kok', 'OLR-006'],
            ['Matras', 'OLR-007'], ['Pluit', 'OLR-008'], ['Stopwatch', 'OLR-009']
        ];

        // Data perabotan
        $perabotan = [
            ['Meja Guru', 'PRB-001'], ['Kursi Guru', 'PRB-002'], ['Meja Siswa', 'PRB-003'],
            ['Kursi Siswa', 'PRB-004'], ['Lemari', 'PRB-005'], ['Papan Tulis', 'PRB-006'],
            ['Rak Buku', 'PRB-007'], ['Filing Cabinet', 'PRB-008']
        ];

        // Gabungkan semua barang
        $allItems = array_merge($elektronik, $laboratorium, $olahraga, $perabotan);

        foreach ($allItems as $item) {
            Inventory::create([
                'kode_barang' => $item[1],
                'nama_barang' => $item[0],
                'kategori' => $this->getKategoriFromKode($item[1]),
                'status' => fake()->randomElement($status),
                'lokasi_barang' => fake()->randomElement($lokasi),
                'is_active' => fake()->boolean(85), // 85% aktif
            ]);
        }

        // Tambahkan beberapa buku
        for ($i = 1; $i <= 15; $i++) {
            Inventory::create([
                'kode_barang' => 'BUK-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_barang' => 'Buku ' . fake()->words(2, true),
                'kategori' => 'Buku',
                'status' => 'Baik',
                'lokasi_barang' => 'Perpustakaan',
                'is_active' => true,
            ]);
        }
    }

    private function getKategoriFromKode($kode): string
    {
        $prefix = substr($kode, 0, 3);
        return match($prefix) {
            'ELK' => 'Elektronik',
            'LAB' => 'Laboratorium',
            'OLR' => 'Olahraga',
            'PRB' => 'Perabotan',
            'BUK' => 'Buku',
            default => 'Lainnya'
        };
    }
}