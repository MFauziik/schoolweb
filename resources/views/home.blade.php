@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section
    class="bg-gradient-to-br from-primary-50 to-blue-100 dark:from-gray-800 dark:to-gray-900 py-20 theme-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 dark:text-white mb-6">
                Kelola Sekolah dengan
                <span class="bg-gradient-to-r from-primary-500 to-blue-600 bg-clip-text text-transparent">
                    Mudah & Efisien
                </span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                Sistem manajemen sekolah terintegrasi untuk mengelola data siswa, guru, dan inventaris dalam satu
                platform yang modern dan user-friendly.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105 shadow-lg">
                    <i class="fas fa-tachometer-alt mr-2"></i>Masuk Dashboard
                </a>
                @else
                <a href="{{ route('register') }}"
                    class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105 shadow-lg">
                    <i class="fas fa-rocket mr-2"></i>Mulai Sekarang
                </a>
                <a href="{{ route('login') }}"
                    class="border-2 border-primary-500 text-primary-500 dark:text-primary-400 dark:border-primary-400 hover:bg-primary-500 hover:text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
                @endauth
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white dark:bg-gray-800 theme-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                Fitur Unggulan Kami
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Semua yang Anda butuhkan untuk manajemen sekolah yang efektif
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div
                class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-user-graduate text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Manajemen Siswa</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Kelola data siswa secara lengkap mulai dari profil, nilai, hingga riwayat akademik dengan antarmuka
                    yang intuitif.
                </p>
                <ul class="text-gray-600 dark:text-gray-300 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Data profil lengkap
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Riwayat akademik
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Laporan perkembangan
                    </li>
                </ul>
            </div>

            <!-- Feature 2 -->
            <div
                class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-chalkboard-teacher text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Manajemen Guru</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Sistem terpadu untuk mengelola data guru, jadwal mengajar, dan penilaian kinerja dengan mudah dan
                    terorganisir.
                </p>
                <ul class="text-gray-600 dark:text-gray-300 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Data guru terpusat
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Manajemen jadwal
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Evaluasi kinerja
                    </li>
                </ul>
            </div>

            <!-- Feature 3 -->
            <div
                class="bg-gradient-to-br from-amber-50 to-orange-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-amber-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-boxes text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Inventaris Sekolah</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Pantau dan kelola semua aset sekolah dengan sistem inventaris yang canggih dan real-time tracking.
                </p>
                <ul class="text-gray-600 dark:text-gray-300 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Tracking aset real-time
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Laporan pemeliharaan
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Sistem peminjaman
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Stats Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 theme-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                Statistik Sekolah
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Data terkini yang dikelola oleh sistem kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Total Siswa Card -->
            <div
                class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-lg p-6 border border-blue-100 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                        <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-xl"></i>
                    </div>
                    <span
                        class="text-sm font-medium text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900 px-3 py-1 rounded-full">
                        {{ $activeStudents }} Aktif
                    </span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Siswa Terdaftar</h3>
                <p class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $studentCount }}</p>
                <div class="w-full bg-blue-200 dark:bg-blue-700 rounded-full h-2">
                    <div class="bg-blue-600 dark:bg-blue-400 h-2 rounded-full"
                        style="width: {{ min(($activeStudents/$studentCount)*100, 100) }}%"></div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    {{ number_format(($activeStudents/$studentCount)*100, 1) }}% siswa aktif
                </p>
            </div>

            <!-- Total Guru Card -->
            <div
                class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-lg p-6 border border-green-100 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                        <i class="fas fa-chalkboard-teacher text-green-600 dark:text-green-400 text-xl"></i>
                    </div>
                    <span
                        class="text-sm font-medium text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900 px-3 py-1 rounded-full">
                        {{ $activeTeachers }} Aktif
                    </span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Guru Professional</h3>
                <p class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $teacherCount }}</p>
                <div class="w-full bg-green-200 dark:bg-green-700 rounded-full h-2">
                    <div class="bg-green-600 dark:bg-green-400 h-2 rounded-full"
                        style="width: {{ min(($activeTeachers/$teacherCount)*100, 100) }}%"></div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    {{ number_format(($activeTeachers/$teacherCount)*100, 1) }}% guru aktif
                </p>
            </div>

            <!-- Total Fasilitas Card -->
            <div
                class="bg-gradient-to-br from-amber-50 to-orange-100 dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-lg p-6 border border-amber-100 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-full bg-amber-100 dark:bg-amber-900">
                        <i class="fas fa-school text-amber-600 dark:text-amber-400 text-xl"></i>
                    </div>
                    <span
                        class="text-sm font-medium text-amber-600 dark:text-amber-400 bg-amber-100 dark:bg-amber-900 px-3 py-1 rounded-full">
                        {{ $activeInventories }} Tersedia
                    </span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Fasilitas</h3>
                <p class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $inventoryCount }}</p>
                <div class="w-full bg-amber-200 dark:bg-amber-700 rounded-full h-2">
                    <div class="bg-amber-600 dark:bg-amber-400 h-2 rounded-full"
                        style="width: {{ min(($activeInventories/$inventoryCount)*100, 100) }}%"></div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    {{ number_format(($activeInventories/$inventoryCount)*100, 1) }}% fasilitas tersedia
                </p>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="text-center mt-12">
            <div class="inline-flex items-center bg-white dark:bg-gray-700 rounded-2xl shadow-lg px-6 py-4">
                <i class="fas fa-info-circle text-primary-500 mr-3 text-xl"></i>
                <p class="text-gray-600 dark:text-gray-300 font-medium">
                    Semua data diperbarui secara real-time melalui sistem terintegrasi
                </p>
            </div>
        </div>
    </div>
</section>
<!-- CTA Section -->
<section class="py-20 bg-gray-50 dark:bg-gray-800 theme-transition">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-6">
            Siap Mengubah Cara Anda Mengelola Sekolah?
        </h2>
        <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
            Bergabung dengan ratusan sekolah yang telah mempercayai sistem kami untuk manajemen yang lebih baik.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @auth
            <a href="{{ route('dashboard') }}"
                class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-play mr-2"></i>Mulai Menggunakan
            </a>
            @else
            <a href="{{ route('register') }}"
                class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
            </a>
            <a href="#"
                class="border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 px-8 py-4 rounded-lg font-semibold text-lg transition-all">
                <i class="fas fa-play-circle mr-2"></i>Lihat Demo
            </a>
            @endauth
        </div>
    </div>
</section>
@endsection