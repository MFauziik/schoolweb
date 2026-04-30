@extends('layouts.app')

@section('content')
<div class="relative">
    <!-- Hero Section -->
    <section class="relative pt-48 pb-32 md:pt-64 md:pb-48 px-6 z-10 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center">
            <div class="reveal">
                <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full glass-card border-primary-500/20 text-primary-600 font-black text-xs uppercase tracking-[0.2em] mb-10 mx-auto shadow-lg backdrop-blur-3xl">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-500"></span>
                    </span>
                    Sistem Informasi Manajemen Sekolah Terintegrasi
                </div>
                
                <h1 class="text-6xl md:text-8xl lg:text-[10rem] font-black tracking-tighter leading-[0.85] mb-12 drop-shadow-2xl">
                    Smart <br/>
                    <span class="bg-gradient-to-r from-primary-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent italic">Schooling.</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-slate-600 leading-relaxed mb-16 max-w-4xl mx-auto font-medium">
                    Kelola data siswa, guru, dan inventaris sekolah dengan satu dashboard yang intuitif. Membantu akreditasi dan pelaporan sekolah menjadi lebih efisien.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary !rounded-full py-5 px-12 text-xl w-full sm:w-auto text-center shadow-2xl shadow-primary-500/40 hover:scale-105 transition-all font-black uppercase tracking-widest">
                            Masuk ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary !rounded-full py-5 px-12 text-xl w-full sm:w-auto text-center shadow-2xl shadow-primary-500/40 hover:scale-105 transition-all font-black uppercase tracking-widest">
                            Daftar Sekarang
                        </a>
                        <a href="#features" class="glass-card !rounded-full py-5 px-12 text-xl w-full sm:w-auto text-center font-black uppercase tracking-widest hover:bg-white transition-all backdrop-blur-3xl">
                            Lihat Fitur <i class="fas fa-chevron-down ml-2 text-primary-500 text-sm"></i>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Scrolling Preview -->
            <div class="mt-48 reveal group">
                <div class="relative max-w-6xl mx-auto px-4 sm:px-0">
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary-500/10 to-indigo-500/10 rounded-[40px] blur-[100px] animate-pulse-slow"></div>
                    <div class="glass-card p-2 md:p-4 rounded-[5rem] relative border-white/60 shadow-2xl backdrop-blur-3xl overflow-hidden group-hover:scale-[1.02] transition-all duration-1000">
                         <!-- UI Mockup -->
                         <div class="bg-white rounded-[4rem] p-6 md:p-12 min-h-[400px] md:min-h-[600px] overflow-hidden border border-slate-50">
                            <div class="flex gap-10 items-start">
                                <div class="w-80 h-[500px] bg-slate-50 rounded-[3rem] p-8 hidden md:block shadow-inner">
                                    <div class="space-y-6">
                                        <div class="h-14 bg-primary-100 rounded-2xl w-full shadow-sm"></div>
                                        <div class="h-10 bg-slate-100 rounded-xl w-3/4"></div>
                                        <div class="h-10 bg-slate-100 rounded-xl w-2/3"></div>
                                        <div class="pt-12 space-y-4">
                                            <div class="h-4 bg-slate-100 rounded-md w-full"></div>
                                            <div class="h-4 bg-slate-100 rounded-md w-5/6"></div>
                                            <div class="h-4 bg-slate-100 rounded-md w-4/5"></div>
                                            <div class="h-4 bg-slate-100 rounded-md w-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 space-y-12">
                                    <div class="flex justify-between items-center">
                                        <div class="h-14 bg-slate-50 rounded-3xl w-48 md:w-64 border border-slate-100"></div>
                                        <div class="h-14 w-14 bg-slate-50 rounded-full border border-slate-100"></div>
                                    </div>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                                        <div class="h-32 bg-primary-50/50 rounded-[2rem] border border-primary-100 animate-pulse"></div>
                                        <div class="h-32 bg-indigo-50/50 rounded-[2rem] border border-indigo-100 animate-pulse" style="animation-delay: 0.2s"></div>
                                        <div class="h-32 bg-blue-50/50 rounded-[2rem] border border-blue-100 animate-pulse hidden md:block" style="animation-delay: 0.4s"></div>
                                    </div>
                                    <div class="h-64 bg-slate-50 rounded-[3.5rem] border border-slate-100 shadow-sm relative overflow-hidden">
                                        <div class="absolute inset-0 bg-gradient-to-br from-slate-50/50 to-white"></div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <!-- Glossy Overlay -->
                         <div class="absolute inset-0 bg-gradient-to-t from-white/30 via-transparent to-transparent pointer-events-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Ticker -->
    <section class="py-20 relative z-10 border-y border-slate-100 bg-white/50 backdrop-blur-3xl overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div class="reveal">
                    <span class="block text-5xl font-black text-slate-950 tracking-tighter mb-2">{{ number_format(1240) }}+</span>
                    <span class="text-[10px] uppercase font-black tracking-[0.5em] text-slate-400">Siswa Terdaftar</span>
                </div>
                <div class="reveal" style="transition-delay: 0.1s">
                    <span class="block text-5xl font-black text-slate-950 tracking-tighter mb-2">92+</span>
                    <span class="text-[10px] uppercase font-black tracking-[0.5em] text-slate-400">Guru & Staf</span>
                </div>
                <div class="reveal" style="transition-delay: 0.2s">
                    <span class="block text-5xl font-black text-slate-950 tracking-tighter mb-2">48</span>
                    <span class="text-[10px] uppercase font-black tracking-[0.5em] text-slate-400">Ruang Kelas</span>
                </div>
                <div class="reveal" style="transition-delay: 0.3s">
                    <span class="block text-5xl font-black text-primary-600 tracking-tighter mb-2">A+</span>
                    <span class="text-[10px] uppercase font-black tracking-[0.5em] text-slate-400">Akreditasi Sekolah</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section id="features" class="py-48 px-6 relative z-10 overflow-hidden bg-slate-50/30">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-32 reveal">
                <h2 class="text-[10px] font-black uppercase tracking-[0.5em] text-primary-600 mb-8">Modul Terintegrasi</h2>
                <h3 class="text-6xl md:text-8xl font-black tracking-tighter mb-10 leading-none">Solusi Cerdas untuk <br class="hidden md:block"/> Pendidikan.</h3>
                <p class="text-2xl text-slate-500 max-w-4xl mx-auto leading-relaxed font-medium tracking-tight">
                    SmartSchool menyediakan alat bantu yang dirancang khusus untuk meningkatkan produktivitas operasional sekolah Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                <!-- Feature 1 -->
                <div class="reveal glass-card p-14 group hover:translate-y-[-20px] transition-all duration-700 border-none relative overflow-hidden h-full shadow-2xl shadow-slate-200/50 !rounded-[3.5rem]">
                    <div class="absolute top-0 right-0 w-48 h-48 bg-primary-50 rounded-bl-[120px] group-hover:scale-150 transition-transform duration-1000"></div>
                    <div class="w-20 h-20 rounded-[2rem] bg-primary-100/50 flex items-center justify-center mb-12 group-hover:rotate-12 transition-all duration-500 shadow-xl shadow-primary-500/10">
                        <i class="fas fa-id-card text-primary-600 text-4xl"></i>
                    </div>
                    <h4 class="text-4xl font-black mb-8 group-hover:text-primary-600 transition-colors tracking-tighter leading-none">Database Siswa</h4>
                    <p class="text-slate-500 leading-relaxed mb-10 text-xl font-medium tracking-tight">Profil lengkap siswa, rekam medis, riwayat akademik, dan absensi otomatis dalam satu basis data terpadu.</p>
                </div>

                <!-- Feature 2 -->
                <div class="reveal glass-card p-14 group hover:translate-y-[-20px] transition-all duration-700 border-none relative overflow-hidden h-full shadow-2xl shadow-slate-200/50 !rounded-[3.5rem]" style="transition-delay: 100ms">
                    <div class="absolute top-0 right-0 w-48 h-48 bg-indigo-50 rounded-bl-[120px] group-hover:scale-150 transition-transform duration-1000"></div>
                    <div class="w-20 h-20 rounded-[2rem] bg-indigo-100/50 flex items-center justify-center mb-12 group-hover:rotate-12 transition-all duration-500 shadow-xl shadow-indigo-500/10">
                        <i class="fas fa-user-tie text-indigo-600 text-4xl"></i>
                    </div>
                    <h4 class="text-4xl font-black mb-8 group-hover:text-indigo-600 transition-colors tracking-tighter leading-none">Manajemen Guru</h4>
                    <p class="text-slate-500 leading-relaxed mb-10 text-xl font-medium tracking-tight">Monitoring kinerja pengajar, jadwal mengajar yang fleksibel, dan kolaborasi antar guru melalui portal internal.</p>
                </div>

                <!-- Feature 3 -->
                <div class="reveal glass-card p-14 group hover:translate-y-[-20px] transition-all duration-700 border-none relative overflow-hidden h-full shadow-2xl shadow-slate-200/50 !rounded-[3.5rem]" style="transition-delay: 200ms">
                    <div class="absolute top-0 right-0 w-48 h-48 bg-amber-50 rounded-bl-[120px] group-hover:scale-150 transition-transform duration-1000"></div>
                    <div class="w-20 h-20 rounded-[2rem] bg-amber-100/50 flex items-center justify-center mb-12 group-hover:rotate-12 transition-all duration-500 shadow-xl shadow-amber-500/10">
                        <i class="fas fa-boxes-stacked text-amber-600 text-4xl"></i>
                    </div>
                    <h4 class="text-4xl font-black mb-8 group-hover:text-amber-600 transition-colors tracking-tighter leading-none">Aset & Logistik</h4>
                    <p class="text-slate-500 leading-relaxed mb-10 text-xl font-medium tracking-tight">Inventarisasi peralatan sekolah, manajemen peminjaman barang, dan sistem pengingat pemeliharaan rutin.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dynamic CTA Section -->
    <section class="py-48 px-6 overflow-hidden relative reveal">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 rounded-[5rem] p-20 md:p-32 text-white relative overflow-hidden group shadow-[0_50px_100px_-20px_rgba(0,0,0,0.5)]">
                <!-- Static Glows -->
                <div class="absolute top-[-50%] right-[-10%] w-[1000px] h-[1000px] bg-primary-500/10 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-[-20%] left-[-10%] w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px]"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-32 items-center">
                    <div>
                        <h3 class="text-6xl md:text-8xl font-black tracking-tighter mb-12 leading-[0.95]">Tingkatkan Kualitas <br/> Sekolah Anda.</h3>
                        <p class="text-2xl text-slate-400 font-medium leading-relaxed mb-16 tracking-tight">
                            Bergabunglah dengan lebih dari 2.500 institusi pendidikan yang telah menggunakan sistem SmartSchool untuk memajukan pendidikan.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-10">
                            @auth
                                <a href="{{ route('dashboard') }}" class="bg-white text-slate-950 !rounded-2xl py-6 px-16 text-xl font-black uppercase tracking-[0.2em] hover:scale-105 active:scale-95 transition-all text-center">Ke Dashboard</a>
                            @else
                                <a href="{{ route('register') }}" class="bg-white text-slate-950 !rounded-2xl py-6 px-16 text-xl font-black uppercase tracking-[0.2em] hover:scale-105 active:scale-95 transition-all text-center">Gunakan Gratis</a>
                                <a href="#" class="border-2 border-white/20 !rounded-2xl py-6 px-16 text-xl font-black uppercase tracking-[0.2em] hover:bg-white/10 transition-all text-center backdrop-blur-sm">Hubungi Kami</a>
                            @endauth
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                         <div class="glass-card bg-white/5 p-10 border-white/10 text-center shadow-none !rounded-[3rem]">
                            <span class="text-5xl font-black block mb-4 tracking-tighter text-primary-400">99.9%</span>
                            <span class="text-[10px] font-black uppercase tracking-[0.5em] opacity-40">Uptime Sistem</span>
                         </div>
                         <div class="glass-card bg-white/5 p-10 border-white/10 text-center shadow-none !rounded-[3rem]">
                            <span class="text-5xl font-black block mb-4 tracking-tighter text-indigo-400">4.9s</span>
                            <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">Respons Cepat</span>
                         </div>
                         <div class="glass-card bg-white/5 p-10 border-white/10 text-center shadow-none !rounded-[3rem]">
                            <span class="text-5xl font-black block mb-4 tracking-tighter text-amber-400">24/7</span>
                            <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">Dukungan Teknis</span>
                         </div>
                         <div class="glass-card bg-white/5 p-10 border-white/10 text-center shadow-none !rounded-[3rem]">
                            <span class="text-5xl font-black block mb-4 tracking-tighter text-emerald-400">10M+</span>
                            <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">Data Aman</span>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection