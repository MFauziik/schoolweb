@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')

    <div
        class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Detail Guru
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Informasi lengkap data guru</p>
            </div>

            <!-- Teacher Profile Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                <!-- Header -->
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">{{ $teacher->nama }}</h2>
                                <p class="text-green-100">{{ $teacher->jabatan }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span
                                class="inline-block px-3 py-1 bg-white/20 text-white rounded-full text-sm font-semibold">
                                {{ $teacher->is_active ? 'AKTIF' : 'NON-AKTIF' }}
                            </span>
                            <p class="text-green-100 text-sm mt-1">NIP: {{ $teacher->nip }}</p>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Informasi Pribadi -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                                <i class="fas fa-user-circle text-green-500 mr-2"></i>
                                Informasi Pribadi
                            </h3>

                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">NIP</span>
                                    <span class="text-gray-800 dark:text-white font-semibold">{{ $teacher->nip }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Nama Lengkap</span>
                                    <span
                                        class="text-gray-800 dark:text-white font-semibold">{{ $teacher->nama }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Jabatan</span>
                                    <span
                                        class="text-gray-800 dark:text-white font-semibold">{{ $teacher->jabatan }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Kontak & Status -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                                <i class="fas fa-address-card text-blue-500 mr-2"></i>
                                Kontak & Status
                            </h3>

                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">No HP</span>
                                    <span
                                        class="text-gray-800 dark:text-white font-semibold">{{ $teacher->no_hp }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Email</span>
                                    <span
                                        class="text-blue-600 dark:text-blue-400 font-semibold">{{ $teacher->email }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Status</span>
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $teacher->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        <i
                                            class="fas {{ $teacher->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                        {{ $teacher->is_active ? 'Aktif' : 'Non-Aktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center mb-4">
                            <i class="fas fa-map-marker-alt text-amber-500 mr-2"></i>
                            Alamat
                        </h3>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                            <p class="text-gray-800 dark:text-white">{{ $teacher->alamat }}</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                        <div>
                            <i class="fas fa-calendar mr-2"></i>
                            Data diperbarui: {{ $teacher->updated_at->format('d/m/Y H:i') }}
                        </div>
                        <div>
                            <i class="fas fa-id-card mr-2"></i>
                            SMK Negeri 1 Contoh
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('teachers.edit', $teacher) }}" class="btn-primary">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data Guru
                </a>
                <a href="{{ route('teachers.index') }}" class="btn-secondary">
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

    .bg-gradient-to-r {
        background: linear-gradient(135deg, #10b981, #059669) !important;
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