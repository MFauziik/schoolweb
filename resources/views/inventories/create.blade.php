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
                    Tambah Fasilitas Baru
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Isi data fasilitas dengan lengkap dan benar</p>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <form action="{{ route('inventories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Grid untuk Kode Barang dan Nama Barang -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kode Barang -->
                        <div class="form-group">
                            <label for="kode_barang" class="form-label">
                                <i class="fas fa-barcode text-green-500 mr-2"></i>
                                Kode Barang
                            </label>
                            <input type="text" name="kode_barang" id="kode_barang" class="form-input"
                                placeholder="Masukkan kode barang" value="{{ old('kode_barang') }}">
                            @error('kode_barang')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Barang -->
                        <div class="form-group">
                            <label for="nama_barang" class="form-label">
                                <i class="fas fa-box text-purple-500 mr-2"></i>
                                Nama Barang
                            </label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-input"
                                placeholder="Masukkan nama barang" value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Grid untuk Kategori dan Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kategori -->
                        <div class="form-group">
                            <label for="kategori" class="form-label">
                                <i class="fas fa-tags text-amber-500 mr-2"></i>
                                Kategori
                            </label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option value="">Pilih Kategori</option>
                                <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>
                                    Elektronik</option>
                                <option value="Laboratorium" {{ old('kategori') == 'Laboratorium' ? 'selected' : '' }}>
                                    Laboratorium</option>
                                <option value="Olahraga" {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>Olahraga
                                </option>
                                <option value="Perabotan" {{ old('kategori') == 'Perabotan' ? 'selected' : '' }}>
                                    Perabotan</option>
                                <option value="Buku" {{ old('kategori') == 'Buku' ? 'selected' : '' }}>Buku</option>
                                <option value="Alat Tulis" {{ old('kategori') == 'Alat Tulis' ? 'selected' : '' }}>Alat
                                    Tulis</option>
                            </select>
                            @error('kategori')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="form-label">
                                <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                Status Barang
                            </label>
                            <select name="status" id="status" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="Baik" {{ old('status') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('status') == 'Rusak Ringan' ? 'selected' : '' }}>
                                    Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('status') == 'Rusak Berat' ? 'selected' : '' }}>Rusak
                                    Berat</option>
                                <option value="Perlu Perbaikan"
                                    {{ old('status') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                <option value="Hilang" {{ old('status') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                            </select>
                            @error('status')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Lokasi Barang -->
                    <div class="form-group">
                        <label for="lokasi_barang" class="form-label">
                            <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                            Lokasi Barang
                        </label>
                        <input type="text" name="lokasi_barang" id="lokasi_barang" class="form-input"
                            placeholder="Masukkan lokasi barang" value="{{ old('lokasi_barang') }}">
                        @error('lokasi_barang')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Aktif -->
                    <div class="form-group">
                        <label for="is_active" class="form-label">
                            <i class="fas fa-check-circle text-purple-500 mr-2"></i>
                            Status Aktif
                        </label>
                        <select name="is_active" id="is_active" class="form-select">
                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('is_active')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Data Fasilitas
                        </button>
                        <a href="{{ route('inventories.index') }}" class="btn-secondary text-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Daftar
                        </a>
                    </div>
                </form>
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
    ring: 2px;
    ring-color: #3b82f6;
    border-color: transparent;
}

.form-error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.btn-primary {
    display: flex;
    flex: 1;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    transition: all 0.3s;
    align-items: center;
    justify-content: center;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: scale(1.05);
}

.btn-secondary {
    display: flex;
    flex: 1;
    background-color: #6b7280;
    color: white;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    transition: all 0.3s;
    align-items: center;
    justify-content: center;
}

.btn-secondary:hover {
    background-color: #4b5563;
}
</style>
@endsection