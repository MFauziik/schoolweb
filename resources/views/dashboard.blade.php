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
                        Ringkasan <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Panel</span>
                    </h1>
                    <p class="text-lg text-slate-500 font-medium tracking-tight">Selamat datang kembali! Inilah ringkasan aktivitas sekolah hari ini.</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="glass-card px-6 py-3 flex items-center gap-2 hover:bg-white transition-all shadow-sm">
                        <i class="fas fa-calendar-alt text-primary-500"></i>
                        <span class="text-sm font-bold text-slate-700">{{ now()->format('d M Y') }}</span>
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Siswa Card -->
                <div class="glass-card p-8 group hover:shadow-xl hover:shadow-primary-500/10 transition-all duration-500 border-none">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-primary-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-user-graduate text-primary-600 text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-bold uppercase tracking-wider text-primary-600 bg-primary-100 px-3 py-1 rounded-full">
                                {{ $activeStudents }} Aktif
                            </span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Total Siswa</h3>
                        <p class="text-4xl font-black text-slate-900 tracking-tighter">{{ number_format($studentCount) }}</p>
                    </div>
                    <div class="mt-6">
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-primary-500 to-indigo-500 h-full rounded-full transition-all duration-1000"
                                style="width: {{ $studentCount > 0 ? min(($activeStudents/$studentCount)*100, 100) : 0 }}%">
                            </div>
                        </div>
                        <div class="flex justify-between items-center mt-3">
                            <p class="text-sm font-bold text-slate-500">
                                <span class="text-primary-600">{{ $studentCount > 0 ? number_format(($activeStudents/$studentCount)*100, 1) : 0 }}%</span> kehadiran
                            </p>
                            <a href="{{ route('students.index') }}" class="text-primary-600 hover:text-primary-700 font-bold text-sm flex items-center gap-1 group/link">
                                Kelola <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Guru Card -->
                <div class="glass-card p-8 group hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-500 border-none">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-chalkboard-teacher text-emerald-600 text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 bg-emerald-100 px-3 py-1 rounded-full">
                                {{ $activeTeachers }} Aktif
                            </span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Total Guru</h3>
                        <p class="text-4xl font-black text-slate-900 tracking-tighter">{{ number_format($teacherCount) }}</p>
                    </div>
                    <div class="mt-6">
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-full rounded-full transition-all duration-1000"
                                style="width: {{ $teacherCount > 0 ? min(($activeTeachers/$teacherCount)*100, 100) : 0 }}%">
                            </div>
                        </div>
                        <div class="flex justify-between items-center mt-3">
                            <p class="text-sm font-bold text-slate-500">
                                <span class="text-emerald-600">{{ $teacherCount > 0 ? number_format(($activeTeachers/$teacherCount)*100, 1) : 0 }}%</span> bertugas
                            </p>
                            <a href="{{ route('teachers.index') }}" class="text-emerald-600 hover:text-emerald-700 font-bold text-sm flex items-center gap-1 group/link">
                                Kelola <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Inventory Card -->
                <div class="glass-card p-8 group hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-500 border-none">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-school text-amber-600 text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-600 bg-amber-100 px-3 py-1 rounded-full">
                                {{ $activeInventories }} Tersedia
                            </span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Aset Sekolah</h3>
                        <p class="text-4xl font-black text-slate-900 tracking-tighter">{{ number_format($inventoryCount) }}</p>
                    </div>
                    <div class="mt-6">
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-amber-500 to-orange-500 h-full rounded-full transition-all duration-1000"
                                style="width: {{ $inventoryCount > 0 ? min(($activeInventories/$inventoryCount)*100, 100) : 0 }}%">
                            </div>
                        </div>
                        <div class="flex justify-between items-center mt-3">
                            <p class="text-sm font-bold text-slate-500">
                                <span class="text-amber-600">{{ $inventoryCount > 0 ? number_format(($activeInventories/$inventoryCount)*100, 1) : 0 }}%</span> ketersediaan
                            </p>
                            <a href="{{ route('inventories.index') }}" class="text-amber-600 hover:text-amber-700 font-bold text-sm flex items-center gap-1 group/link">
                                Kelola <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <!-- Quick Actions -->
                <div class="lg:col-span-1 glass-card p-8 border-none shadow-xl">
                    <h2 class="text-2xl font-black text-slate-900 mb-8 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-primary-100 flex items-center justify-center">
                            <i class="fas fa-bolt text-primary-600 text-lg"></i>
                        </div>
                        Akses Cepat
                    </h2>
                    <div class="grid grid-cols-1 gap-4">
                        <a href="{{ route('students.create') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-primary-500 hover:bg-primary-50 transition-all duration-300 group">
                            <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center group-hover:scale-110 shadow-sm transition-transform">
                                <i class="fas fa-user-plus text-primary-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Tambah Siswa Baru</h4>
                                <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Pendaftaran siswa</p>
                            </div>
                        </a>
                        <a href="{{ route('teachers.create') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-500 hover:bg-emerald-50 transition-all duration-300 group">
                            <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center group-hover:scale-110 shadow-sm transition-transform">
                                <i class="fas fa-user-tie text-emerald-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Tambah Guru Baru</h4>
                                <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Registrasi staf pengajar</p>
                            </div>
                        </a>
                        <a href="{{ route('inventories.create') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-amber-500 hover:bg-amber-50 transition-all duration-300 group">
                            <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center group-hover:scale-110 shadow-sm transition-transform">
                                <i class="fas fa-box text-amber-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Tambah Aset</h4>
                                <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Pencatatan inventaris</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="lg:col-span-2 glass-card p-8 border-none shadow-xl">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-black text-slate-900 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-primary-100 flex items-center justify-center">
                                <i class="fas fa-history text-primary-600 text-lg"></i>
                            </div>
                            Aktivitas Terbaru
                        </h2>
                        <button class="text-sm font-black uppercase tracking-widest text-primary-600 hover:underline">Lihat Semua</button>
                    </div>
                    <div class="space-y-6" id="recentActivitiesContainer">
                        @foreach($recentActivities as $activity)
                        <div class="flex gap-4 p-4 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                            <div class="w-12 h-12 rounded-full bg-{{ $activity['color'] }}-50 flex-shrink-0 flex items-center justify-center">
                                <i class="fas {{ $activity['icon'] }} text-{{ $activity['color'] }}-600"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <h4 class="font-bold text-slate-900 tracking-tight">{{ $activity['title'] }}</h4>
                                    <span class="text-[10px] uppercase font-black tracking-widest text-slate-400">{{ $activity['time'] }}</span>
                                </div>
                                <p class="text-sm text-slate-500 mt-1 font-medium">{{ $activity['description'] }}</p>
                            </div>
                        </div>
                        @endforeach

                        @if(count($recentActivities) === 0)
                        <div class="text-center py-20">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-inbox text-slate-200 text-3xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-400 tracking-tight">Belum ada aktivitas</h3>
                            <p class="text-sm text-slate-400">Aktivitas terbaru Anda akan muncul di sini</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Implementasi REAL untuk update Activities
    function updateActivities(data) {
        const container = document.getElementById('recentActivitiesContainer');
        container.innerHTML = '';

        if (data.length === 0) {
            container.innerHTML = `
            <div class="text-center py-12">
                <i class="fas fa-inbox text-slate-200 text-4xl mb-3"></i>
                <p class="text-slate-400">Tidak ada aktivitas terbaru</p>
            </div>
        `;
            return;
        }

        data.forEach(activity => {
            const activityElement = document.createElement('div');
            activityElement.className =
                'flex items-center justify-between p-4 bg-slate-50 rounded-2xl hover:bg-white border border-transparent hover:border-slate-100 transition-all';
            activityElement.innerHTML = `
            <div class="flex items-center">
                <div class="w-10 h-10 bg-${activity.color}-50 rounded-full flex items-center justify-center mr-4">
                    <i class="fas ${activity.icon} text-${activity.color}-600"></i>
                </div>
                <div>
                    <p class="text-slate-900 font-bold">${activity.title}</p>
                    <p class="text-sm text-slate-500">${activity.description}</p>
                </div>
            </div>
            <span class="text-[10px] font-black uppercase text-slate-400">${activity.time}</span>
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

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Dashboard initialized');
    });
</script>
@endpush