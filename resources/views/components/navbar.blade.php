<!-- Navigation -->
<nav class="fixed top-0 left-0 w-full z-50 px-6 py-6 transition-all duration-500" id="main-nav">
    <div class="max-w-7xl mx-auto flex items-center justify-between glass-card px-8 py-4 !rounded-full border-white/20 dark:border-white/5 backdrop-blur-xl shadow-2xl shadow-primary-500/5">
        <div class="flex items-center gap-3 group cursor-pointer" onclick="window.location='{{ route('home') }}'">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-2xl bg-gradient-to-br from-primary-600 to-indigo-600 flex items-center justify-center shadow-lg shadow-primary-500/30 group-hover:rotate-12 transition-transform duration-500">
                <i class="fas fa-graduation-cap text-white text-xl md:text-2xl"></i>
            </div>
            <span class="text-xl md:text-2xl font-black tracking-tighter bg-gradient-to-r from-slate-900 to-slate-600 bg-clip-text text-transparent italic uppercase">EduManage</span>
        </div>

        <div class="hidden lg:flex items-center gap-10 font-bold text-sm uppercase tracking-widest text-slate-500">
            <a href="{{ route('home') }}#features" class="hover:text-primary-600 transition-colors relative group">
                Layanan
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="hover:text-primary-600 transition-colors relative group">
                Solusi
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="hover:text-primary-600 transition-colors relative group">
                Harga
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </div>

        <div class="flex items-center gap-2 md:gap-6">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-primary !rounded-full py-2.5 px-6 md:px-8 text-sm shadow-xl shadow-primary-500/20 hover:scale-105 transition-transform font-bold">Panel Utama</a>
            @else
                <a href="{{ route('login') }}" class="hidden sm:inline-block font-black text-xs uppercase tracking-widest text-slate-600 hover:text-primary-600 transition-colors">Masuk</a>
                <a href="{{ route('register') }}" class="btn-primary !rounded-full py-2.5 px-6 md:px-8 text-sm shadow-xl shadow-primary-500/20 hover:scale-105 transition-transform font-bold">Daftar</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('main-nav');
        if (window.scrollY > 50) {
            nav.classList.add('py-4');
            nav.querySelector('.glass-card').classList.add('shadow-2xl', 'backdrop-blur-2xl');
        } else {
            nav.classList.remove('py-4');
            nav.querySelector('.glass-card').classList.remove('shadow-2xl', 'backdrop-blur-2xl');
        }
    });
</script>