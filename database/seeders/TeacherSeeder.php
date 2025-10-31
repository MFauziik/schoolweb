<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Carbon\Carbon;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $teachers = [
            [
                'nip' => '196501011987031001',
                'nama' => 'Dr. Ahmad Wijaya, M.Pd',
                'jabatan' => 'Guru Matematika',
                'no_hp' => '081234567890',
                'email' => 'ahmad.wijaya@sekolah.sch.id',
                'alamat' => 'Jl. Pendidikan No. 123, Jakarta Selatan',
                'is_active' => true
            ],
            [
                'nip' => '197603151995122001',
                'nama' => 'Diana Sari, S.Pd',
                'jabatan' => 'Guru Bahasa Indonesia',
                'no_hp' => '081234567891',
                'email' => 'diana.sari@sekolah.sch.id',
                'alamat' => 'Jl. Kemerdekaan No. 45, Jakarta Pusat',
                'is_active' => true
            ],
            [
                'nip' => '197812031999031002',
                'nama' => 'Budi Santoso, S.Pd',
                'jabatan' => 'Guru IPA',
                'no_hp' => '081234567892',
                'email' => 'budi.santoso@sekolah.sch.id',
                'alamat' => 'Jl. Merdeka No. 67, Jakarta Barat',
                'is_active' => true
            ],
            [
                'nip' => '198204252003122002',
                'nama' => 'Citra Dewi, M.Pd',
                'jabatan' => 'Guru Bahasa Inggris',
                'no_hp' => '081234567893',
                'email' => 'citra.dewi@sekolah.sch.id',
                'alamat' => 'Jl. Pelajar No. 89, Jakarta Timur',
                'is_active' => true
            ],
            [
                'nip' => '197511121998031003',
                'nama' => 'Eko Prasetyo, S.Pd',
                'jabatan' => 'Guru IPS',
                'no_hp' => '081234567894',
                'email' => 'eko.prasetyo@sekolah.sch.id',
                'alamat' => 'Jl. Cendekia No. 12, Jakarta Utara',
                'is_active' => true
            ],
            [
                'nip' => '199005152012122001',
                'nama' => 'Fitri Handayani, S.Pd',
                'jabatan' => 'Guru Seni Budaya',
                'no_hp' => '081234567895',
                'email' => 'fitri.handayani@sekolah.sch.id',
                'alamat' => 'Jl. Kreatif No. 34, Jakarta Selatan',
                'is_active' => true
            ],
            [
                'nip' => '197302281994031004',
                'nama' => 'Gunawan Setiawan, S.Pd',
                'jabatan' => 'Guru Pendidikan Jasmani',
                'no_hp' => '081234567896',
                'email' => 'gunawan.setiawan@sekolah.sch.id',
                'alamat' => 'Jl. Sehat No. 56, Jakarta Pusat',
                'is_active' => true
            ],
            [
                'nip' => '198009182005012003',
                'nama' => 'Hana Permata, M.Pd',
                'jabatan' => 'Guru Kimia',
                'no_hp' => '081234567897',
                'email' => 'hana.permata@sekolah.sch.id',
                'alamat' => 'Jl. Sains No. 78, Jakarta Barat',
                'is_active' => true
            ],
            [
                'nip' => '198512102008011004',
                'nama' => 'Irfan Maulana, S.Pd',
                'jabatan' => 'Guru Fisika',
                'no_hp' => '081234567898',
                'email' => 'irfan.maulana@sekolah.sch.id',
                'alamat' => 'Jl. Teknologi No. 90, Jakarta Timur',
                'is_active' => true
            ],
            [
                'nip' => '199108202015012002',
                'nama' => 'Jessica Amelia, S.Pd',
                'jabatan' => 'Guru Biologi',
                'no_hp' => '081234567899',
                'email' => 'jessica.amelia@sekolah.sch.id',
                'alamat' => 'Jl. Alam No. 11, Jakarta Utara',
                'is_active' => true
            ],
            // Beberapa guru tidak aktif
            [
                'nip' => '195812311984031005',
                'nama' => 'Surya Dharma, S.Pd',
                'jabatan' => 'Guru Sejarah',
                'no_hp' => '081234567800',
                'email' => 'surya.dharma@sekolah.sch.id',
                'alamat' => 'Jl. Sejarah No. 23, Jakarta Selatan',
                'is_active' => false
            ],
            [
                'nip' => '196204151989122003',
                'nama' => 'Maya Indah, S.Pd',
                'jabatan' => 'Guru Ekonomi',
                'no_hp' => '081234567801',
                'email' => 'maya.indah@sekolah.sch.id',
                'alamat' => 'Jl. Ekonomi No. 45, Jakarta Pusat',
                'is_active' => false
            ]
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}