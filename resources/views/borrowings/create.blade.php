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
                    Form Peminjaman Barang
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Isi data peminjaman dengan lengkap dan benar</p>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">

                @if(isset($availableItems) && $availableItems->count() > 0)
                <form action="{{ route('borrowings.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Barang yang Dipinjam -->
                    <div class="form-group">
                        <label for="inventory_id" class="form-label">
                            <i class="fas fa-box text-purple-500 mr-2"></i>
                            Pilih Barang
                        </label>
                        <select name="inventory_id" id="inventory_id" class="form-select" required>
                            <option value="">Pilih Barang yang Akan Dipinjam</option>
                            @foreach($availableItems as $item)
                            <option value="{{ $item->id }}" {{ old('inventory_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_barang }} ({{ $item->kode_barang }}) - {{ $item->kategori }}
                                @if($item->status != 'Baik')
                                - <span class="text-red-500">Status: {{ $item->status }}</span>
                                @endif
                            </option>
                            @endforeach
                        </select>
                        @error('inventory_id')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grid untuk Nama Peminjam dan Kelas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Peminjam -->
                        <div class="form-group">
                            <label for="peminjam_nama" class="form-label">
                                <i class="fas fa-user text-green-500 mr-2"></i>
                                Nama Peminjam
                            </label>
                            <input type="text" name="peminjam_nama" id="peminjam_nama" class="form-input"
                                placeholder="Masukkan nama lengkap peminjam" value="{{ old('peminjam_nama') }}"
                                required>
                            @error('peminjam_nama')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="peminjam_kelas" class="form-label">
                                <i class="fas fa-graduation-cap text-blue-500 mr-2"></i>
                                Kelas / Jabatan
                            </label>
                            <input type="text" name="peminjam_kelas" id="peminjam_kelas" class="form-input"
                                placeholder="Contoh: X IPA 1, Guru Matematika, Staff TU"
                                value="{{ old('peminjam_kelas') }}" required>
                            @error('peminjam_kelas')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                Isi dengan kelas (untuk siswa) atau jabatan (untuk guru/staff)
                            </p>
                        </div>
                    </div>

                    <!-- Keperluan Peminjaman -->
                    <div class="form-group">
                        <label for="keperluan" class="form-label">
                            <i class="fas fa-clipboard-list text-amber-500 mr-2"></i>
                            Keperluan Peminjaman
                        </label>
                        <textarea name="keperluan" id="keperluan" class="form-input" rows="4"
                            placeholder="Jelaskan tujuan dan keperluan peminjaman barang ini"
                            required>{{ old('keperluan') }}</textarea>
                        @error('keperluan')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-hand-holding mr-2"></i>
                            Ajukan Peminjaman
                        </button>
                        <a href="{{ route('borrowings.index') }}" class="btn-secondary text-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Daftar
                        </a>
                    </div>
                </form>
                @else
                <div class="text-center py-8">
                    <div class="mb-4">
                        <i class="fas fa-box-open text-4xl text-gray-400 mb-3"></i>
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Tidak ada barang tersedia
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-2">
                            Semua barang sedang dipinjam atau tidak aktif.
                        </p>
                    </div>
                    <a href="{{ route('borrowings.index') }}" class="btn-secondary inline-flex">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.dark .form-label {
    color: #d1d5db;
}

.form-input,
.form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 0.75rem;
    background-color: white;
    color: #1f2937;
    transition: all 0.2s;
    font-size: 0.875rem;
}

.dark .form-input,
.dark .form-select {
    background-color: #374151;
    border-color: #4b5563;
    color: white;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

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
}

.btn-secondary {
    display: inline-flex;
    align-items: center;
    background-color: #6b7280;
    color: white;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    transition: all 0.3s;
    text-decoration: none;
}

.btn-secondary:hover {
    background-color: #4b5563;
    transform: translateY(-2px);
}
</style>
@endsection