@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')

    <div class="flex-1 p-8 bg-slate-50/50 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <h1 class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent mb-3 tracking-tighter italic">
                    Faculty <span class="text-slate-900 not-italic">Profile</span>
                </h1>
                <p class="text-slate-500 font-bold uppercase tracking-[0.2em] text-xs">Verify faculty records and identification.</p>
            </div>

            <!-- Teacher Profile Card -->
            <div class="glass-card overflow-hidden border-none shadow-2xl bg-white/80">
                <!-- Header -->
                <div class="bg-gradient-to-br from-primary-600 to-indigo-700 p-10">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="w-32 h-32 bg-white/10 backdrop-blur-xl rounded-3xl flex items-center justify-center border border-white/20 shadow-2xl relative overflow-hidden group">
                           @if($teacher->foto)
                                <img src="{{ asset('storage/' . $teacher->foto) }}" class="w-full h-full object-cover">
                           @else
                                <i class="fas fa-chalkboard-teacher text-white text-5xl opacity-40 group-hover:scale-110 transition-transform duration-500"></i>
                                <span class="absolute text-3xl font-black text-white/20 bottom-[-5px] right-[-5px]">FACULTY</span>
                           @endif
                        </div>
                        <div class="text-center md:text-left">
                            <div class="flex flex-wrap justify-center md:justify-start items-center gap-3 mb-3">
                                <h2 class="text-4xl font-black text-white tracking-tight">{{ $teacher->nama }}</h2>
                                <span class="px-4 py-1 bg-white/10 backdrop-blur-md text-white rounded-full text-[10px] font-black uppercase tracking-[0.2em] border border-white/20">
                                    {{ $teacher->is_active ? 'Active Status' : 'Offline' }}
                                </span>
                            </div>
                            <div class="flex flex-wrap justify-center md:justify-start items-center gap-6 text-white/70">
                                <p class="flex items-center gap-2"><i class="fas fa-user-tag opacity-60"></i> <span class="font-bold tracking-tight">{{ $teacher->jabatan }}</span></p>
                                <p class="flex items-center gap-2 font-mono text-sm tracking-widest"><i class="fas fa-id-badge opacity-60"></i> {{ $teacher->nip }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <!-- Informasi Pribadi -->
                        <div class="space-y-8">
                            <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 flex items-center gap-3">
                                <div class="w-8 h-1 bg-primary-600 rounded-full"></div>
                                Personal Identification
                            </h3>

                            <div class="space-y-6">
                                <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Employee NIP</span>
                                    <span class="text-lg font-black text-slate-900 font-mono">{{ $teacher->nip }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Full Authority Name</span>
                                    <span class="text-lg font-black text-slate-900 tracking-tight">{{ $teacher->nama }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Designated Role</span>
                                    <span class="text-lg font-black text-slate-900 tracking-tight">{{ $teacher->jabatan }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Kontak & Status -->
                        <div class="space-y-8">
                            <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 flex items-center gap-3">
                                <div class="w-8 h-1 bg-indigo-600 rounded-full"></div>
                                Communications & Metadata
                            </h3>

                            <div class="space-y-6">
                                <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Secure Link (HP)</span>
                                    <span class="text-lg font-black text-slate-900 font-mono tracking-tighter">{{ $teacher->no_hp }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">E-Mail Address</span>
                                    <span class="text-lg font-black text-primary-600 tracking-tight">{{ $teacher->email }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                                    <span class="text-sm font-bold text-slate-400 uppercase tracking-widest">Engagement Status</span>
                                    <span class="inline-flex items-center px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $teacher->is_active ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm' : 'bg-red-50 text-red-600 border border-red-100 shadow-sm' }}">
                                        <i class="fas {{ $teacher->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>
                                        {{ $teacher->is_active ? 'System Active' : 'System Disabled' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-12">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 flex items-center gap-3 mb-6">
                            <div class="w-8 h-1 bg-amber-500 rounded-full"></div>
                            Residential Protocol
                        </h3>
                        <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100 relative overflow-hidden group">
                            <i class="fas fa-map-marked-alt absolute bottom-[-10px] right-[-10px] text-slate-100 text-6xl group-hover:scale-110 transition-transform"></i>
                            <p class="text-lg font-bold text-slate-700 relative z-10 leading-relaxed">{{ $teacher->alamat }}</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-slate-50/50 px-10 py-6 border-t border-slate-100">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-history text-primary-500 text-xs"></i>
                            Last Synchronized: <span class="text-slate-600">{{ $teacher->updated_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-shield-alt text-indigo-500 text-xs"></i>
                            Encrypted Portal Node: <span class="text-slate-600">SMK Negeri 1 Contoh</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-12 flex flex-col sm:flex-row gap-6">
                <a href="{{ route('teachers.edit', $teacher) }}" class="btn-primary !rounded-2xl py-5 px-10 flex-1 flex items-center justify-center gap-3 shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    <i class="fas fa-edit text-lg"></i>
                    <span class="font-black uppercase tracking-widest">Update Records</span>
                </a>
                <a href="{{ route('teachers.index') }}" class="glass-card !rounded-2xl py-5 px-10 flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
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