<!-- Navigation -->
<nav class="bg-white dark:bg-gray-800 shadow-lg theme-transition sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-graduation-cap text-2xl text-primary-500 mr-3"></i>
                    <span class="text-xl font-bold text-gray-800 dark:text-white">EduManage</span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('/') ? 'text-primary-500 font-semibold' : '' }}">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>
                    <a href="{{ route('students.index') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-user-graduate mr-2"></i>Siswa
                    </a>
                    <a href="{{ route('teachers.index') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>Guru
                    </a>
                    <a href="{{ route('inventories.index') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-boxes mr-2"></i>Inventory
                    </a>
                    <!-- TAMBAHAN: Link Peminjaman di Navbar -->
                    <a href="{{ route('borrowings.create') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-hand-holding mr-2"></i>Peminjaman
                    </a>
                    @if(auth()->check())
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                    </a>
                    @endif
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <!-- Theme Toggle -->
                <button id="themeToggle"
                    class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                    <i class="fas fa-moon" id="themeIcon"></i>
                </button>

                <!-- Auth Links -->
                @if (Route::has('login'))
                <div class="hidden md:block">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}"
                        class="text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 text-sm font-medium transition-colors">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                    @endif
                    @endauth
                </div>
                @endif

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobileMenuButton"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="md:hidden hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'text-primary-500 font-semibold' : '' }}">
                <i class="fas fa-home mr-2"></i>Beranda
            </a>
            <a href="{{ route('students.index') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-user-graduate mr-2"></i>Siswa
            </a>
            <a href="{{ route('teachers.index') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-chalkboard-teacher mr-2"></i>Guru
            </a>
            <a href="{{ route('inventories.index') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-boxes mr-2"></i>Inventory
            </a>
            <!-- TAMBAHAN: Link Peminjaman di Mobile Menu -->
            <a href="{{ route('borrowings.create') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-hand-holding mr-2"></i>Peminjaman
            </a>
            @if(auth()->check())
            <a href="{{ route('dashboard') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
            </a>
            @auth
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </form>
            @endauth
            @else
            <a href="{{ route('login') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="block text-gray-700 dark:text-gray-200 hover:text-primary-500 dark:hover:text-primary-400 px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-user-plus mr-2"></i>Register
            </a>
            @endif
            @endif
        </div>
    </div>
</nav>