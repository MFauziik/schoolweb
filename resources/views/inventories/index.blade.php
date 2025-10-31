@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')

    <div
        class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen theme-transition">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Daftar Inventory
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Kelola data inventaris sekolah</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Barang</p>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $inventories->total() }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-boxes text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Barang Baik</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                {{ $inventories->where('status', 'Baik')->count() }}
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Perlu Perbaikan</p>
                            <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">
                                {{ $inventories->whereIn('status', ['Rusak Ringan', 'Rusak Berat', 'Perlu Perbaikan'])->count() }}
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-tools text-yellow-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Kategori Terbanyak</p>
                            <p class="text-lg font-bold text-gray-800 dark:text-white truncate">
                                {{ $inventories->groupBy('kategori')->sortByDesc(function($group) { return $group->count(); })->keys()->first() ?? '-' }}
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-chart-pie text-purple-500 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-6 border border-gray-100 dark:border-gray-700">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-4">
                        <!-- Kiri: tombol tambah + search -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                            <a href="{{ route('inventories.create') }}" class="btn-primary">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Inventory
                            </a>
                            <div class="flex items-center gap-2 w-full sm:w-auto">
                                <div class="relative w-full sm:w-72">
                                    <span class="absolute left-3 top-2.5 text-gray-400"><i
                                            class="fas fa-search"></i></span>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari nama, kode, kategori, lokasi..."
                                        onkeydown="if(event.key==='Enter'){updateFilter('search', this.value)}"
                                        class="w-full border border-gray-300 dark:border-gray-600 rounded-lg pl-10 pr-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" />
                                </div>
                                <button
                                    onclick="updateFilter('search', document.querySelector('input[name=search]').value)"
                                    class="btn-secondary whitespace-nowrap">
                                    <i class="fas fa-search mr-2"></i>Cari
                                </button>
                            </div>
                        </div>

                        <!-- Kanan: filter -->
                        <div class="w-full lg:w-auto flex flex-col md:flex-row md:items-end gap-4 md:gap-6">
                            <!-- Filter Kategori -->
                            <div class="flex flex-col w-full md:w-auto">
                                <label class="text-xs text-gray-500 dark:text-gray-400 mb-1">Kategori</label>
                                <select name="kategori" onchange="updateFilter('kategori', this.value)"
                                    class="w-full md:w-56 border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                    <option value="">Semua Kategori</option>
                                    @isset($kategoris)
                                    @foreach($kategoris as $k)
                                    <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>{{ $k }}
                                    </option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>

                            <!-- Filter Status Barang -->
                            <div class="flex flex-col w-full md:w-auto">
                                <label class="text-xs text-gray-500 dark:text-gray-400 mb-1">Status Barang</label>
                                <select name="status" onchange="updateFilter('status', this.value)"
                                    class="w-full md:w-48 border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                    <option value="">Semua Status</option>
                                    @isset($statuses)
                                    @foreach($statuses as $s)
                                    <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ $s }}
                                    </option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Baris kedua: show per page + filter aktif badge -->
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Tampilkan:</span>
                            <select name="per_page" onchange="updatePerPage(this.value)"
                                class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                            </select>
                            <span class="text-sm text-gray-600 dark:text-gray-400">baris</span>
                        </div>

                        @if(request('kategori') || request('status') || request('search'))
                        <div class="flex flex-wrap items-center gap-2 text-xs">
                            <span
                                class="px-2 py-1 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">Filter
                                aktif:</span>
                            @if(request('kategori'))
                            <span
                                class="px-2 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">Kategori:
                                {{ request('kategori') }}</span>
                            @endif
                            @if(request('status'))
                            <span
                                class="px-2 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Status:
                                {{ request('status') }}</span>
                            @endif
                            @if(request('search'))
                            <span
                                class="px-2 py-1 rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">Cari:
                                {{ request('search') }}</span>
                            @endif
                            <button onclick="clearFilters()"
                                class="ml-2 inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-600 hover:bg-gray-700 text-white">
                                <i class="fas fa-times mr-1"></i>Clear
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-barcode mr-2"></i>Kode
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-box mr-2"></i>Nama Barang
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-tags mr-2"></i>Kategori
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-info-circle mr-2"></i>Status
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Lokasi
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-check-circle mr-2"></i>Aktif
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    <i class="fas fa-cog mr-2"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($inventories as $inventory)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <!-- Kode Barang -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-mono text-gray-800 dark:text-white">
                                        {{ $inventory->kode_barang }}</div>
                                </td>

                                <!-- Nama Barang -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $inventory->nama_barang }}</div>
                                </td>

                                <!-- Kategori -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ $inventory->kategori }}
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                    $statusColors = [
                                    'Baik' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                    'Rusak Ringan' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900
                                    dark:text-yellow-200',
                                    'Rusak Berat' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                                    'Perlu Perbaikan' => 'bg-orange-100 text-orange-800 dark:bg-orange-900
                                    dark:text-orange-200',
                                    'Hilang' => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'
                                    ];
                                    $statusColor = $statusColors[$inventory->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                        <i class="fas 
                                            {{ $inventory->status == 'Baik' ? 'fa-check-circle' : '' }}
                                            {{ $inventory->status == 'Rusak Ringan' ? 'fa-exclamation-triangle' : '' }}
                                            {{ $inventory->status == 'Rusak Berat' ? 'fa-times-circle' : '' }}
                                            {{ $inventory->status == 'Perlu Perbaikan' ? 'fa-tools' : '' }}
                                            {{ $inventory->status == 'Hilang' ? 'fa-question-circle' : '' }}
                                            mr-1"></i>
                                        {{ $inventory->status }}
                                    </span>
                                </td>

                                <!-- Lokasi -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800 dark:text-white">{{ $inventory->lokasi_barang }}
                                    </div>
                                </td>

                                <!-- Aktif -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $inventory->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        <i class="fas {{ $inventory->is_active ? 'fa-check' : 'fa-times' }} mr-1"></i>
                                        {{ $inventory->is_active ? 'Aktif' : 'Non-Aktif' }}
                                    </span>
                                </td>

                                <!-- Aksi -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('inventories.show', $inventory) }}"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                                            title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('inventories.edit', $inventory) }}"
                                            class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300 transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('inventories.destroy', $inventory) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                                title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $inventory->nama_barang }}?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center">
                                    <div
                                        class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                        <i class="fas fa-boxes text-4xl mb-3"></i>
                                        <p class="text-lg font-semibold">Tidak ada data fasilitas</p>
                                        <p class="text-sm">Mulai dengan menambahkan fasilitas baru</p>
                                        <a href="{{ route('inventories.create') }}" class="mt-4 btn-primary">
                                            <i class="fas fa-plus mr-2"></i>
                                            Tambah Fasilitas Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination & Info -->
                @if($inventories->hasPages() || $inventories->total() > 0)
                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            Menampilkan
                            <span class="font-semibold">{{ $inventories->firstItem() ?? 0 }}</span>
                            sampai
                            <span class="font-semibold">{{ $inventories->lastItem() ?? 0 }}</span>
                            dari
                            <span class="font-semibold">{{ $inventories->total() }}</span>
                            entri
                            @if(request('kategori') || request('status'))
                            (Filter:
                            @if(request('kategori'))
                            Kategori: {{ request('kategori') }}
                            @endif
                            @if(request('kategori') && request('status'))
                            ,
                            @endif
                            @if(request('status'))
                            Status: {{ request('status') }}
                            @endif
                            )
                            @endif
                        </div>

                        @if($inventories->hasPages())
                        {{ $inventories->appends(request()->query())->links() }}
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
function updateUrlParameter(key, value) {
    const url = new URL(window.location.href);

    if (value) {
        url.searchParams.set(key, value);
    } else {
        url.searchParams.delete(key);
    }

    if (key === 'kategori' || key === 'status' || key === 'per_page' || key === 'search') {
        url.searchParams.set('page', '1');
    }

    return url.toString();
}

function updateFilter(key, value) {
    window.location.href = updateUrlParameter(key, value);
}

function updatePerPage(value) {
    window.location.href = updateUrlParameter('per_page', value);
}

function clearFilters() {
    const url = new URL(window.location.href);
    url.searchParams.delete('kategori');
    url.searchParams.delete('status');
    url.searchParams.delete('search');
    url.searchParams.set('page', '1');
    window.location.href = url.toString();
}
</script>
@endsection