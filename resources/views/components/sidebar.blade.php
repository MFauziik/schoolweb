<!-- components/sidebar.blade.php -->
<div
    class="sidebar bg-gradient-to-b from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 w-64 min-h-screen p-4 shadow-lg theme-transition">
    <div class="sidebar-header mb-8">
        <div class="flex items-center justify-center">
            <i class="fas fa-graduation-cap text-2xl text-primary-500 mr-3"></i>
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">EduManage</h2>
        </div>
        <p class="text-sm text-gray-600 dark:text-gray-400 text-center mt-2">Admin Panel</p>
    </div>

    <nav class="space-y-2">
        <a href="{{ route('dashboard') }}"
            class="flex items-center p-3 rounded-lg hover:bg-white dark:hover:bg-gray-700 hover:shadow transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-white dark:bg-gray-700 shadow' : '' }}">
            <i class="fas fa-tachometer-alt text-blue-500 mr-3"></i>
            <span class="text-gray-700 dark:text-gray-200 font-medium">Dashboard</span>
        </a>

        <a href="{{ route('students.index') }}"
            class="flex items-center p-3 rounded-lg hover:bg-white dark:hover:bg-gray-700 hover:shadow transition-all duration-200 {{ request()->routeIs('students.*') ? 'bg-white dark:bg-gray-700 shadow' : '' }}">
            <i class="fas fa-user-graduate text-indigo-500 mr-3"></i>
            <span class="text-gray-700 dark:text-gray-200 font-medium">Kelola Siswa</span>
        </a>

        <a href="{{ route('teachers.index') }}"
            class="flex items-center p-3 rounded-lg hover:bg-white dark:hover:bg-gray-700 hover:shadow transition-all duration-200 {{ request()->routeIs('teachers.*') ? 'bg-white dark:bg-gray-700 shadow' : '' }}">
            <i class="fas fa-chalkboard-teacher text-green-500 mr-3"></i>
            <span class="text-gray-700 dark:text-gray-200 font-medium">Kelola Guru</span>
        </a>

        <a href="{{ route('inventories.index') }}"
            class="flex items-center p-3 rounded-lg hover:bg-white dark:hover:bg-gray-700 hover:shadow transition-all duration-200 {{ request()->routeIs('inventories.*') ? 'bg-white dark:bg-gray-700 shadow' : '' }}">
            <i class="fas fa-school text-amber-500 mr-3"></i>
            <span class="text-gray-700 dark:text-gray-200 font-medium">Kelola Inventory</span>
        </a>
    </nav>

    <!-- User Info -->
    <div class="absolute bottom-4 left-4 right-4">
        <div class="bg-white dark:bg-gray-700 rounded-lg p-3 shadow">
            <div class="flex items-center">
                <div
                    class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-800 dark:text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Administrator</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.sidebar {
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
}
</style>