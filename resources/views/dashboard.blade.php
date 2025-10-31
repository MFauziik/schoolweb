@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div
        class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen theme-transition">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-10">
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Dashboard Admin
                </h1>
                <p class="text-gray-600 dark:text-gray-300">Selamat datang di sistem manajemen sekolah - Pantau semua
                    aktivitas di sini</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Siswa Card -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-lg p-6 border border-blue-100 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                            <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                        <span
                            class="text-sm font-medium text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900 px-3 py-1 rounded-full">
                            {{ $activeStudents }} Aktif
                        </span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Siswa Terdaftar</h3>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $studentCount }}</p>
                    <div class="w-full bg-blue-200 dark:bg-blue-700 rounded-full h-2">
                        <div class="bg-blue-600 dark:bg-blue-400 h-2 rounded-full"
                            style="width: {{ $studentCount > 0 ? min(($activeStudents/$studentCount)*100, 100) : 0 }}%">
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        {{ $studentCount > 0 ? number_format(($activeStudents/$studentCount)*100, 1) : 0 }}% siswa aktif
                    </p>
                    <a href="{{ route('students.index') }}"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-md hover:shadow-lg w-full justify-center">
                        <i class="fas fa-cog mr-2"></i>
                        Kelola Siswa
                    </a>
                </div>

                <!-- Guru Card -->
                <div
                    class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-lg p-6 border border-green-100 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                            <i class="fas fa-chalkboard-teacher text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                        <span
                            class="text-sm font-medium text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900 px-3 py-1 rounded-full">
                            {{ $activeTeachers }} Aktif
                        </span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Guru Professional</h3>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $teacherCount }}</p>
                    <div class="w-full bg-green-200 dark:bg-green-700 rounded-full h-2">
                        <div class="bg-green-600 dark:bg-green-400 h-2 rounded-full"
                            style="width: {{ $teacherCount > 0 ? min(($activeTeachers/$teacherCount)*100, 100) : 0 }}%">
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        {{ $teacherCount > 0 ? number_format(($activeTeachers/$teacherCount)*100, 1) : 0 }}% guru aktif
                    </p>
                    <a href="{{ route('teachers.index') }}"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-md hover:shadow-lg w-full justify-center">
                        <i class="fas fa-cog mr-2"></i>
                        Kelola Guru
                    </a>
                </div>

                <!-- Inventory Card -->
                <div
                    class="bg-gradient-to-br from-amber-50 to-orange-100 dark:from-gray-700 dark:to-gray-800 rounded-2xl shadow-lg p-6 border border-amber-100 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-full bg-amber-100 dark:bg-amber-900">
                            <i class="fas fa-school text-amber-600 dark:text-amber-400 text-xl"></i>
                        </div>
                        <span
                            class="text-sm font-medium text-amber-600 dark:text-amber-400 bg-amber-100 dark:bg-amber-900 px-3 py-1 rounded-full">
                            {{ $activeInventories }} Tersedia
                        </span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Inventory</h3>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $inventoryCount }}</p>
                    <div class="w-full bg-amber-200 dark:bg-amber-700 rounded-full h-2">
                        <div class="bg-amber-600 dark:bg-amber-400 h-2 rounded-full"
                            style="width: {{ $inventoryCount > 0 ? min(($activeInventories/$inventoryCount)*100, 100) : 0 }}%">
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        {{ $inventoryCount > 0 ? number_format(($activeInventories/$inventoryCount)*100, 1) : 0 }}%
                        barang tersedia
                    </p>
                    <a href="{{ route('inventories.index') }}"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-300 shadow-md hover:shadow-lg w-full justify-center">
                        <i class="fas fa-cog mr-2"></i>
                        Kelola Inventory
                    </a>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Quick Actions -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-bolt text-yellow-500 mr-3"></i>
                        Quick Actions
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('students.create') }}"
                            class="flex flex-col items-center p-4 bg-blue-50 dark:bg-blue-900 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-800 transition-colors duration-300 group">
                            <i
                                class="fas fa-user-plus text-blue-600 dark:text-blue-400 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200 text-center">Tambah
                                Siswa</span>
                        </a>
                        <a href="{{ route('teachers.create') }}"
                            class="flex flex-col items-center p-4 bg-green-50 dark:bg-green-900 rounded-xl hover:bg-green-100 dark:hover:bg-green-800 transition-colors duration-300 group">
                            <i
                                class="fas fa-user-tie text-green-600 dark:text-green-400 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200 text-center">Tambah
                                Guru</span>
                        </a>
                        <a href="{{ route('inventories.create') }}"
                            class="flex flex-col items-center p-4 bg-amber-50 dark:bg-amber-900 rounded-xl hover:bg-amber-100 dark:hover:bg-amber-800 transition-colors duration-300 group">
                            <i
                                class="fas fa-box text-amber-600 dark:text-amber-400 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200 text-center">Tambah
                                Inventory</span>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center p-4 bg-purple-50 dark:bg-purple-900 rounded-xl hover:bg-purple-100 dark:hover:bg-purple-800 transition-colors duration-300 group">
                            <i
                                class="fas fa-chart-bar text-purple-600 dark:text-purple-400 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200 text-center">Lihat
                                Laporan</span>
                        </a>
                    </div>
                </div>
                <!-- Recent Activity -->
                <div
                    class="mt-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-history text-primary-500 mr-3"></i>
                        Recent Activity
                    </h2>
                    <div class="space-y-4" id="recentActivitiesContainer">
                        @foreach($recentActivities as $activity)
                        <div
                            class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                            <div class="flex items-center">
                                <div
                                    class="w-10 h-10 bg-{{ $activity['color'] }}-100 dark:bg-{{ $activity['color'] }}-900 rounded-full flex items-center justify-center mr-4">
                                    <i
                                        class="fas {{ $activity['icon'] }} text-{{ $activity['color'] }}-600 dark:text-{{ $activity['color'] }}-400"></i>
                                </div>
                                <div>
                                    <p class="text-gray-800 dark:text-white font-medium">{{ $activity['title'] }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $activity['description'] }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $activity['time'] }}</span>
                        </div>
                        @endforeach

                        @if(count($recentActivities) === 0)
                        <div class="text-center py-8">
                            <i class="fas fa-inbox text-gray-400 text-4xl mb-3"></i>
                            <p class="text-gray-500 dark:text-gray-400">Tidak ada aktivitas terbaru</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
    // Implementasi REAL untuk update Activities
    function updateActivities(data) {
        const container = document.getElementById('recentActivitiesContainer');

        // Clear existing activities
        container.innerHTML = '';

        if (data.length === 0) {
            container.innerHTML = `
            <div class="text-center py-8">
                <i class="fas fa-inbox text-gray-400 text-4xl mb-3"></i>
                <p class="text-gray-500 dark:text-gray-400">Tidak ada aktivitas terbaru</p>
            </div>
        `;
            return;
        }

        // Add new activities
        data.forEach(activity => {
            const activityElement = document.createElement('div');
            activityElement.className =
                'flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors';
            activityElement.innerHTML = `
            <div class="flex items-center">
                <div class="w-10 h-10 bg-${activity.color}-100 dark:bg-${activity.color}-900 rounded-full flex items-center justify-center mr-4">
                    <i class="fas ${activity.icon} text-${activity.color}-600 dark:text-${activity.color}-400"></i>
                </div>
                <div>
                    <p class="text-gray-800 dark:text-white font-medium">${activity.title}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">${activity.description}</p>
                </div>
            </div>
            <span class="text-sm text-gray-500 dark:text-gray-400">${activity.time}</span>
        `;
            container.appendChild(activityElement);
        });
    }

    // Show notification
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('[data-notification]');
        existingNotifications.forEach(notification => notification.remove());

        const notification = document.createElement('div');
        notification.setAttribute('data-notification', 'true');
        notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform transition-transform duration-300 translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' :
        type === 'error' ? 'bg-red-500 text-white' :
        'bg-blue-500 text-white'
    }`;
        notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas ${
                type === 'success' ? 'fa-check-circle' :
                type === 'error' ? 'fa-exclamation-circle' :
                'fa-info-circle'
            } mr-2"></i>
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Remove notification after 3 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.remove();
                    }
                }, 300);
            }
        }, 3000);
    }

    // Initialize real-time updates when page loads
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Dashboard real-time features initialized');
        startAutoRefresh();

        // Add data attributes for easier DOM selection
        document.querySelectorAll('[data-status]').forEach(element => {
            element.setAttribute('data-status', element.getAttribute('data-status'));
        });
    });

    // Export functions for global access (optional)
    window.refreshSystemStatus = refreshSystemStatus;
    window.refreshActivities = refreshActivities;
    window.startAutoRefresh = startAutoRefresh;
    window.stopAutoRefresh = stopAutoRefresh;
    </script>
    @endpush
    @endsection