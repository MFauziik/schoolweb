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
                    Detail Inventory
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Informasi lengkap data Inventory</p>
            </div>

            <!-- Inventory Detail Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                <!-- Header -->
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-box text-white text-2xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">{{ $inventory->nama_barang }}</h2>
                                <p class="text-amber-100">{{ $inventory->kode_barang }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            @php
                            $statusColors = [
                            'Baik' => 'bg-green-500',
                            'Rusak Ringan' => 'bg-yellow-500',
                            'Rusak Berat' => 'bg-red-500',
                            'Perlu Perbaikan' => 'bg-orange-500',
                            'Hilang' => 'bg-gray-500'
                            ];
                            $statusColor = $statusColors[$inventory->status] ?? 'bg-gray-500';
                            @endphp
                            <span
                                class="inline-block px-3 py-1 {{ $statusColor }} text-white rounded-full text-sm font-semibold">
                                {{ $inventory->status }}
                            </span>
                            <p class="text-amber-100 text-sm mt-1">
                                {{ $inventory->is_active ? 'AKTIF' : 'NON-AKTIF' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Informasi Barang -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                                <i class="fas fa-info-circle text-amber-500 mr-2"></i>
                                Informasi Barang
                            </h3>

                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Kode Barang</span>
                                    <span
                                        class="text-gray-800 dark:text-white font-mono font-semibold">{{ $inventory->kode_barang }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Nama Barang</span>
                                    <span
                                        class="text-gray-800 dark:text-white font-semibold">{{ $inventory->nama_barang }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Kategori</span>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ $inventory->kategori }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Status & Lokasi -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                                Status & Lokasi
                            </h3>

                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Status Barang</span>
                                    @php
                                    $statusBadgeColors = [
                                    'Baik' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                    'Rusak Ringan' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900
                                    dark:text-yellow-200',
                                    'Rusak Berat' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                                    'Perlu Perbaikan' => 'bg-orange-100 text-orange-800 dark:bg-orange-900
                                    dark:text-orange-200',
                                    'Hilang' => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'
                                    ];
                                    $statusBadgeColor = $statusBadgeColors[$inventory->status] ?? 'bg-gray-100
                                    text-gray-800';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusBadgeColor }}">
                                        <i class="fas 
                                            {{ $inventory->status == 'Baik' ? 'fa-check-circle' : '' }}
                                            {{ $inventory->status == 'Rusak Ringan' ? 'fa-exclamation-triangle' : '' }}
                                            {{ $inventory->status == 'Rusak Berat' ? 'fa-times-circle' : '' }}
                                            {{ $inventory->status == 'Perlu Perbaikan' ? 'fa-tools' : '' }}
                                            {{ $inventory->status == 'Hilang' ? 'fa-question-circle' : '' }}
                                            mr-1"></i>
                                        {{ $inventory->status }}
                                    </span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Lokasi Barang</span>
                                    <span
                                        class="text-gray-800 dark:text-white font-semibold">{{ $inventory->lokasi_barang }}</span>
                                </div>

                                <div
                                    class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400 font-medium">Status Sistem</span>
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $inventory->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        <i class="fas {{ $inventory->is_active ? 'fa-check' : 'fa-times' }} mr-1"></i>
                                        {{ $inventory->is_active ? 'Aktif' : 'Non-Aktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                        <div>
                            <i class="fas fa-calendar mr-2"></i>
                            Data diperbarui: {{ $inventory->updated_at->format('d/m/Y H:i') }}
                        </div>
                        <div>
                            <i class="fas fa-warehouse mr-2"></i>
                            Sistem Inventory Sekolah
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('inventories.edit', $inventory) }}" class="btn-primary">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data Inventory
                </a>
                <a href="{{ route('inventories.index') }}" class="btn-secondary">
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
        background: linear-gradient(135deg, #f59e0b, #d97706) !important;
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