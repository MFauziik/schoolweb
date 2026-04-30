<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk | SmartSchool</title>
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
<body class="antialiased bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full">
        <!-- Brand -->
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl shadow-primary-500/20">
                <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-black tracking-tight text-slate-900 uppercase">SmartSchool</h1>
            <p class="text-slate-500 font-medium">Selamat datang kembali, silakan masuk.</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white p-8 md:p-10 rounded-[2rem] shadow-2xl shadow-slate-200/60 border border-slate-100">
            <h2 class="text-xl font-bold mb-8 text-slate-900 border-b border-slate-50 pb-4">Masuk ke Akun</h2>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">Alamat Email</label>
                    <div class="relative group">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary-500 transition-colors"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-slate-50 border border-slate-200 rounded-xl py-4 pl-12 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 outline-none placeholder:text-slate-300" placeholder="nama@email.com">
                    </div>
                    @error('email')
                        <p class="text-xs text-red-500 mt-2 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 ml-1">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold uppercase tracking-widest text-primary-600 hover:text-primary-700">Lupa Sandi?</a>
                        @endif
                    </div>
                    <div class="relative group">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary-500 transition-colors"></i>
                        <input type="password" name="password" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-4 pl-12 pr-4 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-medium text-slate-900 outline-none placeholder:text-slate-300" placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="text-xs text-red-500 mt-2 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-3 ml-1">
                    <input type="checkbox" name="remember" id="remember" class="w-5 h-5 rounded border-slate-300 text-primary-600 focus:ring-primary-500/20">
                    <label for="remember" class="text-xs font-bold text-slate-500 cursor-pointer">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="btn-primary w-full py-4 !rounded-xl font-bold uppercase tracking-widest text-sm shadow-lg shadow-primary-500/30 hover:scale-[1.02] active:scale-95 transition-all">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-50 text-center">
                <p class="text-xs font-medium text-slate-500">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-primary-600 font-bold hover:underline">Daftar Akun Baru</a>
                </p>
            </div>
        </div>
        
        <!-- Quick Access Info -->
        <div class="mt-6 p-4 bg-primary-50 rounded-2xl flex items-center gap-4 border border-primary-100">
            <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center shadow-sm">
                <i class="fas fa-info-circle text-primary-500"></i>
            </div>
            <div class="text-[10px] font-bold text-primary-700 leading-tight">
                Gunakan akun demo untuk mencoba: <br/>
                <span class="text-primary-900">admin@example.com</span> / <span class="text-primary-900">password</span>
            </div>
        </div>

        <p class="text-center mt-8 text-[10px] font-bold uppercase tracking-widest text-slate-400">
            &copy; 2024 SmartSchool System
        </p>
    </div>
</body>
</html>