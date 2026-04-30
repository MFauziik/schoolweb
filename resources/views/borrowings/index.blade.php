@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-6 lg:p-10 bg-slate-50/50 min-h-screen theme-transition">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl lg:text-5xl font-black tracking-tight text-slate-900 mb-3">
                        Peminjaman <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Aset</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Pantau dan kelola semua peminjaman peralatan aktif serta riwayat peminjaman.</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('borrowings.create') }}" class="btn-primary py-4 px-8 flex items-center gap-3 shadow-xl shadow-primary-500/20 !rounded-2xl transition-all hover:scale-[1.02]">
                        <i class="fas fa-hand-holding text-lg"></i>
                        <span class="font-black uppercase tracking-widest text-sm">Peminjaman Baru</span>
                    </a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="glass-card border-none shadow-2xl overflow-hidden bg-white/80">
                <!-- Status Tabs -->
                <div class="flex border-b border-slate-100 bg-slate-50/30">
                    <button class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] border-b-4 border-primary-500 text-primary-600 transition-all">Semua Data</button>
                    <button class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-slate-600 transition-all">Sedang Dipinjam</button>
                    <button class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-slate-600 transition-all">Sudah Kembali</button>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Data Peminjam</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aset Sekolah</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Waktu Peminjaman</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($borrowings as $borrowing)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <h4 class="font-bold text-slate-900 group-hover:text-primary-600 transition-colors tracking-tight">{{ $borrowing->peminjam_nama }}</h4>
                                    <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mt-0.5">Kelas: {{ $borrowing->peminjam_kelas }}</p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-primary-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                            <i class="fas fa-cube text-xl opacity-40"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 tracking-tight">{{ $borrowing->inventory->nama_barang }}</h4>
                                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-tighter font-mono">{{ $borrowing->inventory->kode_barang }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-sm font-black text-slate-700 tracking-tighter">{{ $borrowing->created_at->format('d M, Y') }}</p>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Waktu Input</p>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest {{ $borrowing->status_peminjaman == 'dipinjam' ? 'bg-amber-50 text-amber-600 border border-amber-100' : 'bg-emerald-50 text-emerald-600 border border-emerald-100' }}">
                                        <div class="w-1.5 h-1.5 rounded-full {{ $borrowing->status_peminjaman == 'dipinjam' ? 'bg-amber-400 animate-pulse' : 'bg-emerald-400' }} mr-2.5"></div>
                                        {{ $borrowing->status_peminjaman == 'dipinjam' ? 'Dipinjam' : 'Kembali' }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
                                        @if($borrowing->status_peminjaman == 'dipinjam')
                                        <form action="{{ route('borrowings.return', $borrowing) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="h-10 px-5 rounded-xl bg-emerald-50 text-emerald-600 font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 hover:text-white transition-all shadow-sm">
                                                Selesaikan Pengembalian
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('borrowings.edit', $borrowing) }}" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-amber-50 hover:text-amber-600 hover:scale-110 transition-all shadow-sm"><i class="fas fa-edit text-sm"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-8 bg-slate-50/30 border-t border-slate-50">
                    {{ $borrowings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection