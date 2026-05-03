<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar | EduManage</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-6 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:20px_20px]">
    <div class="max-w-xl w-full">
        <!-- Brand -->
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl shadow-primary-500/20 cursor-pointer" onclick="window.location='{{ route('home') }}'">
                <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-black tracking-tight text-slate-900 uppercase">EduManage</h1>
            <p class="text-slate-500 font-medium">Buat akun untuk mulai mengelola sekolah Anda.</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100">
            <h2 class="text-2xl font-bold mb-10 text-slate-900 border-b border-slate-50 pb-6">Pendaftaran Akun</h2>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">Nama Lengkap</label>
                        <div class="relative group">
                            <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary-500 transition-colors"></i>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-slate-50 border border-slate-200 rounded-xl py-4 pl-12 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 outline-none placeholder:text-slate-300" placeholder="Masukkan nama lengkap">
                        </div>
                        @error('name')
                            <p class="text-xs text-red-500 mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">Alamat Email</label>
                        <div class="relative group">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary-500 transition-colors"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-4 pl-12 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 outline-none placeholder:text-slate-300" placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <p class="text-xs text-red-500 mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">Kata Sandi</label>
                        <div class="relative group">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary-500 transition-colors"></i>
                            <input type="password" name="password" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-4 pl-12 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 outline-none placeholder:text-slate-300" placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="text-xs text-red-500 mt-2 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">Konfirmasi Sandi</label>
                        <div class="relative group">
                            <i class="fas fa-check-circle absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary-500 transition-colors"></i>
                            <input type="password" name="password_confirmation" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-4 pl-12 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 outline-none placeholder:text-slate-300" placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn-primary w-full py-4 !rounded-xl font-bold uppercase tracking-widest text-sm shadow-lg shadow-primary-500/30 hover:scale-[1.02] active:scale-95 transition-all">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-6 border-t border-slate-50 text-center">
                <p class="text-xs font-medium text-slate-500">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-primary-600 font-bold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>

        <p class="text-center mt-12 text-[10px] font-bold uppercase tracking-widest text-slate-400">
            &copy; 2024 EduManage Management
        </p>
    </div>
</body>
</html>