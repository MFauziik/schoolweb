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
                        Inventaris <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Sekolah</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Lacak, kelola, dan pelihara semua aset milik sekolah.</p>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <a href="{{ route('borrowings.create') }}" class="px-8 py-4 rounded-2xl bg-white border border-slate-100 flex items-center gap-3 hover:bg-slate-50 transition-all font-black uppercase tracking-widest text-xs text-primary-600 shadow-sm group">
                        <i class="fas fa-hand-holding group-hover:-translate-y-1 transition-transform"></i>
                        <span>Peminjaman Aset</span>
                    </a>
                    <a href="{{ route('inventories.create') }}" class="btn-primary py-4 px-8 flex items-center gap-3 shadow-xl shadow-primary-500/20 !rounded-2xl transition-all hover:scale-[1.02]">
                        <i class="fas fa-plus-circle text-lg"></i>
                        <span class="font-black uppercase tracking-widest text-sm">Tambah Aset</span>
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-primary-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-sm shadow-primary-500/10">
                            <i class="fas fa-boxes text-primary-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Total Aset</p>
                            <p class="text-3xl font-black text-slate-900 tracking-tighter">{{ $inventories->total() }}</p>
                        </div>
                    </div>
                </div>
                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-sm shadow-emerald-500/10">
                            <i class="fas fa-check-double text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Tersedia</p>
                            <p class="text-3xl font-black text-emerald-600 tracking-tighter">84%</p>
                        </div>
                    </div>
                </div>
                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-sm shadow-amber-500/10">
                            <i class="fas fa-tools text-amber-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Dalam Perbaikan</p>
                            <p class="text-3xl font-black text-amber-600 tracking-tighter">12</p>
                        </div>
                    </div>
                </div>
                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-rose-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500 shadow-sm shadow-rose-500/10">
                            <i class="fas fa-exclamation-triangle text-rose-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Stok Menipis</p>
                            <p class="text-3xl font-black text-rose-600 tracking-tighter">3</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="glass-card border-none shadow-2xl overflow-hidden bg-white/80">
                <!-- Search & Filters -->
                <div class="p-8 border-b border-slate-100 bg-slate-50/30">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div class="relative flex-1">
                            <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                            <input type="text" placeholder="Cari nama aset, kode, atau lokasi..." class="w-full bg-white border border-slate-100 rounded-2xl py-4 pl-14 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none placeholder:text-slate-300 text-slate-600">
                        </div>
                        <div class="flex items-center gap-4">
                            <select class="bg-white border border-slate-100 rounded-2xl py-4 px-8 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-black uppercase tracking-widest text-xs text-slate-500 outline-none">
                                <option>Semua Kategori</option>
                                <option>Elektronik</option>
                                <option>Furnitur</option>
                                <option>Alat Tulis</option>
                                <option>Peralatan Lab</option>
                            </select>
                            <button class="w-14 h-14 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 hover:text-primary-600 hover:border-primary-500 transition-all shadow-sm">
                                <i class="fas fa-sliders text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Identitas Aset</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kondisi Barang</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Jumlah Stok</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($inventories as $inventory)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-primary-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                            <i class="fas fa-cube text-xl opacity-40"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 group-hover:text-primary-600 transition-colors tracking-tight">{{ $inventory->nama_barang }}</h4>
                                            <p class="text-[10px] text-slate-400 font-black font-mono uppercase tracking-tighter">{{ $inventory->kode_barang }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex flex-col gap-2 max-w-[120px]">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Status</span>
                                            <span class="text-[10px] font-black text-primary-600 uppercase">{{ $inventory->kondisi ?? 'Sangat Baik' }}</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden shadow-inner">
                                            <div class="bg-primary-500 h-full rounded-full transition-all duration-1000 shadow-sm" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-xl font-black text-slate-900 tracking-tighter">{{ $inventory->jumlah }}</span>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-300">Unit Tersedia</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
                                        <a href="{{ route('inventories.show', $inventory) }}" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-primary-50 hover:text-primary-600 hover:scale-110 transition-all shadow-sm"><i class="fas fa-eye text-sm"></i></a>
                                        <a href="{{ route('inventories.edit', $inventory) }}" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-amber-50 hover:text-amber-600 hover:scale-110 transition-all shadow-sm"><i class="fas fa-edit text-sm"></i></a>
                                        <form action="{{ route('inventories.destroy', $inventory) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-red-50 hover:text-red-600 hover:scale-110 transition-all shadow-sm" onclick="return confirm('Hapus aset ini?')"><i class="fas fa-trash text-sm"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-8 bg-slate-50/30 border-t border-slate-50">
                    {{ $inventories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection