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
                    Daftar Peminjaman
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Kelola data peminjaman barang inventaris</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Peminjaman</p>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $borrowings->total() }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-hand-holding text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Sedang Dipinjam</p>
                            <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">
                                {{ $borrowings->where('status_peminjaman', 'dipinjam')->count() }}
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-clock text-orange-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Sudah Dikembalikan</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                {{ $borrowings->where('status_peminjaman', 'dikembalikan')->count() }}
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-6 border border-gray-100 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <a href="{{ route('borrowings.create') }}" class="btn-primary">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Peminjaman
                    </a>

                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            Total: {{ $borrowings->total() }} data
                        </span>
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
                                    Barang
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Peminjam
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Kelas
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Keperluan
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($borrowings as $borrowing)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <!-- Barang -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-800 dark:text-white">
                                                {{ $borrowing->inventory->nama_barang }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ $borrowing->inventory->kode_barang }} -
                                                {{ $borrowing->inventory->kategori }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Peminjam -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-800 dark:text-white">
                                        {{ $borrowing->peminjam_nama }}
                                    </div>
                                </td>

                                <!-- Kelas -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800 dark:text-white">
                                        {{ $borrowing->peminjam_kelas }}
                                    </div>
                                </td>

                                <!-- Keperluan -->
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-800 dark:text-white max-w-xs truncate"
                                        title="{{ $borrowing->keperluan }}">
                                        {{ $borrowing->keperluan }}
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($borrowing->status_peminjaman == 'dipinjam')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        <i class="fas fa-clock mr-1"></i>
                                        Dipinjam
                                    </span>
                                    @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Dikembalikan
                                    </span>
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        @if($borrowing->status_peminjaman == 'dipinjam')
                                        <form action="{{ route('borrowings.return', $borrowing) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 transition-colors"
                                                title="Kembalikan Barang"
                                                onclick="return confirm('Apakah Anda yakin barang sudah dikembalikan?')">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('borrowings.edit', $borrowing) }}"
                                            class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300 transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                                title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center">
                                    <div
                                        class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                        <i class="fas fa-hand-holding text-4xl mb-3"></i>
                                        <p class="text-lg font-semibold">Tidak ada data peminjaman</p>
                                        <p class="text-sm">Mulai dengan menambahkan peminjaman baru</p>
                                        <a href="{{ route('borrowings.create') }}" class="mt-4 btn-primary">
                                            <i class="fas fa-plus mr-2"></i>
                                            Tambah Peminjaman Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($borrowings->hasPages())
                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    {{ $borrowings->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.btn-primary {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}
</style>
@endsection