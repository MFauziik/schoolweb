@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')

    <div
    <!-- Main Content -->
    <div class="flex-1 p-6 lg:p-10 bg-slate-50/50 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl lg:text-5xl font-black tracking-tight text-slate-900 mb-3">
                        Reconfigure <span class="bg-gradient-to-r from-amber-500 to-orange-600 bg-clip-text text-transparent">Asset</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Update telemetry parameters for node: {{ $inventory->nama_barang }}</p>
                </div>
            </div>

            <div class="glass-card border-none shadow-2xl p-10 bg-white/80">
                <form action="{{ route('inventories.update', $inventory) }}" method="POST" class="space-y-10">
                    @csrf
                    @method('PUT')

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-amber-600 border-b border-amber-100 pb-4">Asset Specification</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kode Barang -->
                            <div class="form-group">
                                <label for="kode_barang" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-barcode text-amber-500 mr-2 opacity-50"></i>
                                    Structural Asset Code
                                </label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Enter unique registry code..." value="{{ old('kode_barang', $inventory->kode_barang) }}">
                                @error('kode_barang')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Barang -->
                            <div class="form-group">
                                <label for="nama_barang" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-box text-amber-500 mr-2 opacity-50"></i>
                                    Functional Nomenclature
                                </label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Enter asset name..." value="{{ old('nama_barang', $inventory->nama_barang) }}">
                                @error('nama_barang')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kategori -->
                            <div class="form-group">
                                <label for="kategori" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-tags text-amber-500 mr-2 opacity-50"></i>
                                    Domain Classification
                                </label>
                                <select name="kategori" id="kategori" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600">
                                    <option value="">Select Domain</option>
                                    <option value="Elektronik" {{ old('kategori', $inventory->kategori) == 'Elektronik' ? 'selected' : '' }}>Electronic Hardware</option>
                                    <option value="Laboratorium" {{ old('kategori', $inventory->kategori) == 'Laboratorium' ? 'selected' : '' }}>Lab Apparatus</option>
                                    <option value="Olahraga" {{ old('kategori', $inventory->kategori) == 'Olahraga' ? 'selected' : '' }}>Kinesthetic Gear</option>
                                    <option value="Perabotan" {{ old('kategori', $inventory->kategori) == 'Perabotan' ? 'selected' : '' }}>Structural Furniture</option>
                                    <option value="Buku" {{ old('kategori', $inventory->kategori) == 'Buku' ? 'selected' : '' }}>Archived Knowledge</option>
                                    <option value="Alat Tulis" {{ old('kategori', $inventory->kategori) == 'Alat Tulis' ? 'selected' : '' }}>Operational Tools</option>
                                </select>
                                @error('kategori')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-info-circle text-amber-500 mr-2 opacity-50"></i>
                                    Integrity Status
                                </label>
                                <select name="status" id="status" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600">
                                    <option value="">Select Status</option>
                                    <option value="Baik" {{ old('status', $inventory->status) == 'Baik' ? 'selected' : '' }}>Nominal (Excellent)</option>
                                    <option value="Rusak Ringan" {{ old('status', $inventory->status) == 'Rusak Ringan' ? 'selected' : '' }}>Minor Degradation</option>
                                    <option value="Rusak Berat" {{ old('status', $inventory->status) == 'Rusak Berat' ? 'selected' : '' }}>Critical Failure</option>
                                    <option value="Perlu Perbaikan" {{ old('status', $inventory->status) == 'Perlu Perbaikan' ? 'selected' : '' }}>Maintenance Required</option>
                                    <option value="Hilang" {{ old('status', $inventory->status) == 'Hilang' ? 'selected' : '' }}>Entity Missing</option>
                                </select>
                                @error('status')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Lokasi Barang -->
                        <div class="form-group">
                            <label for="lokasi_barang" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-map-marker-alt text-amber-500 mr-2 opacity-50"></i>
                                Strategic Localization
                            </label>
                            <input type="text" name="lokasi_barang" id="lokasi_barang" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                placeholder="Enter deployment room/sector..." value="{{ old('lokasi_barang', $inventory->lokasi_barang) }}">
                            @error('lokasi_barang')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Aktif -->
                        <div class="form-group">
                            <label for="is_active" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-check-circle text-amber-500 mr-2 opacity-50"></i>
                                Operational Authorization
                            </label>
                            <select name="is_active" id="is_active" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.2em] text-[10px] py-4 text-slate-600">
                                <option value="1" {{ old('is_active', $inventory->is_active) == 1 ? 'selected' : '' }}>Authorized Active</option>
                                <option value="0" {{ old('is_active', $inventory->is_active) == 0 ? 'selected' : '' }}>Locked Offline</option>
                            </select>
                            @error('is_active')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 pt-10 border-t border-slate-50">
                        <button type="submit" class="btn-primary !from-amber-500 !to-orange-600 flex-1 py-5 !rounded-2xl shadow-xl shadow-amber-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                            <i class="fas fa-save mr-3 text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-[0.2em]">Commit Configuration</span>
                        </button>
                        <a href="{{ route('inventories.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
                            <i class="fas fa-arrow-left text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-widest text-[10px]">Back to Registry</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection