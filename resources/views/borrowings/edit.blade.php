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
                        Edit <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Peminjaman</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Sesuaikan data peminjaman aset untuk kebutuhan operasional sekolah.</p>
                </div>
            </div>

            <div class="glass-card border-none shadow-2xl p-10 bg-white/80">
                <form action="{{ route('borrowings.update', $borrowing) }}" method="POST" class="space-y-10">
                    @csrf
                    @method('PUT')

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Detail Peminjaman</h3>
                        
                        <!-- Barang yang Dipinjam -->
                        <div class="form-group bg-slate-50 p-8 rounded-3xl border border-slate-100 border-dashed">
                            <label for="inventory_id" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400 mb-4 block">
                                <i class="fas fa-box text-primary-500 mr-2 opacity-50"></i>
                                Aset yang Dipinjam
                            </label>
                            <select name="inventory_id" id="inventory_id" class="form-select !rounded-2xl border-slate-100 bg-white font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600 shadow-sm" required>
                                <option value="">Pilih aset...</option>
                                @foreach($availableItems as $item)
                                <option value="{{ $item->id }}" {{ $borrowing->inventory_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_barang }} [{{ $item->kode_barang }}] - {{ $item->kategori }}
                                </option>
                                @endforeach
                            </select>
                            @error('inventory_id')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Nama Peminjam -->
                            <div class="form-group">
                                <label for="peminjam_nama" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-user text-primary-500 mr-2 opacity-50"></i>
                                    Nama Lengkap Peminjam
                                </label>
                                <input type="text" name="peminjam_nama" id="peminjam_nama" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Masukkan nama peminjam..." value="{{ old('peminjam_nama', $borrowing->peminjam_nama) }}" required>
                                @error('peminjam_nama')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kelas -->
                            <div class="form-group">
                                <label for="peminjam_kelas" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-graduation-cap text-primary-500 mr-2 opacity-50"></i>
                                    Kelas / Unit Kerja
                                </label>
                                <input type="text" name="peminjam_kelas" id="peminjam_kelas" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Contoh: XII RPL 1 / Guru..." value="{{ old('peminjam_kelas', $borrowing->peminjam_kelas) }}" required>
                                @error('peminjam_kelas')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Keperluan Peminjaman -->
                        <div class="form-group">
                            <label for="keperluan" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-clipboard-list text-primary-500 mr-2 opacity-50"></i>
                                Keperluan Peminjaman
                            </label>
                            <textarea name="keperluan" id="keperluan" class="form-input !rounded-3xl border-slate-100 bg-slate-50/50 font-medium tracking-tight p-6" rows="4"
                                placeholder="Jelaskan tujuan peminjaman aset ini..." required>{{ old('keperluan', $borrowing->keperluan) }}</textarea>
                            @error('keperluan')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Peminjaman -->
                        <div class="form-group">
                            <label for="status_peminjaman" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-info-circle text-primary-500 mr-2 opacity-50"></i>
                                Status Peminjaman
                            </label>
                            <select name="status_peminjaman" id="status_peminjaman" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.2em] text-[10px] py-4 text-slate-600" required>
                                <option value="dipinjam" {{ $borrowing->status_peminjaman == 'dipinjam' ? 'selected' : '' }}>Sedang Dipinjam</option>
                                <option value="dikembalikan" {{ $borrowing->status_peminjaman == 'dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                            </select>
                            @error('status_peminjaman')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 pt-10 border-t border-slate-50">
                        <button type="submit" class="btn-primary flex-1 py-5 !rounded-2xl shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                            <i class="fas fa-save mr-3 text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-[0.2em]">Simpan Perubahan</span>
                        </button>
                        <a href="{{ route('borrowings.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
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