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
                    Tambah Siswa Baru
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Isi data siswa dengan lengkap dan benar</p>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Foto Profile - SIMPLE VERSION -->
                    <div class="form-group">
                        <label for="foto" class="form-label">
                            <i class="fas fa-camera text-blue-500 mr-2"></i>
                            Foto Profil
                        </label>
                        <input type="file" name="foto" id="foto" class="form-input">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Format: JPG, PNG, JPEG (Maks. 2MB)
                        </p>
                        @error('foto')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grid untuk NISN dan Nama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NISN -->
                        <div class="form-group">
                            <label for="nisn" class="form-label">
                                <i class="fas fa-id-card text-green-500 mr-2"></i>
                                NISN
                            </label>
                            <input type="text" name="nisn" id="nisn" class="form-input" placeholder="Masukkan NISN"
                                value="{{ old('nisn') }}">
                            @error('nisn')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="nama" class="form-label">
                                <i class="fas fa-user text-purple-500 mr-2"></i>
                                Nama Lengkap
                            </label>
                            <input type="text" name="nama" id="nama" class="form-input"
                                placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
                            @error('nama')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Grid untuk Kelas dan Jurusan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="kelas" class="form-label">
                                <i class="fas fa-graduation-cap text-amber-500 mr-2"></i>
                                Kelas
                            </label>
                            <input type="text" name="kelas" id="kelas" class="form-input"
                                placeholder="Contoh: X, XI, XII" value="{{ old('kelas') }}">
                            @error('kelas')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jurusan -->
                        <div class="form-group">
                            <label for="jurusan" class="form-label">
                                <i class="fas fa-book text-red-500 mr-2"></i>
                                Jurusan
                            </label>
                            <select name="jurusan" id="jurusan" class="form-select">
                                <option value="">Pilih Jurusan</option>
                                <option value="Pengembangan Perangkat Lunak dan Gim"
                                    {{ old('jurusan') == 'Pengembangan Perangkat Lunak dan Gim' ? 'selected' : '' }}>
                                    Pengembangan Perangkat Lunak dan Gim
                                </option>
                                <option value="Teknik Otomotif"
                                    {{ old('jurusan') == 'Teknik Otomotif' ? 'selected' : '' }}>
                                    Teknik Otomotif
                                </option>
                                <option value="Teknik Pengelasan dan Fabrikasi Logam"
                                    {{ old('jurusan') == 'Teknik Pengelasan dan Fabrikasi Logam' ? 'selected' : '' }}>
                                    Teknik Pengelasan dan Fabrikasi Logam
                                </option>
                                <option value="Broadcasting dan Film"
                                    {{ old('jurusan') == 'Broadcasting dan Film' ? 'selected' : '' }}>
                                    Broadcasting dan Film
                                </option>
                                <option value="Animasi" {{ old('jurusan') == 'Animasi' ? 'selected' : '' }}>
                                    Animasi
                                </option>
                            </select>
                            @error('jurusan')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Grid untuk Tanggal Lahir dan Angkatan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="tanggal_lahir" class="form-label">
                                <i class="fas fa-calendar text-blue-500 mr-2"></i>
                                Tanggal Lahir
                            </label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Angkatan -->
                        <div class="form-group">
                            <label for="angkatan" class="form-label">
                                <i class="fas fa-calendar-alt text-green-500 mr-2"></i>
                                Angkatan
                            </label>
                            <input type="number" name="angkatan" id="angkatan" class="form-input"
                                placeholder="Contoh: 2024" value="{{ old('angkatan') }}">
                            @error('angkatan')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="is_active" class="form-label">
                            <i class="fas fa-check-circle text-purple-500 mr-2"></i>
                            Status
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
                            Simpan Data Siswa
                        </button>
                        <a href="{{ route('students.index') }}" class="btn-secondary text-center">
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