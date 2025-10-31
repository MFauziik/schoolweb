<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - EduManage</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                colors: {
                    primary: {
                        50: '#f0f9ff',
                        100: '#e0f2fe',
                        500: '#0ea5e9',
                        600: '#0284c7',
                        700: '#0369a1',
                        900: '#0c4a6e',
                    }
                },
                fontFamily: {
                    'inter': ['Inter', 'sans-serif'],
                }
            }
        }
    }
    </script>

    <style>
    .theme-transition {
        transition: all 0.3s ease-in-out;
    }
    </style>
</head>

<body
    class="font-inter bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-900 dark:to-gray-800 theme-transition min-h-full">
    <!-- Theme Toggle -->
    <div class="absolute top-4 right-4">
        <button id="themeToggle"
            class="p-2 rounded-lg bg-white dark:bg-gray-700 shadow-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
            <i class="fas fa-moon" id="themeIcon"></i>
        </button>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="flex items-center justify-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                </div>
                <h2
                    class="text-4xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent mb-3">
                    Daftar Akun Baru
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg">
                    Buat akun untuk memulai
                </p>
            </div>

            <!-- Register Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 border border-gray-100 dark:border-gray-700">
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user text-purple-500 mr-2"></i>
                            Nama Lengkap
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="form-input" placeholder="masukkan nama lengkap">
                        @error('name')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>
                            Alamat Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="form-input" placeholder="masukkan email">
                        @error('email')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock text-green-500 mr-2"></i>
                            Kata Sandi
                        </label>
                        <input id="password" type="password" name="password" required class="form-input"
                            placeholder="buat kata sandi">
                        @error('password')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock text-amber-500 mr-2"></i>
                            Konfirmasi Kata Sandi
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="form-input" placeholder="ulangi kata sandi">
                        @error('password_confirmation')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="terms" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                            Saya menyetujui
                            <a href="#"
                                class="text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                                syarat dan ketentuan
                            </a>
                        </label>
                    </div>
                    @error('terms')
                    <p class="form-error">{{ $message }}</p>
                    @enderror

                    <!-- Submit Button -->
                    <button type="submit" class="btn-primary w-full">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </button>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Sudah punya akun?
                            <a href="{{ route('login') }}"
                                class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 font-medium transition-colors">
                                Masuk di sini
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-3 gap-4 text-center">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-100 dark:border-gray-700">
                    <i class="fas fa-shield-alt text-blue-500 text-xl mb-2"></i>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Aman</p>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-100 dark:border-gray-700">
                    <i class="fas fa-bolt text-green-500 text-xl mb-2"></i>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Cepat</p>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-100 dark:border-gray-700">
                    <i class="fas fa-users text-purple-500 text-xl mb-2"></i>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Terpercaya</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    &copy; {{ date('Y') }} EduManage. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
    // Theme Toggle
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');

    // Check for saved theme or prefer color scheme
    const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ?
        'dark' : 'light');

    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
        themeIcon.classList.replace('fa-moon', 'fa-sun');
    }

    themeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('theme', 'dark');
        }
    });

    // Password strength indicator (optional enhancement)
    document.getElementById('password').addEventListener('input', function(e) {
        const password = e.target.value;
        const strengthIndicator = document.getElementById('password-strength');

        if (!strengthIndicator) {
            const indicator = document.createElement('div');
            indicator.id = 'password-strength';
            indicator.className = 'mt-2 text-sm';
            e.target.parentNode.appendChild(indicator);
        }

        const indicator = document.getElementById('password-strength');
        let strength = 0;
        let message = '';
        let color = 'text-gray-500';

        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
        if (password.match(/\d/)) strength++;
        if (password.match(/[^a-zA-Z\d]/)) strength++;

        switch (strength) {
            case 0:
            case 1:
                message = 'Kata sandi lemah';
                color = 'text-red-500';
                break;
            case 2:
                message = 'Kata sandi cukup';
                color = 'text-yellow-500';
                break;
            case 3:
                message = 'Kata sandi kuat';
                color = 'text-green-500';
                break;
            case 4:
                message = 'Kata sandi sangat kuat';
                color = 'text-green-600';
                break;
        }

        if (password.length > 0) {
            indicator.innerHTML =
                `<span class="${color}"><i class="fas fa-shield-alt mr-1"></i>${message}</span>`;
        } else {
            indicator.innerHTML = '';
        }
    });
    </script>

    <style>
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .dark .form-label {
        color: #d1d5db;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.75rem;
        background-color: white;
        color: #1f2937;
        transition: all 0.2s;
    }

    .dark .form-input {
        background-color: #374151;
        border-color: #4b5563;
        color: white;
    }

    .form-input:focus {
        outline: none;
        ring: 2px;
        ring-color: #3b82f6;
        border-color: transparent;
    }

    .form-error {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
    }

    .form-error::before {
        content: "⚠ ";
        margin-right: 0.25rem;
    }

    .btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        transition: all 0.3s;
        transform: scale(1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #059669, #047857);
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    </style>
</body>

</html>