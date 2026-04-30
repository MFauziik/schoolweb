@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-8 bg-slate-50/50 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent mb-3 tracking-tighter italic">
                    Student <span class="text-slate-900 not-italic">Identity</span>
                </h1>
                <p class="text-slate-500 font-bold uppercase tracking-[0.2em] text-xs">Credential verification and academic records.</p>
            </div>

            <!-- Identity Card -->
            <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100 relative group">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary-50 rounded-full blur-3xl -mr-32 -mt-32 opacity-50 group-hover:bg-primary-100 transition-colors duration-1000"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-50 rounded-full blur-3xl -ml-32 -mb-32 opacity-50 group-hover:bg-indigo-100 transition-colors duration-1000"></div>

                <!-- Card Header -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 relative z-10">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center border border-white/10">
                                <i class="fas fa-graduation-cap text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-black text-white tracking-[0.2em]">STUDENT PASS</h2>
                                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Global Excellence Academic</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-mono font-bold tracking-widest">{{ $student->nisn }}</p>
                            <p class="text-primary-400 text-[10px] font-black tracking-[0.2em] uppercase mt-1">Official Identification</p>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-10 relative z-10">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-12">
                        <!-- Foto -->
                        <div class="flex-shrink-0">
                            <div class="w-56 h-56 bg-slate-100 rounded-[2.5rem] border-8 border-white overflow-hidden shadow-2xl relative group/img">
                                @if($student->foto)
                                <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto Siswa"
                                    class="w-full h-full object-cover group-hover/img:scale-110 transition-transform duration-700">
                                @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                    <i class="fas fa-user text-slate-300 text-7xl"></i>
                                </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover/img:opacity-100 transition-opacity"></div>
                            </div>
                            <div class="mt-6 text-center">
                                <div class="bg-primary-50 text-primary-600 rounded-full px-6 py-2 inline-block border border-primary-100 shadow-sm">
                                    <p class="text-xs font-black uppercase tracking-widest">{{ $student->kelas }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Siswa -->
                        <div class="flex-1">
                            <div class="space-y-8">
                                <!-- Nama -->
                                <div class="border-b border-slate-100 pb-6">
                                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2">Legal Identity Name</p>
                                    <p class="text-4xl font-black text-slate-900 tracking-tight leading-none">{{ $student->nama }}</p>
                                </div>

                                <!-- Grid Info -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                                    <!-- NISN -->
                                    <div>
                                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2">Registry NISN</p>
                                        <p class="text-lg font-black text-slate-800 font-mono tracking-widest">{{ $student->nisn }}</p>
                                    </div>

                                    <!-- Jurusan -->
                                    <div>
                                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2">Department Node</p>
                                        <p class="text-lg font-black text-slate-800 tracking-tight">{{ $student->jurusan }}</p>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div>
                                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2">Origin Date</p>
                                        <p class="text-lg font-black text-slate-800 tracking-tight">
                                            {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d M Y') }}</p>
                                    </div>

                                    <!-- Angkatan -->
                                    <div>
                                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2">Cohort Year</p>
                                        <p class="text-lg font-black text-slate-800 tracking-tight">{{ $student->angkatan }}</p>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="pt-6">
                                    <div class="inline-flex items-center px-6 py-2.5 rounded-full {{ $student->is_active ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-red-50 text-red-600 border border-red-100' }} font-black text-[10px] uppercase tracking-[0.2em] shadow-sm">
                                        <div class="w-2 h-2 rounded-full {{ $student->is_active ? 'bg-emerald-500 animate-pulse' : 'bg-red-500' }} mr-3"></div>
                                        System Access: {{ $student->is_active ? 'Authorized' : 'Disabled' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="bg-slate-50/50 p-6 border-t border-slate-100 relative z-10">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-400 text-[10px] font-black tracking-widest uppercase">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-fingerprint text-primary-500 text-sm"></i>
                            Encrypted Biometric Verification Required
                        </div>
                        <div class="font-mono text-slate-300">
                            {{ \Carbon\Carbon::now()->format('d.m.Y // H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-12 flex flex-col sm:flex-row gap-6">
                <a href="{{ route('students.edit', $student) }}" class="btn-primary !rounded-2xl py-5 px-10 flex-1 flex items-center justify-center gap-3 shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    <i class="fas fa-edit text-lg"></i>
                    <span class="font-black uppercase tracking-widest">Update Identity</span>
                </a>
                <a href="{{ route('students.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
                    <i class="fas fa-arrow-left text-lg"></i>
                    <span class="font-black uppercase tracking-widest text-xs">Access Directory</span>
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')

@endpush
@endsection