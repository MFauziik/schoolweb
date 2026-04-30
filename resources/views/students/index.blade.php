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
                        Direktori <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Siswa</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Kelola dan pantau semua data pendaftaran siswa.</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('students.create') }}" class="btn-primary py-4 px-8 flex items-center gap-3 shadow-xl shadow-primary-500/20 !rounded-2xl transition-all hover:scale-[1.02]">
                        <i class="fas fa-user-plus text-lg"></i>
                        <span class="font-black uppercase tracking-widest text-sm">Tambah Siswa</span>
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-primary-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500">
                            <i class="fas fa-users text-primary-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Total Siswa</p>
                            <p class="text-3xl font-black text-slate-900 tracking-tighter">{{ $students->total() }}</p>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500">
                            <i class="fas fa-check-circle text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Status Aktif</p>
                            <p class="text-3xl font-black text-emerald-600 tracking-tighter">{{ $students->where('is_active', true)->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-red-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500">
                            <i class="fas fa-times-circle text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Status Nonaktif</p>
                            <p class="text-3xl font-black text-red-600 tracking-tighter">{{ $students->where('is_active', false)->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 group border-none shadow-xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center group-hover:scale-110 transition-all duration-500">
                            <i class="fas fa-chart-pie text-amber-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Jurusan Terbanyak</p>
                            <p class="text-lg font-black text-slate-900 tracking-tighter truncate">
                                {{ $students->groupBy('jurusan')->sortByDesc(function($group) { return $group->count(); })->keys()->first() ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="glass-card border-none shadow-xl p-8 mb-8 bg-white/80">
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6">
                        <!-- Left: Search -->
                        <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                            <div class="relative w-full sm:w-80">
                                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari NISN atau nama siswa..."
                                    onkeydown="if(event.key==='Enter'){updateFilter('search', this.value)}"
                                    class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-4 pl-14 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none placeholder:text-slate-300 text-slate-600">
                            </div>
                        </div>

                        <!-- Right: Filters -->
                        <div class="w-full lg:w-auto flex flex-col md:flex-row md:items-end gap-6">
                            <div class="flex flex-col w-full md:w-auto">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 ml-1">Jurusan</label>
                                <select name="jurusan" onchange="updateFilter('jurusan', this.value)"
                                    class="w-full md:w-64 bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-500 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                                    <option value="">Semua Jurusan</option>
                                    <option value="Pengembangan Perangkat Lunak dan Gim"
                                        {{ request('jurusan') == 'Pengembangan Perangkat Lunak dan Gim' ? 'selected' : '' }}>PPLG</option>
                                    <option value="Teknik Otomotif"
                                        {{ request('jurusan') == 'Teknik Otomotif' ? 'selected' : '' }}>Otomotif</option>
                                    <option value="Teknik Pengelasan dan Fabrikasi Logam"
                                        {{ request('jurusan') == 'Teknik Pengelasan dan Fabrikasi Logam' ? 'selected' : '' }}>Pengelasan</option>
                                    <option value="Broadcasting dan Film"
                                        {{ request('jurusan') == 'Broadcasting dan Film' ? 'selected' : '' }}>Broadcasting</option>
                                    <option value="Animasi" {{ request('jurusan') == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                </select>
                            </div>

                            <div class="flex flex-col w-full md:w-auto">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 ml-1">Status</label>
                                <select name="status" onchange="updateFilter('status', this.value)"
                                    class="w-full md:w-48 bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-500 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all outline-none">
                                    <option value="">Semua Status</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Badges -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 pt-6 border-t border-slate-50">
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Tampilkan:</span>
                            <select name="per_page" onchange="updatePerPage(this.value)"
                                class="bg-slate-50 border border-slate-100 rounded-xl px-4 py-2 text-xs font-black text-slate-500 focus:ring-4 focus:ring-primary-500/10 outline-none">
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 Baris</option>
                                <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25 Baris</option>
                                <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50 Baris</option>
                            </select>
                        </div>

                        @if(request('jurusan') || request('status') || request('search'))
                        <div class="flex flex-wrap items-center gap-2">
                            @if(request('jurusan'))
                            <span class="px-4 py-1.5 rounded-full bg-primary-50 text-primary-600 text-[10px] font-black uppercase tracking-widest border border-primary-100 shadow-sm shadow-primary-500/5">Jurusan: {{ request('jurusan') }}</span>
                            @endif
                            @if(request('status') !== null && request('status') !== '')
                            <span class="px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase tracking-widest border border-emerald-100 shadow-sm shadow-emerald-500/5">Status: {{ request('status') == '1' ? 'Aktif' : 'Nonaktif' }}</span>
                            @endif
                            @if(request('search'))
                            <span class="px-4 py-1.5 rounded-full bg-amber-50 text-amber-600 text-[10px] font-black uppercase tracking-widest border border-amber-100 shadow-sm shadow-amber-500/5">Cari: {{ request('search') }}</span>
                            @endif
                            <button onclick="clearFilters()" class="ml-2 w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-slate-800 transition-all shadow-lg active:scale-95">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="glass-card border-none shadow-2xl overflow-hidden bg-white/80">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><i class="fas fa-image mr-2 opacity-50"></i>Foto</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><i class="fas fa-id-card mr-2 opacity-50"></i>NISN</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><i class="fas fa-user mr-2 opacity-50"></i>Identitas</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><i class="fas fa-graduation-cap mr-2 opacity-50"></i>Kelas</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><i class="fas fa-calendar mr-2 opacity-50"></i>Angkatan</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><i class="fas fa-check-circle mr-2 opacity-50"></i>Status</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right"><i class="fas fa-cog mr-2 opacity-50"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($students as $student)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <div class="w-14 h-14 rounded-2xl overflow-hidden border-4 border-white shadow-sm flex-shrink-0 bg-slate-100">
                                        @if($student->foto)
                                        <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto"
                                            class="w-full h-full object-cover">
                                        @else
                                        <div class="w-full h-full flex items-center justify-center bg-primary-50">
                                            <i class="fas fa-user text-primary-600 text-xl"></i>
                                        </div>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-8 py-6">
                                    <div class="text-sm font-black font-mono text-slate-500 tracking-tighter">{{ $student->nisn }}</div>
                                </td>

                                <td class="px-8 py-6">
                                    <div class="font-bold text-slate-900 group-hover:text-primary-600 transition-colors tracking-tight">{{ $student->nama }}</div>
                                    <div class="text-[10px] font-black uppercase text-slate-400 tracking-widest mt-0.5">
                                        Usia {{ \Carbon\Carbon::parse($student->tanggal_lahir)->age }} Tahun
                                    </div>
                                </td>

                                <td class="px-8 py-6">
                                    <div class="font-bold text-slate-700 tracking-tight">{{ $student->kelas }}</div>
                                    <div class="text-[10px] font-black uppercase text-slate-400 tracking-widest mt-0.5">Jurusan Sekolah</div>
                                </td>

                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-primary-50 text-primary-600 border border-primary-100 shadow-sm shadow-primary-500/5">
                                        Angkatan {{ $student->angkatan }}
                                    </span>
                                </td>

                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest {{ $student->is_active ? 'bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm shadow-emerald-500/5' : 'bg-red-50 text-red-600 border border-red-100 shadow-sm shadow-red-500/5' }}">
                                        {{ $student->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
                                        <a href="{{ route('students.show', $student) }}" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-primary-50 hover:text-primary-600 hover:scale-110 transition-all shadow-sm"><i class="fas fa-eye text-sm"></i></a>
                                        <a href="{{ route('students.edit', $student) }}" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-amber-50 hover:text-amber-600 hover:scale-110 transition-all shadow-sm"><i class="fas fa-edit text-sm"></i></a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-red-50 hover:text-red-600 hover:scale-110 transition-all shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa {{ $student->nama }}?')">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mb-6 shadow-inner">
                                            <i class="fas fa-users text-slate-200 text-3xl"></i>
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-400 tracking-tight">Data tidak ditemukan</h3>
                                        <p class="text-sm text-slate-400 mt-2">Sesuaikan filter atau tambah data siswa baru.</p>
                                        <a href="{{ route('students.create') }}" class="btn-primary mt-8">
                                            <i class="fas fa-user-plus mr-3"></i>
                                            Tambah Data Siswa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination & Info -->
                @if($students->hasPages() || $students->total() > 0)
                <div class="bg-slate-50/50 px-8 py-6 border-t border-slate-50">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-6">
                        <div class="text-[10px] font-black uppercase text-slate-400 tracking-widest">
                            Menampilkan <span class="text-slate-900 font-black">{{ $students->firstItem() ?? 0 }}</span> - 
                            <span class="text-slate-900 font-black">{{ $students->lastItem() ?? 0 }}</span> dari 
                            <span class="text-slate-900 font-black tracking-normal">{{ $students->total() }}</span> total data
                        </div>

                        @if($students->hasPages())
                        {{ $students->appends(request()->query())->links() }}
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
function updateUrlParameter(key, value) {
    const url = new URL(window.location.href);

    if (value) {
        url.searchParams.set(key, value);
    } else {
        url.searchParams.delete(key);
    }

    // Reset to page 1 when changing filter, sort or per_page
    if (key === 'jurusan' || key === 'status' || key === 'sort_by' || key === 'sort_order' || key === 'per_page') {
        url.searchParams.set('page', '1');
    }

    return url.toString();
}

function updateFilter(key, value) {
    window.location.href = updateUrlParameter(key, value);
}

function updatePerPage(value) {
    window.location.href = updateUrlParameter('per_page', value);
}

// Sorting removed

function clearFilters() {
    const url = new URL(window.location.href);
    // Remove filter parameters
    url.searchParams.delete('jurusan');
    url.searchParams.delete('status');
    url.searchParams.delete('search');
    url.searchParams.set('page', '1'); // Reset to page 1
    window.location.href = url.toString();
}
</script>


@endsection