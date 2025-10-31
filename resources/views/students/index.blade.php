@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div
        class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen theme-transition">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Daftar Siswa
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Kelola data siswa EduManage</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Siswa -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Siswa</p>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $students->total() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Siswa Aktif -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Siswa Aktif</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                {{ $students->where('is_active', true)->count() }}
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Siswa Non-Aktif -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Siswa Non-Aktif</p>
                            <p class="text-2xl font-bold text-red-600 dark:text-red-400">
                                {{ $students->where('is_active', false)->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-times-circle text-red-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Jurusan Terbanyak -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Jurusan Terbanyak</p>
                            <p class="text-lg font-bold text-gray-800 dark:text-white truncate">
                                {{ $students->groupBy('jurusan')->sortByDesc(function($group) { return $group->count(); })->keys()->first() ?? '-' }}
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
                            <a href="{{ route('students.create') }}" class="btn-primary">
                                <i class="fas fa-user-plus mr-2"></i>
                                Tambah Siswa Baru
                            </a>
                            <div class="flex items-center gap-2 w-full sm:w-auto">
                                <div class="relative w-full sm:w-72">
                                    <span class="absolute left-3 top-2.5 text-gray-400"><i
                                            class="fas fa-search"></i></span>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari nama, NISN, kelas..."
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
                            <!-- Filter Jurusan -->
                            <div class="flex flex-col w-full md:w-auto">
                                <label class="text-xs text-gray-500 dark:text-gray-400 mb-1">Jurusan</label>
                                <select name="jurusan" onchange="updateFilter('jurusan', this.value)"
                                    class="w-full md:w-56 border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                    <option value="">Semua Jurusan</option>
                                    <option value="Pengembangan Perangkat Lunak dan Gim"
                                        {{ request('jurusan') == 'Pengembangan Perangkat Lunak dan Gim' ? 'selected' : '' }}>
                                        PPLG</option>
                                    <option value="Teknik Otomotif"
                                        {{ request('jurusan') == 'Teknik Otomotif' ? 'selected' : '' }}>Teknik Otomotif
                                    </option>
                                    <option value="Teknik Pengelasan dan Fabrikasi Logam"
                                        {{ request('jurusan') == 'Teknik Pengelasan dan Fabrikasi Logam' ? 'selected' : '' }}>
                                        Pengelasan</option>
                                    <option value="Broadcasting dan Film"
                                        {{ request('jurusan') == 'Broadcasting dan Film' ? 'selected' : '' }}>
                                        Broadcasting</option>
                                    <option value="Animasi" {{ request('jurusan') == 'Animasi' ? 'selected' : '' }}>
                                        Animasi</option>
                                </select>
                            </div>

                            <!-- Filter Status -->
                            <div class="flex flex-col w-full md:w-auto">
                                <label class="text-xs text-gray-500 dark:text-gray-400 mb-1">Status</label>
                                <select name="status" onchange="updateFilter('status', this.value)"
                                    class="w-full md:w-40 border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                    <option value="">Semua Status</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Non-Aktif
                                    </option>
                                </select>
                            </div>

                            <!-- Clear Filters (moved to badges area) -->
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

                        @if(request('jurusan') || request('status') || request('search'))
                        <div class="flex flex-wrap items-center gap-2 text-xs">
                            <span
                                class="px-2 py-1 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">Filter
                                aktif:</span>
                            @if(request('jurusan'))
                            <span
                                class="px-2 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">Jurusan:
                                {{ request('jurusan') }}</span>
                            @endif
                            @if(request('status') !== null && request('status') !== '')
                            <span
                                class="px-2 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Status:
                                {{ request('status') == '1' ? 'Aktif' : 'Non-Aktif' }}</span>
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
                                <i class="fas fa-image mr-2"></i>Foto
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-id-card mr-2"></i>NISN
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-user mr-2"></i>Nama
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-graduation-cap mr-2"></i>Kelas & Jurusan
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-calendar mr-2"></i>Angkatan
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-check-circle mr-2"></i>Status
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                <i class="fas fa-cog mr-2"></i>Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($students as $student)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <!-- Foto -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div
                                    class="w-12 h-12 rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-600">
                                    @if($student->foto)
                                    <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto"
                                        class="w-full h-full object-cover">
                                    @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    @endif
                                </div>
                            </td>

                            <!-- NISN -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-mono text-gray-800 dark:text-white">{{ $student->nisn }}
                                </div>
                            </td>

                            <!-- Nama -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $student->nama }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($student->tanggal_lahir)->age }} tahun
                                </div>
                            </td>

                            <!-- Kelas & Jurusan -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $student->kelas }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->jurusan }}</div>
                            </td>

                            <!-- Angkatan -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ $student->angkatan }}
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $student->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    <i
                                        class="fas {{ $student->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                    {{ $student->is_active ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </td>

                            <!-- Aksi -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('students.show', $student) }}"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                                        title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student) }}"
                                        class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300 transition-colors"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                            title="Hapus"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus siswa {{ $student->nama }}?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-users text-4xl mb-3"></i>
                                    <p class="text-lg font-semibold">Tidak ada data siswa</p>
                                    <p class="text-sm">
                                        @if(request('jurusan') || request('status'))
                                        Tidak ditemukan siswa dengan filter yang dipilih
                                        @else
                                        Mulai dengan menambahkan siswa baru
                                        @endif
                                    </p>
                                    <a href="{{ route('students.create') }}" class="mt-4 btn-primary">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Tambah Siswa Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination & Info -->
            @if($students->hasPages() || $students->total() > 0)
            <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Menampilkan
                        <span class="font-semibold">{{ $students->firstItem() ?? 0 }}</span>
                        sampai
                        <span class="font-semibold">{{ $students->lastItem() ?? 0 }}</span>
                        dari
                        <span class="font-semibold">{{ $students->total() }}</span>
                        entri
                        @if(request('jurusan') || request('status'))
                        (Filter:
                        @if(request('jurusan'))
                        Jurusan: {{ request('jurusan') }}
                        @endif
                        @if(request('jurusan') && request('status'))
                        ,
                        @endif
                        @if(request('status'))
                        Status: {{ request('status') == '1' ? 'Aktif' : 'Non-Aktif' }}
                        @endif
                        )
                        @endif
                    </div>

                    @if($students->hasPages())
                    {{ $students->appends(request()->query())->links() }}
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

    // Reset to page 1 when changing filter, sort or per_page
    if (key === 'jurusan' || key === 'status' || key === 'sort_by' || key === 'sort_order' || key === 'per_page') {
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

// Sorting removed

function clearFilters() {
    const url = new URL(window.location.href);
    // Remove filter parameters
    url.searchParams.delete('jurusan');
    url.searchParams.delete('status');
    url.searchParams.delete('search');
    url.searchParams.set('page', '1'); // Reset to page 1
    window.location.href = url.toString();
}
</script>

<style>
.btn-primary {
    @apply bg-blue-600 hover: bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium;
}

.btn-secondary {
    @apply bg-gray-600 hover: bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium;
}

.cursor-pointer {
    cursor: pointer;
}
</style>
@endsection