<!-- components/sidebar.blade.php -->
<div class="sidebar bg-white w-72 min-h-screen p-6 border-r border-slate-100 flex flex-col theme-transition">
    <div class="sidebar-header mb-10 flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-primary-600 to-indigo-600 flex items-center justify-center shadow-xl shadow-primary-500/30">
            <i class="fas fa-graduation-cap text-white text-xl"></i>
        </div>
        <div>
            <h2 class="text-xl font-black tracking-tighter text-slate-900 leading-none">SmartSchool</h2>
            <p class="text-[10px] uppercase tracking-[0.3em] font-black text-slate-400 mt-1">Sistem Sekolah</p>
        </div>
    </div>

    <nav class="flex-1 space-y-2">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 ml-2">Menu Utama</p>
        
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-primary-50 text-primary-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <i class="fas fa-grid-2 text-lg group-hover:scale-110 transition-transform {{ request()->routeIs('dashboard') ? 'text-primary-600' : 'text-slate-400' }}"></i>
            <span class="font-bold">Panel Utama</span>
        </a>

        <a href="{{ route('students.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 group {{ request()->routeIs('students.*') ? 'bg-primary-50 text-primary-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <i class="fas fa-user-graduate text-lg group-hover:scale-110 transition-transform {{ request()->routeIs('students.*') ? 'text-primary-600' : 'text-slate-400' }}"></i>
            <span class="font-bold">Data Siswa</span>
        </a>

        <a href="{{ route('teachers.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 group {{ request()->routeIs('teachers.*') ? 'bg-primary-50 text-primary-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <i class="fas fa-chalkboard-teacher text-lg group-hover:scale-110 transition-transform {{ request()->routeIs('teachers.*') ? 'text-primary-600' : 'text-slate-400' }}"></i>
            <span class="font-bold">Data Guru</span>
        </a>

        <a href="{{ route('inventories.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 group {{ request()->routeIs('inventories.*') ? 'bg-primary-50 text-primary-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <i class="fas fa-school text-lg group-hover:scale-110 transition-transform {{ request()->routeIs('inventories.*') ? 'text-primary-600' : 'text-slate-400' }}"></i>
            <span class="font-bold">Inventaris</span>
        </a>

        <a href="{{ route('borrowings.create') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 group {{ request()->routeIs('borrowings.*') ? 'bg-primary-50 text-primary-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <i class="fas fa-hand-holding text-lg group-hover:scale-110 transition-transform {{ request()->routeIs('borrowings.*') ? 'text-primary-600' : 'text-slate-400' }}"></i>
            <span class="font-bold">Peminjaman</span>
        </a>
    </nav>

    <!-- User Info -->
    <div class="mt-auto pt-6 border-t border-slate-100">
        <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 shadow-sm border border-slate-100">
            <div class="w-10 h-10 rounded-xl bg-primary-600 flex items-center justify-center text-white font-black shadow-lg shadow-primary-500/20 flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-primary-600 hover:text-primary-700 transition-colors">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>