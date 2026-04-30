@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-6 lg:p-10 bg-slate-50/50 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl lg:text-5xl font-black tracking-tight text-slate-900 mb-3">
                        Tambah <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Siswa</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Catat data akademik resmi dan informasi profil siswa baru.</p>
                </div>
            </div>

            <div class="glass-card border-none shadow-2xl p-10 bg-white/80">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Identitas Diri</h3>
                        
                        <!-- Foto Profile -->
                        <div class="form-group bg-slate-50 p-8 rounded-3xl border border-slate-100 border-dashed">
                            <label for="foto" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400 mb-4 block">
                                <i class="fas fa-camera text-primary-500 mr-2 opacity-50"></i>
                                Foto Profil Siswa
                            </label>
                            <div class="flex items-center gap-6">
                                <div class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center border border-slate-200 shadow-inner">
                                    <i class="fas fa-user text-3xl text-slate-200"></i>
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="foto" id="foto" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 transition-all">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight mt-2 italic">Format: JPG, PNG, JPEG (MAKS: 2MB)</p>
                                </div>
                            </div>
                            @error('foto')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- NISN -->
                            <div class="form-group">
                                <label for="nisn" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-id-card text-primary-500 mr-2 opacity-50"></i>
                                    NISN (Nomor Induk Siswa Nasional)
                                </label>
                                <input type="text" name="nisn" id="nisn" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4" placeholder="Masukkan kode NISN..."
                                    value="{{ old('nisn') }}">
                                @error('nisn')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="nama" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-user text-primary-500 mr-2 opacity-50"></i>
                                    Nama Lengkap Siswa
                                </label>
                                <input type="text" name="nama" id="nama" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Masukkan nama sesuai ijazah..." value="{{ old('nama') }}">
                                @error('nama')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Data Akademik</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kelas -->
                            <div class="form-group">
                                <label for="kelas" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-graduation-cap text-primary-500 mr-2 opacity-50"></i>
                                    Kelas
                                </label>
                                <input type="text" name="kelas" id="kelas" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Contoh: X, XI, atau XII..." value="{{ old('kelas') }}">
                                @error('kelas')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jurusan -->
                            <div class="form-group">
                                <label for="jurusan" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-book text-primary-500 mr-2 opacity-50"></i>
                                    Jurusan / Spesialisasi
                                </label>
                                <select name="jurusan" id="jurusan" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600">
                                    <option value="">Pilih Jurusan...</option>
                                    <option value="Pengembangan Perangkat Lunak dan Gim" {{ old('jurusan') == 'Pengembangan Perangkat Lunak dan Gim' ? 'selected' : '' }}>PPLG (Rekayasa Perangkat Lunak)</option>
                                    <option value="Teknik Otomotif" {{ old('jurusan') == 'Teknik Otomotif' ? 'selected' : '' }}>Teknik Otomotif</option>
                                    <option value="Teknik Pengelasan dan Fabrikasi Logam" {{ old('jurusan') == 'Teknik Pengelasan dan Fabrikasi Logam' ? 'selected' : '' }}>Teknik Pengelasan</option>
                                    <option value="Broadcasting dan Film" {{ old('jurusan') == 'Broadcasting dan Film' ? 'selected' : '' }}>Broadcasting</option>
                                    <option value="Animasi" {{ old('jurusan') == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                </select>
                                @error('jurusan')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tanggal_lahir" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-calendar text-primary-500 mr-2 opacity-50"></i>
                                    Tanggal Lahir
                                </label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Angkatan -->
                            <div class="form-group">
                                <label for="angkatan" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-calendar-alt text-primary-500 mr-2 opacity-50"></i>
                                    Angkatan
                                </label>
                                <input type="number" name="angkatan" id="angkatan" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Tahun masuk, contoh: 2024" value="{{ old('angkatan') }}">
                                @error('angkatan')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="is_active" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-check-circle text-primary-500 mr-2 opacity-50"></i>
                                Status Aktif
                            </label>
                            <select name="is_active" id="is_active" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.2em] text-[10px] py-4 text-slate-600">
                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('is_active')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 pt-10 border-t border-slate-50">
                        <button type="submit" class="btn-primary flex-1 py-5 !rounded-2xl shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                            <i class="fas fa-save mr-3 text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-[0.2em]">Simpan Data Siswa</span>
                        </button>
                        <a href="{{ route('students.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
                            <i class="fas fa-arrow-left text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-widest text-[10px]">Batal</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection