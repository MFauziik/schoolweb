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
                        Asset <span class="bg-gradient-to-r from-amber-500 to-orange-600 bg-clip-text text-transparent">Telemetry</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Full structural breakdown for inventory node: {{ $inventory->kode_barang }}</p>
                </div>
            </div>

            <!-- Inventory Detail Card -->
            <div class="glass-card border-none shadow-2xl overflow-hidden bg-white/80">
                <!-- Status Banner -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                        <div class="flex items-center gap-6">
                            <div class="w-20 h-20 bg-amber-500/20 rounded-[2.5rem] flex items-center justify-center border border-amber-500/20 backdrop-blur-xl shadow-inner group-hover:rotate-12 transition-transform duration-500">
                                <i class="fas fa-box text-amber-500 text-3xl"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-black text-white tracking-tight mb-1">{{ $inventory->nama_barang }}</h2>
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-black uppercase tracking-[0.3em] text-amber-500/80">{{ $inventory->kode_barang }}</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                                    <span class="text-xs font-black uppercase tracking-widest text-slate-400">{{ $inventory->kategori }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center md:items-end gap-3 text-right">
                           @php
                            $statusBadgeColors = [
                                'Baik' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                'Rusak Ringan' => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                                'Rusak Berat' => 'bg-red-500/10 text-red-400 border-red-500/20',
                                'Perlu Perbaikan' => 'bg-orange-500/10 text-orange-400 border-orange-500/20',
                                'Hilang' => 'bg-slate-500/10 text-slate-400 border-slate-500/20'
                            ];
                            $statusClass = $statusBadgeColors[$inventory->status] ?? 'bg-slate-500/10 text-slate-400 border-slate-500/20';
                            @endphp
                            <div class="px-6 py-2 rounded-full border {{ $statusClass }} text-[10px] font-black uppercase tracking-[0.2em] backdrop-blur-md">
                                {{ $inventory->status }}
                            </div>
                            <span class="text-[10px] font-black tracking-[0.3em] {{ $inventory->is_active ? 'text-emerald-400' : 'text-red-400' }} uppercase">
                                Node System: {{ $inventory->is_active ? 'Online' : 'Encrypted' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Detail Content -->
                <div class="p-12">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                        <!-- Left Block: Property Data -->
                        <div class="space-y-10">
                            <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-400 flex items-center gap-3">
                                <span class="w-8 h-px bg-slate-200"></span>
                                Core Specifications
                            </h3>

                            <div class="space-y-6">
                                <div class="group">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1.5">Asset Registry Code</p>
                                    <p class="text-lg font-black text-slate-900 tracking-tighter font-mono bg-slate-50 px-4 py-3 rounded-xl border border-slate-100">{{ $inventory->kode_barang }}</p>
                                </div>

                                <div class="group">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1.5">Nomenclature</p>
                                    <p class="text-lg font-bold text-slate-800 tracking-tight">{{ $inventory->nama_barang }}</p>
                                </div>

                                <div class="group">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1.5">Functional Category</p>
                                    <div class="inline-flex items-center px-4 py-1.5 rounded-xl bg-primary-50 text-primary-600 border border-primary-100 text-xs font-black uppercase tracking-widest">
                                        {{ $inventory->kategori }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Block: Localization & State -->
                        <div class="space-y-10">
                            <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-400 flex items-center gap-3">
                                <span class="w-8 h-px bg-slate-200"></span>
                                Deployment State
                            </h3>

                            <div class="space-y-6">
                                <div class="group">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1.5">Physical Localization</p>
                                    <div class="flex items-center gap-3 text-slate-800">
                                        <i class="fas fa-map-marker-alt text-primary-500 opacity-40"></i>
                                        <p class="text-lg font-bold tracking-tight">{{ $inventory->lokasi_barang }}</p>
                                    </div>
                                </div>

                                <div class="group">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1.5">Current Condition</p>
                                    <div class="flex items-center gap-3">
                                        <div class="w-3 h-3 rounded-full {{ $inventory->status == 'Baik' ? 'bg-emerald-500 animate-pulse' : 'bg-amber-500' }}"></div>
                                        <p class="text-lg font-bold text-slate-800 tracking-tight">{{ $inventory->status }} condition protocol</p>
                                    </div>
                                </div>

                                <div class="group">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1.5">Authorization Flow</p>
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-xl {{ $inventory->is_active ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-red-50 text-red-600 border-red-100' }} border text-xs font-black uppercase tracking-widest">
                                        {{ $inventory->is_active ? 'Asset Synchronized' : 'Asset Decommissioned' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Footer Timeline -->
                <div class="bg-slate-50/50 px-12 py-6 border-t border-slate-50 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-3 text-slate-500 text-[10px] font-black uppercase tracking-widest">
                        <i class="fas fa-history opacity-50"></i>
                        Last Telemetry: {{ $inventory->updated_at->format('M d, Y | H:i') }}
                    </div>
                    <div class="flex items-center gap-3 text-slate-500 text-[10px] font-black uppercase tracking-widest">
                        <i class="fas fa-shield-halved opacity-50 text-primary-500"></i>
                        Secure Asset Management
                    </div>
                </div>
            </div>

            <!-- Action Cluster -->
            <div class="mt-12 flex flex-col sm:flex-row gap-6">
                <a href="{{ route('inventories.edit', $inventory) }}" class="btn-primary flex-1 py-5 !rounded-2xl shadow-xl shadow-primary-500/20 hover:scale-[1.02] transition-all">
                    <i class="fas fa-edit mr-3 text-lg opacity-50"></i>
                    <span class="font-black uppercase tracking-[0.2em]">Modify Configuration</span>
                </a>
                <a href="{{ route('inventories.index') }}" class="glass-card px-10 py-5 !rounded-2xl flex items-center justify-center gap-3 hover:bg-white transition-all text-slate-500 border-none shadow-xl shadow-slate-200">
                    <i class="fas fa-arrow-left text-lg opacity-50"></i>
                    <span class="font-black uppercase tracking-widest text-[10px]">Registry Portal</span>
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')

@endpush
@endsection