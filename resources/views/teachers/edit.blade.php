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
                        Modify <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Teacher</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Update faculty node: {{ $teacher->nama }}</p>
                </div>
            </div>

            <div class="glass-card border-none shadow-2xl p-10 bg-white/80">
                <form action="{{ route('teachers.update', $teacher) }}" method="POST" class="space-y-10">
                    @csrf
                    @method('PUT')

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Identity Core</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- NIP -->
                            <div class="form-group">
                                <label for="nip" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-id-card text-primary-500 mr-2 opacity-50"></i>
                                    Registration NIP
                                </label>
                                <input type="text" name="nip" id="nip" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4" placeholder="Enter NIP code..."
                                    value="{{ old('nip', $teacher->nip) }}">
                                @error('nip')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="nama" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-user text-primary-500 mr-2 opacity-50"></i>
                                    Legal Identification Name
                                </label>
                                <input type="text" name="nama" id="nama" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Enter full legal name..." value="{{ old('nama', $teacher->nama) }}">
                                @error('nama')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Professional Assignment</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Jabatan -->
                            <div class="form-group">
                                <label for="jabatan" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-briefcase text-primary-500 mr-2 opacity-50"></i>
                                    Functional Position
                                </label>
                                <input type="text" name="jabatan" id="jabatan" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Enter position role..." value="{{ old('jabatan', $teacher->jabatan) }}">
                                @error('jabatan')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- No HP -->
                            <div class="form-group">
                                <label for="no_hp" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-phone text-primary-500 mr-2 opacity-50"></i>
                                    Communication Line
                                </label>
                                <input type="text" name="no_hp" id="no_hp" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Enter contact number..." value="{{ old('no_hp', $teacher->no_hp) }}">
                                @error('no_hp')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-envelope text-primary-500 mr-2 opacity-50"></i>
                                Official Portal Email
                            </label>
                            <input type="email" name="email" id="email" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4" placeholder="Enter registration email..."
                                value="{{ old('email', $teacher->email) }}">
                            @error('email')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-map-marker-alt text-primary-500 mr-2 opacity-50"></i>
                                Residence Locality
                            </label>
                            <textarea name="alamat" id="alamat" class="form-textarea !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4" placeholder="Enter physical address details..."
                                rows="3">{{ old('alamat', $teacher->alamat) }}</textarea>
                            @error('alamat')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="is_active" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-check-circle text-primary-500 mr-2 opacity-50"></i>
                                Authorization Status
                            </label>
                            <select name="is_active" id="is_active" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.2em] text-[10px] py-4 text-slate-600">
                                <option value="1" {{ old('is_active', $teacher->is_active) == '1' ? 'selected' : '' }}>Authorized Active</option>
                                <option value="0" {{ old('is_active', $teacher->is_active) == '0' ? 'selected' : '' }}>Locked Offline</option>
                            </select>
                            @error('is_active')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 pt-10 border-t border-slate-50">
                        <button type="submit" class="btn-primary flex-1 py-5 !rounded-2xl shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                            <i class="fas fa-save mr-3 text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-[0.2em]">Update Faculty Node</span>
                        </button>
                        <a href="{{ route('teachers.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
                            <i class="fas fa-arrow-left text-lg opacity-50"></i>
                            <span class="font-black uppercase tracking-widest text-[10px]">Back to Directory</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection