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
                        Modify <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Student</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Update academic node: {{ $student->nama }}</p>
                </div>
            </div>

            <div class="glass-card border-none shadow-2xl p-10 bg-white/80">
                <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @method('PUT')

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Identity Core</h3>
                        
                        <!-- Foto Profile -->
                        <div class="form-group bg-slate-50 p-8 rounded-3xl border border-slate-100 border-dashed">
                            <label for="foto" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400 mb-6 block">
                                <i class="fas fa-camera text-primary-500 mr-2 opacity-50"></i>
                                Biometric Profile Image
                            </label>
                            
                            <div class="flex flex-col md:flex-row items-center gap-10">
                                @if($student->foto)
                                <div class="relative group">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-primary-500 to-indigo-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                                    <img src="{{ asset('storage/' . $student->foto) }}" alt="Current Photo"
                                        class="relative w-32 h-32 rounded-2xl object-cover border border-white shadow-2xl">
                                    <div class="absolute -bottom-2 -right-2 bg-emerald-500 text-white w-8 h-8 rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                                        <i class="fas fa-check text-xs"></i>
                                    </div>
                                </div>
                                @else
                                <div class="w-32 h-32 bg-white rounded-2xl flex items-center justify-center border border-slate-200 shadow-inner">
                                    <i class="fas fa-user text-4xl text-slate-200"></i>
                                </div>
                                @endif
                                
                                <div class="flex-1 w-full md:w-auto">
                                    <input type="file" name="foto" id="foto" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 transition-all">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight mt-3 italic">Leave vacant to persist current structure. Format: JPG, PNG, JPEG (MAX: 2MB)</p>
                                </div>
                            </div>
                            @error('foto')
                            <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- NISN -->
                            <div class="form-group">
                                <label for="nisn" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-id-card text-primary-500 mr-2 opacity-50"></i>
                                    Registration NISN
                                </label>
                                <input type="text" name="nisn" id="nisn" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4" placeholder="Enter NISN code..."
                                    value="{{ old('nisn', $student->nisn) }}">
                                @error('nisn')
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
                                    placeholder="Enter full legal name..." value="{{ old('nama', $student->nama) }}">
                                @error('nama')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-primary-600 border-b border-primary-100 pb-4">Academic Placement</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kelas -->
                            <div class="form-group">
                                <label for="kelas" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-graduation-cap text-primary-500 mr-2 opacity-50"></i>
                                    Grade Classification
                                </label>
                                <input type="text" name="kelas" id="kelas" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Level: X, XI, XII..." value="{{ old('kelas', $student->kelas) }}">
                                @error('kelas')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jurusan -->
                            <div class="form-group">
                                <label for="jurusan" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-book text-primary-500 mr-2 opacity-50"></i>
                                    Department Specialization
                                </label>
                                <select name="jurusan" id="jurusan" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.1em] text-[10px] py-4 text-slate-600">
                                    <option value="">Select Knowledge Domain</option>
                                    <option value="Pengembangan Perangkat Lunak dan Gim" {{ old('jurusan', $student->jurusan) == 'Pengembangan Perangkat Lunak dan Gim' ? 'selected' : '' }}>PPLG (Software Engineering)</option>
                                    <option value="Teknik Otomotif" {{ old('jurusan', $student->jurusan) == 'Teknik Otomotif' ? 'selected' : '' }}>TO (Automotive Tech)</option>
                                    <option value="Teknik Pengelasan dan Fabrikasi Logam" {{ old('jurusan', $student->jurusan) == 'Teknik Pengelasan dan Fabrikasi Logam' ? 'selected' : '' }}>TPFL (Welding Tech)</option>
                                    <option value="Broadcasting dan Film" {{ old('jurusan', $student->jurusan) == 'Broadcasting dan Film' ? 'selected' : '' }}>BCF (Broadcasting)</option>
                                    <option value="Animasi" {{ old('jurusan', $student->jurusan) == 'Animasi' ? 'selected' : '' }}>ANI (Animation)</option>
                                </select>
                                @error('jurusan')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tanggal_lahir" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-calendar text-primary-500 mr-2 opacity-50"></i>
                                    Temporal Birth Date
                                </label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Angkatan -->
                            <div class="form-group">
                                <label for="angkatan" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                    <i class="fas fa-calendar-alt text-primary-500 mr-2 opacity-50"></i>
                                    Cohort Generation
                                </label>
                                <input type="number" name="angkatan" id="angkatan" class="form-input !rounded-2xl border-slate-100 bg-slate-50/50 font-bold tracking-tight py-4"
                                    placeholder="Entity Cohort e.g. 2024" value="{{ old('angkatan', $student->angkatan) }}">
                                @error('angkatan')
                                <p class="form-error text-[10px] font-black uppercase tracking-widest mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="is_active" class="form-label uppercase tracking-widest text-[10px] font-black text-slate-400">
                                <i class="fas fa-check-circle text-primary-500 mr-2 opacity-50"></i>
                                Authorization Status
                            </label>
                            <select name="is_active" id="is_active" class="form-select !rounded-2xl border-slate-100 bg-slate-50/50 font-black uppercase tracking-[0.2em] text-[10px] py-4 text-slate-600">
                                <option value="1" {{ old('is_active', $student->is_active) == '1' ? 'selected' : '' }}>Authorized Active</option>
                                <option value="0" {{ old('is_active', $student->is_active) == '0' ? 'selected' : '' }}>Locked Offline</option>
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
                            <span class="font-black uppercase tracking-[0.2em]">Update Student Node</span>
                        </button>
                        <a href="{{ route('students.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
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