<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SmartSchool | Manajemen Pendidikan Masa Depan</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Build Assets (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            @apply antialiased;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Outfit', sans-serif;
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.05); }
        }
        .animate-pulse-slow { animation: pulse-slow 8s ease-in-out infinite; }
        
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1.2s cubic-bezier(0.2, 0.8, 0.2, 1);
            will-change: transform, opacity;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .mesh-bg {
            background-color: #ffffff;
            background-image: 
                radial-gradient(at 0% 0%, hsla(215, 100%, 98%, 1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(245, 100%, 98%, 1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(215, 100%, 98%, 1) 0, transparent 50%),
                radial-gradient(at 0% 100%, hsla(245, 100%, 98%, 1) 0, transparent 50%),
                radial-gradient(at 100% 100%, hsla(215, 100%, 98%, 1) 0, transparent 50%);
        }
    </style>
</head>

<body class="mesh-bg theme-transition min-h-screen relative overflow-x-hidden text-slate-800 selection:bg-primary-100 selection:text-primary-900">
    <!-- Static Gradient Blurs (Replacing floating elements) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden opacity-50">
        <div class="absolute -top-[10%] -left-[10%] w-[800px] h-[800px] bg-primary-100/40 rounded-full blur-[150px]"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[900px] h-[900px] bg-indigo-100/40 rounded-full blur-[180px]"></div>
    </div>

    @if(request()->routeIs('home'))
        @include('components.navbar')
    @endif

    <!-- Main Content -->
    <main class="theme-transition relative z-10 w-full overflow-x-hidden">
        @yield('content')
    </main>

    @if(request()->routeIs('home'))
        @include('components.footer')
    @endif

    <!-- JavaScript -->
    <script>
    // Reveal animations on scroll with Intersection Observer for better performance
    const observerOptions = {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                // Stop observing after it's revealed to prevent re-triggering if not needed
                // revealObserver.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".reveal").forEach(el => revealObserver.observe(el));
    });

    // Smooth scroll for all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    </script>
</body>

</html>