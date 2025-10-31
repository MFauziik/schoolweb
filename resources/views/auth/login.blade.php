<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - EduManage</title>

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
    class="font-inter bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 theme-transition min-h-full">
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
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                </div>
                <h2
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-3">
                    Selamat Datang
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg">
                    Masuk ke akun Anda
                </p>
            </div>

            <!-- Login Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 border border-gray-100 dark:border-gray-700">
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>
                            Alamat Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-input" placeholder="masukkan email Anda">
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
                            placeholder="masukkan kata sandi">
                        @error('password')
                        <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                Ingat saya
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                            href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-primary w-full">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk
                    </button>

                    <!-- Register Link -->
                    <div class="text-center">
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                                class="text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors">
                                Daftar di sini
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Demo Credentials -->
                <div
                    class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
                    <p class="text-sm text-blue-700 dark:text-blue-300 text-center">
                        <i class="fas fa-info-circle mr-1"></i>
                        Demo: admin@example.com / password
                    </p>
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
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        transition: all 0.3s;
        transform: scale(1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    </style>
</body>

</html>