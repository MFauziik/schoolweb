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
                        Tambah <span class="bg-gradient-to-r from-amber-500 to-orange-600 bg-clip-text text-transparent">Inventaris</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Daftarkan aset fisik baru ke dalam sistem manajemen inventaris sekolah.</p>
                </div>
            </div>

            <div class="glass-card border-none shadow-2xl p-10 bg-white/80">
                <form action="{{ route('inventories.store') }}" method="POST" class="space-y-10">
                    @csrf

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-amber-600 border-b border-amber-100 pb-4">Spesifikasi Aset</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kode Barang -->
                            <div class="form-group">
                                <label for="kode_barang" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-barcode text-amber-500 mr-2 opacity-50"></i>
                                    Kode Unik Barang
                                </label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Masukkan kode unik barang..." value="{{ old('kode_barang') }}">
                                @error('kode_barang')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Barang -->
                            <div class="form-group">
                                <label for="nama_barang" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-box text-amber-500 mr-2 opacity-50"></i>
                                    Nama Lengkap Barang
                                </label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Masukkan nama barang..." value="{{ old('nama_barang') }}">
                                @error('nama_barang')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kategori -->
                            <div class="form-group">
                                <label for="kategori" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-tags text-amber-500 mr-2 opacity-50"></i>
                                    Kategori / Bidang
                                </label>
                                <select name="kategori" id="kategori" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600">
                                    <option value="">Pilih Kategori...</option>
                                    <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>Peralatan Elektronik</option>
                                    <option value="Laboratorium" {{ old('kategori') == 'Laboratorium' ? 'selected' : '' }}>Peralatan Laboratorium</option>
                                    <option value="Olahraga" {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>Peralatan Olahraga</option>
                                    <option value="Perabotan" {{ old('kategori') == 'Perabotan' ? 'selected' : '' }}>Perabotan & Mebel</option>
                                    <option value="Buku" {{ old('kategori') == 'Buku' ? 'selected' : '' }}>Buku & Pustaka</option>
                                    <option value="Alat Tulis" {{ old('kategori') == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis Kantor (ATK)</option>
                                </select>
                                @error('kategori')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-info-circle text-amber-500 mr-2 opacity-50"></i>
                                    Kondisi Barang
                                </label>
                                <select name="status" id="status" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600">
                                    <option value="">Pilih Kondisi...</option>
                                    <option value="Baik" {{ old('status') == 'Baik' ? 'selected' : '' }}>Baik (Normal)</option>
                                    <option value="Rusak Ringan" {{ old('status') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                    <option value="Rusak Berat" {{ old('status') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                    <option value="Perlu Perbaikan" {{ old('status') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                    <option value="Hilang" {{ old('status') == 'Hilang' ? 'selected' : '' }}>Hilang / Tidak Ditemukan</option>
                                </select>
                                @error('status')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Lokasi Barang -->
                        <div class="form-group">
                            <label for="lokasi_barang" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-map-marker-alt text-amber-500 mr-2 opacity-50"></i>
                                Lokasi Penempatan
                            </label>
                            <input type="text" name="lokasi_barang" id="lokasi_barang" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                placeholder="Contoh: Ruang Lab Komputer, Perpustakaan..." value="{{ old('lokasi_barang') }}">
                            @error('lokasi_barang')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Aktif -->
                        <div class="form-group">
                            <label for="is_active" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-check-circle text-amber-500 mr-2 opacity-50"></i>
                                Status Inventaris
                            </label>
                            <select name="is_active" id="is_active" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.2em] text-[10px] py-4 text-slate-600">
                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif Tersedia</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('is_active')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 pt-10 border-t border-slate-50">
                        <button type="submit" class="btn-primary !from-amber-500 !to-orange-600 flex-1 py-5 !rounded-2xl shadow-xl shadow-amber-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                            <i class="fas fa-save mr-3 text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-[0.2em]">Simpan Data Inventaris</span>
                        </button>
                        <a href="{{ route('inventories.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
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