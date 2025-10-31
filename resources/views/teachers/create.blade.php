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
                    Tambah Guru Baru
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Isi data guru dengan lengkap dan benar</p>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                <form action="{{ route('teachers.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Grid untuk NIP dan Nama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NIP -->
                        <div class="form-group">
                            <label for="nip" class="form-label">
                                <i class="fas fa-id-card text-green-500 mr-2"></i>
                                NIP
                            </label>
                            <input type="text" name="nip" id="nip" class="form-input" placeholder="Masukkan NIP"
                                value="{{ old('nip') }}">
                            @error('nip')
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

                    <!-- Grid untuk Jabatan dan No HP -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Jabatan -->
                        <div class="form-group">
                            <label for="jabatan" class="form-label">
                                <i class="fas fa-briefcase text-amber-500 mr-2"></i>
                                Jabatan
                            </label>
                            <input type="text" name="jabatan" id="jabatan" class="form-input"
                                placeholder="Masukkan jabatan" value="{{ old('jabatan') }}">
                            @error('jabatan')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No HP -->
                        <div class="form-group">
                            <label for="no_hp" class="form-label">
                                <i class="fas fa-phone text-blue-500 mr-2"></i>
                                No HP
                            </label>
                            <input type="text" name="no_hp" id="no_hp" class="form-input"
                                placeholder="Masukkan nomor HP" value="{{ old('no_hp') }}">
                            @error('no_hp')
                            <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope text-red-500 mr-2"></i>
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="form-input" placeholder="Masukkan email"
                            value="{{ old('email') }}">
                        @error('email')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat" class="form-label">
                            <i class="fas fa-map-marker-alt text-green-500 mr-2"></i>
                            Alamat
                        </label>
                        <textarea name="alamat" id="alamat" class="form-textarea" placeholder="Masukkan alamat lengkap"
                            rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
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
                            Simpan Data Guru
                        </button>
                        <a href="{{ route('teachers.index') }}" class="btn-secondary text-center">
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
.form-select,
.form-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 0.75rem;
    background-color: white;
    color: #1f2937;
    transition: all 0.2s;
}

.dark .form-input,
.dark .form-select,
.dark .form-textarea {
    background-color: #374151;
    border-color: #4b5563;
    color: white;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
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