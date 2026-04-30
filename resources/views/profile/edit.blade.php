@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-6 lg:p-10 bg-slate-50/50 min-h-screen theme-transition">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-4xl lg:text-5xl font-black tracking-tight text-slate-900 mb-3">
                    Pengaturan <span class="bg-gradient-to-r from-primary-600 to-indigo-600 bg-clip-text text-transparent">Profil</span>
                </h1>
                <p class="text-lg text-slate-500 font-medium tracking-tight">Kelola informasi akun dan preferensi keamanan Anda.</p>
            </div>

            <div class="space-y-8">
                <!-- Profile Information Card -->
                <div class="glass-card p-8 border-none shadow-xl bg-white/80">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password Card -->
                <div class="glass-card p-8 border-none shadow-xl bg-white/80">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Card -->
                <div class="glass-card p-8 border-none shadow-xl bg-red-50/30">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
