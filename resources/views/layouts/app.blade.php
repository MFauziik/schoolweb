<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Management System</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    .form-input,
    .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.75rem;
        background-color: white;
        color: #1f2937;
        transition: all 0.2s;
    }

    .dark .form-input,
    .dark .form-select {
        background-color: #374151;
        border-color: #4b5563;
        color: white;
    }

    .form-input:focus,
    .form-select:focus {
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

    .btn-primary {
        display: flex;
        flex: 1;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        transition: all 0.3s;
        transform: scale(1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        align-items: center;
        justify-content: center;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: scale(1.05);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .btn-secondary {
        display: flex;
        flex: 1;
        background-color: #6b7280;
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        transition: all 0.3s;
        border: 1px solid #d1d5db;
        align-items: center;
        justify-content: center;
    }

    .btn-secondary:hover {
        background-color: #4b5563;
        border-color: #9ca3af;
    }
    </style>
</head>

<body class="font-inter bg-white dark:bg-gray-900 theme-transition min-h-full">
    @include('components.navbar')

    <!-- Main Content -->
    <main class="theme-transition">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- JavaScript -->
    <script>
    // Theme Toggle
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

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

    // Mobile Menu Toggle
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
    </script>
</body>

</html>