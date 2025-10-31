@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div
        class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Kartu Identitas Siswa
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Detail informasi siswa</p>
            </div>

            <!-- Identity Card -->
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl shadow-2xl overflow-hidden">
                <!-- Card Header -->
                <div class="bg-white/10 backdrop-blur-sm p-6 border-b border-white/20">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-white">KARTU PELAJAR</h2>
                            <p class="text-blue-100 text-sm">SMK NEGERI 1 CIOMAS</p>
                        </div>
                        <div class="text-right">
                            <p class="text-white text-sm">ID: {{ $student->nisn }}</p>
                            <p class="text-blue-100 text-xs">{{ $student->is_active ? 'AKTIF' : 'NON-AKTIF' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-8">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                        <!-- Foto -->
                        <div class="flex-shrink-0">
                            <div
                                class="w-48 h-48 bg-white/20 rounded-2xl border-4 border-white/30 overflow-hidden shadow-lg">
                                @if($student->foto)
                                <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto Siswa"
                                    class="w-full h-full object-cover">
                                @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center">
                                    <i class="fas fa-user text-white text-6xl"></i>
                                </div>
                                @endif
                            </div>
                            <div class="mt-4 text-center">
                                <div class="bg-white/20 rounded-full px-4 py-1 inline-block">
                                    <p class="text-white text-sm font-semibold">{{ $student->kelas }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Siswa -->
                        <div class="flex-1 text-white">
                            <div class="space-y-4">
                                <!-- Nama -->
                                <div class="border-b border-white/20 pb-3">
                                    <p class="text-blue-100 text-sm font-semibold">NAMA LENGKAP</p>
                                    <p class="text-2xl font-bold mt-1">{{ $student->nama }}</p>
                                </div>

                                <!-- Grid Info -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- NISN -->
                                    <div>
                                        <p class="text-blue-100 text-sm font-semibold">NISN</p>
                                        <p class="text-lg font-semibold">{{ $student->nisn }}</p>
                                    </div>

                                    <!-- Jurusan -->
                                    <div>
                                        <p class="text-blue-100 text-sm font-semibold">JURUSAN</p>
                                        <p class="text-lg font-semibold">{{ $student->jurusan }}</p>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div>
                                        <p class="text-blue-100 text-sm font-semibold">TANGGAL LAHIR</p>
                                        <p class="text-lg font-semibold">
                                            {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d/m/Y') }}</p>
                                    </div>

                                    <!-- Angkatan -->
                                    <div>
                                        <p class="text-blue-100 text-sm font-semibold">ANGKATAN</p>
                                        <p class="text-lg font-semibold">{{ $student->angkatan }}</p>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="mt-6">
                                    <div
                                        class="inline-flex items-center px-4 py-2 rounded-full {{ $student->is_active ? 'bg-green-500' : 'bg-red-500' }} text-white font-semibold">
                                        <i
                                            class="fas {{ $student->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>
                                        {{ $student->is_active ? 'SISWA AKTIF' : 'SISWA NON-AKTIF' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="bg-white/10 backdrop-blur-sm p-4 border-t border-white/20">
                    <div class="flex justify-between items-center text-white/80 text-sm">
                        <div>
                            <i class="fas fa-qrcode mr-2"></i>
                            SCAN QR CODE UNTUK VERIFIKASI
                        </div>
                        <div>
                            {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('students.edit', $student) }}" class="btn-primary">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data Siswa
                </a>
                <a href="{{ route('students.index') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
@media print {

    .sidebar,
    .bg-gradient-to-br,
    .btn-primary,
    .btn-secondary {
        display: none !important;
    }

    body {
        background: white !important;
    }

    .bg-gradient-to-br {
        background: linear-gradient(135deg, #3b82f6, #6366f1) !important;
    }
}

.btn-primary {
    @apply flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover: from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center;
}

.btn-secondary {
    @apply flex-1 bg-gray-500 hover: bg-gray-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 border border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500 flex items-center justify-center;
}
</style>
@endpush
@endsection