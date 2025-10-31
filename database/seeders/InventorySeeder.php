<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;
use Carbon\Carbon;

class InventorySeeder extends Seeder
{
    public function run()
    {
        $inventories = [
            // Elektronik & Teknologi
            [
                'kode_barang' => 'ELEC-001',
                'nama_barang' => 'Proyektor Epson EB-X41',
                'kategori' => 'Elektronik',
                'status' => 'Baik',
                'lokasi_barang' => 'Lab Komputer A',
                'is_active' => true
            ],
            [
                'kode_barang' => 'ELEC-002',
                'nama_barang' => 'Laptop ASUS VivoBook',
                'kategori' => 'Elektronik',
                'status' => 'Baik',
                'lokasi_barang' => 'Ruang Guru',
                'is_active' => true
            ],
            [
                'kode_barang' => 'ELEC-003',
                'nama_barang' => 'Speaker JBL Flip 5',
                'kategori' => 'Elektronik',
                'status' => 'Baik',
                'lokasi_barang' => 'Aula Sekolah',
                'is_active' => true
            ],
            [
                'kode_barang' => 'ELEC-004',
                'nama_barang' => 'Microphone Wireless Shure',
                'kategori' => 'Elektronik',
                'status' => 'Baik',
                'lokasi_barang' => 'Aula Sekolah',
                'is_active' => true
            ],
            [
                'kode_barang' => 'ELEC-005',
                'nama_barang' => 'Printer Canon PIXMA',
                'kategori' => 'Elektronik',
                'status' => 'Baik',
                'lokasi_barang' => 'Kantor TU',
                'is_active' => true
            ],
            [
                'kode_barang' => 'ELEC-006',
                'nama_barang' => 'Kamera DSLR Canon EOS',
                'kategori' => 'Elektronik',
                'status' => 'Rusak Ringan',
                'lokasi_barang' => 'Lab Multimedia',
                'is_active' => true
            ],
            [
                'kode_barang' => 'ELEC-007',
                'nama_barang' => 'AC Split Panasonic',
                'kategori' => 'Elektronik',
                'status' => 'Rusak Berat',
                'lokasi_barang' => 'Ruang Kelas 1A',
                'is_active' => false
            ],

            // Peralatan Laboratorium
            [
                'kode_barang' => 'LAB-001',
                'nama_barang' => 'Mikroskop Binokuler',
                'kategori' => 'Laboratorium',
                'status' => 'Baik',
                'lokasi_barang' => 'Lab Biologi',
                'is_active' => true
            ],
            [
                'kode_barang' => 'LAB-002',
                'nama_barang' => 'Set Alat Kimia Dasar',
                'kategori' => 'Laboratorium',
                'status' => 'Baik',
                'lokasi_barang' => 'Lab Kimia',
                'is_active' => true
            ],
            [
                'kode_barang' => 'LAB-003',
                'nama_barang' => 'Kit Robotik Arduino',
                'kategori' => 'Laboratorium',
                'status' => 'Baik',
                'lokasi_barang' => 'Lab Komputer B',
                'is_active' => true
            ],
            [
                'kode_barang' => 'LAB-004',
                'nama_barang' => 'Tabung Reaksi Pyrex',
                'kategori' => 'Laboratorium',
                'status' => 'Baik',
                'lokasi_barang' => 'Lab Kimia',
                'is_active' => true
            ],
            [
                'kode_barang' => 'LAB-005',
                'nama_barang' => 'Hotplate Stirrer',
                'kategori' => 'Laboratorium',
                'status' => 'Rusak Ringan',
                'lokasi_barang' => 'Lab Kimia',
                'is_active' => true
            ],

            // Peralatan Olahraga
            [
                'kode_barang' => 'OLG-001',
                'nama_barang' => 'Bola Basket Molten',
                'kategori' => 'Olahraga',
                'status' => 'Baik',
                'lokasi_barang' => 'Gudang Olahraga',
                'is_active' => true
            ],
            [
                'kode_barang' => 'OLG-002',
                'nama_barang' => 'Bola Voli Mikasa',
                'kategori' => 'Olahraga',
                'status' => 'Baik',
                'lokasi_barang' => 'Gudang Olahraga',
                'is_active' => true
            ],
            [
                'kode_barang' => 'OLG-003',
                'nama_barang' => 'Jaring Badminton',
                'kategori' => 'Olahraga',
                'status' => 'Baik',
                'lokasi_barang' => 'Gudang Olahraga',
                'is_active' => true
            ],
            [
                'kode_barang' => 'OLG-004',
                'nama_barang' => 'Matras Senam',
                'kategori' => 'Olahraga',
                'status' => 'Baik',
                'lokasi_barang' => 'Gudang Olahraga',
                'is_active' => true
            ],
            [
                'kode_barang' => 'OLG-005',
                'nama_barang' => 'Raket Bulutangkis',
                'kategori' => 'Olahraga',
                'status' => 'Rusak Ringan',
                'lokasi_barang' => 'Gudang Olahraga',
                'is_active' => true
            ],

            // Perabotan
            [
                'kode_barang' => 'FURN-001',
                'nama_barang' => 'Meja Guru',
                'kategori' => 'Perabotan',
                'status' => 'Baik',
                'lokasi_barang' => 'Ruang Kelas',
                'is_active' => true
            ],
            [
                'kode_barang' => 'FURN-002',
                'nama_barang' => 'Kursi Siswa',
                'kategori' => 'Perabotan',
                'status' => 'Baik',
                'lokasi_barang' => 'Ruang Kelas',
                'is_active' => true
            ],
            [
                'kode_barang' => 'FURN-003',
                'nama_barang' => 'Papan Tulis Whiteboard',
                'kategori' => 'Perabotan',
                'status' => 'Baik',
                'lokasi_barang' => 'Ruang Kelas',
                'is_active' => true
            ],
            [
                'kode_barang' => 'FURN-004',
                'nama_barang' => 'Rak Buku Perpustakaan',
                'kategori' => 'Perabotan',
                'status' => 'Baik',
                'lokasi_barang' => 'Perpustakaan',
                'is_active' => true
            ],
            [
                'kode_barang' => 'FURN-005',
                'nama_barang' => 'Lemari Arsip',
                'kategori' => 'Perabotan',
                'status' => 'Rusak Ringan',
                'lokasi_barang' => 'Kantor TU',
                'is_active' => true
            ],

            // Buku & Alat Tulis
            [
                'kode_barang' => 'BOOK-001',
                'nama_barang' => 'Buku Paket Matematika',
                'kategori' => 'Buku',
                'status' => 'Baik',
                'lokasi_barang' => 'Perpustakaan',
                'is_active' => true
            ],
            [
                'kode_barang' => 'BOOK-002',
                'nama_barang' => 'Buku Paket Bahasa Indonesia',
                'kategori' => 'Buku',
                'status' => 'Baik',
                'lokasi_barang' => 'Perpustakaan',
                'is_active' => true
            ],
            [
                'kode_barang' => 'STN-001',
                'nama_barang' => 'Whiteboard Marker',
                'kategori' => 'Alat Tulis',
                'status' => 'Baik',
                'lokasi_barang' => 'Gudang ATK',
                'is_active' => true
            ]
        ];

        foreach ($inventories as $inventory) {
            Inventory::create($inventory);
        }
    }
}