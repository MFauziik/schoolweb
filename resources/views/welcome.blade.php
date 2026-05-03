<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EduManage | Next-Gen Education Management</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            h1, h2, h3, h4, .font-heading { font-family: 'Outfit', sans-serif; }
            
            @keyframes float {
                0% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(2deg); }
                100% { transform: translateY(0px) rotate(0deg); }
            }
            @keyframes drift {
                0% { transform: translate(0, 0); }
                50% { transform: translate(30px, 20px); }
                100% { transform: translate(0, 0); }
            }
            @keyframes pulse-slow {
                0%, 100% { opacity: 0.3; transform: scale(1); }
                50% { opacity: 0.6; transform: scale(1.05); }
            }
            .animate-float { animation: float 6s ease-in-out infinite; }
            .animate-drift { animation: drift 10s ease-in-out infinite; }
            .animate-pulse-slow { animation: pulse-slow 8s ease-in-out infinite; }
            
            .reveal {
                opacity: 0;
                transform: translateY(40px);
                transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
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

            .hero-text-glow {
                text-shadow: 0 0 40px rgba(71, 118, 255, 0.1);
            }
        </style>
    </head>
    <body class="antialiased mesh-bg text-slate-800 overflow-x-hidden selection:bg-primary-100 selection:text-primary-900">
        <!-- Floating Elements Background -->
        <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
            <div class="absolute top-[-10%] left-[-10%] w-[800px] h-[800px] bg-primary-100/30 rounded-full blur-[150px] animate-drift"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[900px] h-[900px] bg-indigo-100/30 rounded-full blur-[180px] animate-drift" style="animation-delay: -5s;"></div>
        </div>

        <!-- Navigation -->
        <nav class="fixed top-0 left-0 w-full z-50 px-6 py-8 transition-all duration-700" id="main-nav">
            <div class="max-w-7xl mx-auto flex items-center justify-between glass-card px-10 py-5 !rounded-[2.5rem] border-white/40 backdrop-blur-3xl shadow-2xl shadow-primary-500/5">
                <div class="flex items-center gap-4 group cursor-pointer">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary-600 to-indigo-600 flex items-center justify-center shadow-2xl shadow-primary-500/40 group-hover:rotate-12 transition-all duration-500">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <div class="flex flex-col -space-y-1">
                        <span class="text-3xl font-black tracking-tighter text-slate-900">Smart<span class="text-primary-600 italic">School</span></span>
                        <span class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-400">Digital Node</span>
                    </div>
                </div>

                <div class="hidden lg:flex items-center gap-12 font-black text-[10px] uppercase tracking-[0.3em] text-slate-400">
                    <a href="#features" class="hover:text-primary-600 transition-all relative group">
                        Capabilities
                        <span class="absolute -bottom-2 left-0 w-0 h-1 bg-primary-600 transition-all duration-300 group-hover:w-full rounded-full"></span>
                    </a>
                    <a href="#" class="hover:text-primary-600 transition-all relative group">
                        Ecosystem
                        <span class="absolute -bottom-2 left-0 w-0 h-1 bg-primary-600 transition-all duration-300 group-hover:w-full rounded-full"></span>
                    </a>
                    <a href="#" class="hover:text-primary-600 transition-all relative group">
                        Intelligence
                        <span class="absolute -bottom-2 left-0 w-0 h-1 bg-primary-600 transition-all duration-300 group-hover:w-full rounded-full"></span>
                    </a>
                </div>

                <div class="flex items-center gap-8">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-primary !rounded-2xl py-4 px-10 shadow-2xl shadow-primary-500/30 hover:scale-105 transition-all font-black uppercase tracking-widest text-xs">Access Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-black text-[10px] uppercase tracking-[0.3em] text-slate-500 hover:text-primary-600 transition-all">Registry Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-primary !rounded-2xl py-4 px-10 shadow-2xl shadow-primary-500/30 hover:scale-105 transition-all font-black uppercase tracking-widest text-xs">Deploy Now</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-64 pb-32 md:pt-80 md:pb-48 px-6 z-10">
            <div class="max-w-7xl mx-auto text-center">
                <div class="reveal">
                    <div class="inline-flex items-center gap-4 px-8 py-3 rounded-full glass-card border-white/50 text-slate-500 font-black text-[10px] uppercase tracking-[0.4em] mb-14 mx-auto shadow-2xl backdrop-blur-3xl animate-float">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                        </span>
                        Institutional Intelligence OS v4.0
                    </div>
                    
                    <h1 class="text-7xl md:text-9xl lg:text-[10rem] font-black tracking-tighter leading-[0.85] mb-14 hero-text-glow text-slate-900">
                        Education <br/>
                        <span class="bg-gradient-to-r from-primary-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent italic pb-4 block">Reimagined.</span>
                    </h1>
                    
                    <p class="text-xl md:text-3xl text-slate-400 leading-relaxed mb-20 max-w-4xl mx-auto font-medium tracking-tight">
                        EduManage is the high-performance core for modern learning environments. Centralize telemetry, automate administration, and amplify pedagogical output.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-8">
                        <a href="{{ route('register') }}" class="btn-primary !rounded-3xl py-6 px-16 text-xl w-full sm:w-auto text-center shadow-[0_20px_50px_rgba(71,118,255,0.4)] hover:scale-105 active:scale-95 transition-all font-black uppercase tracking-[0.2em]">
                            Initialize Node
                        </a>
                        <a href="#features" class="glass-card !rounded-3xl py-6 px-16 text-xl w-full sm:w-auto text-center font-black uppercase tracking-[0.2em] hover:bg-white transition-all backdrop-blur-3xl border-white/60 text-slate-600">
                            Core Specs <i class="fas fa-chevron-right ml-4 text-primary-500 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Scrolling Preview -->
                <div class="mt-48 reveal group">
                    <div class="relative max-w-6xl mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary-500/30 to-indigo-500/30 rounded-[5rem] blur-[120px] animate-pulse-slow"></div>
                        <div class="glass-card p-6 rounded-[5rem] relative border-white/60 shadow-2xl backdrop-blur-3xl overflow-hidden group-hover:scale-[1.03] transition-all duration-1000">
                             <!-- UI Mockup -->
                             <div class="bg-slate-50/50 rounded-[4rem] p-10 min-h-[600px] border border-white">
                                <div class="flex gap-10 items-start h-full">
                                    <div class="w-72 h-[480px] bg-white rounded-[3rem] p-8 hidden md:block shadow-xl border border-slate-100">
                                        <div class="space-y-6">
                                            <div class="h-14 bg-primary-50 rounded-2xl w-full"></div>
                                            <div class="h-8 bg-slate-50 rounded-xl w-3/4"></div>
                                            <div class="h-8 bg-slate-50 rounded-xl w-2/3"></div>
                                            <div class="pt-12 space-y-4">
                                                <div class="h-4 bg-slate-50 rounded-md w-full"></div>
                                                <div class="h-4 bg-slate-50 rounded-md w-5/6"></div>
                                                <div class="h-4 bg-slate-50 rounded-md w-4/5"></div>
                                                <div class="h-4 bg-slate-50 rounded-md w-11/12"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 space-y-10">
                                        <div class="flex justify-between items-center">
                                            <div class="h-14 bg-white rounded-3xl w-64 shadow-sm border border-slate-100 px-6 flex items-center">
                                                <div class="h-2 w-full bg-slate-50 rounded-full"></div>
                                            </div>
                                            <div class="h-14 w-14 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center">
                                                <div class="w-6 h-6 rounded-full bg-primary-100"></div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-8">
                                            <div class="h-40 bg-white rounded-[2.5rem] shadow-lg border border-primary-50 animate-pulse"></div>
                                            <div class="h-40 bg-white rounded-[2.5rem] shadow-lg border border-indigo-50 animate-pulse" style="animation-delay: 0.2s"></div>
                                            <div class="h-40 bg-white rounded-[2.5rem] shadow-lg border border-sky-50 animate-pulse" style="animation-delay: 0.4s"></div>
                                        </div>
                                        <div class="h-[240px] bg-white rounded-[3.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                                            <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-white"></div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <!-- Glossy Overlay -->
                             <div class="absolute inset-0 bg-gradient-to-t from-white/30 via-transparent to-white/10 pointer-events-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Grid -->
        <section id="features" class="py-48 px-6 relative z-10 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-32 reveal">
                    <h2 class="text-[10px] font-black uppercase tracking-[0.5em] text-primary-600 mb-8">Architectural Modules</h2>
                    <h3 class="text-6xl md:text-8xl font-black tracking-tighter mb-10 leading-[0.9] text-slate-900">Precision Engineered <br/> Ecosystem.</h3>
                    <p class="text-2xl text-slate-400 max-w-4xl mx-auto leading-relaxed font-medium tracking-tight">
                        EduManage deploys a constellation of intelligent sub-systems designed to unify every vector of school management.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                    <!-- Feature 1 -->
                    <div class="reveal glass-card p-14 group hover:translate-y-[-20px] transition-all duration-700 border-none relative overflow-hidden h-full shadow-2xl shadow-primary-500/5 !rounded-[3rem]">
                        <div class="absolute top-0 right-0 w-48 h-48 bg-primary-50/50 rounded-bl-[120px] group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="w-20 h-20 rounded-[2rem] bg-primary-100/50 flex items-center justify-center mb-12 group-hover:rotate-12 transition-all duration-500 shadow-xl shadow-primary-500/10">
                            <i class="fas fa-microchip text-primary-600 text-4xl"></i>
                        </div>
                        <h4 class="text-4xl font-black mb-8 group-hover:text-primary-600 transition-colors tracking-tighter text-slate-900 leading-none">Pedagogical <br/>Telemetry</h4>
                        <p class="text-slate-500 leading-relaxed mb-10 text-xl font-medium tracking-tight">Real-time dynamic student profiling, automated cognitive assessment tracking, and deep-learning attendance logic.</p>
                        <div class="flex items-center gap-4 font-black text-[10px] uppercase tracking-widest text-primary-600 opacity-0 group-hover:opacity-100 transition-all duration-500 underline underline-offset-8">
                            Initialize Module <i class="fas fa-arrow-right text-xs"></i>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="reveal glass-card p-14 group hover:translate-y-[-20px] transition-all duration-700 border-none relative overflow-hidden h-full shadow-2xl shadow-indigo-500/5 !rounded-[3rem]" style="transition-delay: 0.1s">
                        <div class="absolute top-0 right-0 w-48 h-48 bg-indigo-50/50 rounded-bl-[120px] group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="w-20 h-20 rounded-[2rem] bg-indigo-100/50 flex items-center justify-center mb-12 group-hover:rotate-12 transition-all duration-500 shadow-xl shadow-indigo-500/10">
                            <i class="fas fa-network-wired text-indigo-600 text-4xl"></i>
                        </div>
                        <h4 class="text-4xl font-black mb-8 group-hover:text-indigo-600 transition-colors tracking-tighter text-slate-900 leading-none">Administrative <br/>Interface</h4>
                        <p class="text-slate-500 leading-relaxed mb-10 text-xl font-medium tracking-tight">High-fidelity educator dashboards, automated resource scheduling, and end-to-end institutional reporting engines.</p>
                        <div class="flex items-center gap-4 font-black text-[10px] uppercase tracking-widest text-indigo-600 opacity-0 group-hover:opacity-100 transition-all duration-500 underline underline-offset-8">
                            Learn More <i class="fas fa-arrow-right text-xs"></i>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="reveal glass-card p-14 group hover:translate-y-[-20px] transition-all duration-700 border-none relative overflow-hidden h-full shadow-2xl shadow-amber-500/5 !rounded-[3rem]" style="transition-delay: 0.2s">
                        <div class="absolute top-0 right-0 w-48 h-48 bg-amber-50/50 rounded-bl-[120px] group-hover:scale-150 transition-transform duration-1000"></div>
                        <div class="w-20 h-20 rounded-[2rem] bg-amber-100/50 flex items-center justify-center mb-12 group-hover:rotate-12 transition-all duration-500 shadow-xl shadow-amber-500/10">
                            <i class="fas fa-database text-amber-600 text-4xl"></i>
                        </div>
                        <h4 class="text-4xl font-black mb-8 group-hover:text-amber-600 transition-colors tracking-tighter text-slate-900 leading-none">Resource <br/>Registry</h4>
                        <p class="text-slate-500 leading-relaxed mb-10 text-xl font-medium tracking-tight">Advanced asset lifecycle tracking, secure inventory allocation, and preemptive operational maintenance logs.</p>
                        <div class="flex items-center gap-4 font-black text-[10px] uppercase tracking-widest text-amber-600 opacity-0 group-hover:opacity-100 transition-all duration-500 underline underline-offset-8">
                            Learn More <i class="fas fa-arrow-right text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dynamic Background Section -->
        <section class="py-48 px-6 overflow-hidden relative reveal">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="bg-gradient-to-br from-slate-900 to-indigo-950 rounded-[5rem] p-20 md:p-32 text-white relative overflow-hidden group shadow-[0_50px_100px_-20px_rgba(0,0,0,0.5)]">
                    <!-- Animated Shapes inside Card -->
                    <div class="absolute top-[-50%] right-[-10%] w-[1000px] h-[1000px] bg-primary-500/10 rounded-full blur-[120px] group-hover:scale-110 transition-transform duration-1000"></div>
                    <div class="absolute bottom-[-20%] left-[-10%] w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px]"></div>
                    
                    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-32 items-center">
                        <div>
                            <h3 class="text-6xl md:text-8xl font-black tracking-tighter mb-12 leading-[0.95]">Deploy Excellence. <br/> At Scale.</h3>
                            <p class="text-2xl text-slate-400 font-medium leading-relaxed mb-16 tracking-tight">
                                Join over 2,500 global institutions already operating on the EduManage architecture.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-10">
                                <a href="{{ route('register') }}" class="bg-white text-slate-950 !rounded-2xl py-6 px-16 text-xl font-black uppercase tracking-[0.2em] hover:scale-105 active:scale-95 transition-all text-center">Initialize Now</a>
                                <a href="#" class="border-2 border-white/20 !rounded-2xl py-6 px-16 text-xl font-black uppercase tracking-[0.2em] hover:bg-white/10 transition-all text-center backdrop-blur-sm">System Specs</a>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                             <div class="glass-card bg-white/5 p-10 border-white/10 text-center animate-float shadow-none !rounded-[3rem]">
                                <span class="text-5xl font-black block mb-4 tracking-tighter text-primary-400">99.9%</span>
                                <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">System Uptime</span>
                             </div>
                             <div class="glass-card bg-white/5 p-10 border-white/10 text-center animate-float shadow-none !rounded-[3rem]" style="animation-delay: -3s">
                                <span class="text-5xl font-black block mb-4 tracking-tighter text-indigo-400">4.9s</span>
                                <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">Average Response</span>
                             </div>
                             <div class="glass-card bg-white/5 p-10 border-white/10 text-center animate-float shadow-none !rounded-[3rem]" style="animation-delay: -1s">
                                <span class="text-5xl font-black block mb-4 tracking-tighter text-sky-400">24/7</span>
                                <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">Sentinel Support</span>
                             </div>
                             <div class="glass-card bg-white/5 p-10 border-white/10 text-center animate-float shadow-none !rounded-[3rem]" style="animation-delay: -4s">
                                <span class="text-5xl font-black block mb-4 tracking-tighter text-emerald-400">10M+</span>
                                <span class="text-[10px] font-black uppercase tracking-[0.4em] opacity-40">Daily Records</span>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="pt-48 pb-20 px-6 relative z-10 border-t border-slate-100 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-24 mb-32">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center gap-6 mb-12">
                            <div class="w-16 h-16 rounded-[1.5rem] bg-gradient-to-br from-primary-600 to-indigo-600 flex items-center justify-center shadow-2xl shadow-primary-500/30">
                                <i class="fas fa-graduation-cap text-white text-3xl"></i>
                            </div>
                            <span class="text-4xl font-black tracking-tighter italic text-slate-900 uppercase">EduManage</span>
                        </div>
                        <p class="text-2xl text-slate-400 max-w-md mb-16 leading-relaxed font-medium tracking-tight">
                            The definitive architectural backbone for digital-first education sectors.
                        </p>
                        <div class="flex items-center gap-8">
                            <a href="#" class="w-16 h-16 rounded-2xl glass-card flex items-center justify-center text-xl text-slate-400 hover:text-primary-600 hover:scale-110 active:scale-90 transition-all duration-300 border-slate-100 shadow-xl shadow-slate-100/50"><i class="fab fa-x-twitter"></i></a>
                            <a href="#" class="w-16 h-16 rounded-2xl glass-card flex items-center justify-center text-xl text-slate-400 hover:text-primary-600 hover:scale-110 active:scale-90 transition-all duration-300 border-slate-100 shadow-xl shadow-slate-100/50"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="w-16 h-16 rounded-2xl glass-card flex items-center justify-center text-xl text-slate-400 hover:text-primary-600 hover:scale-110 active:scale-90 transition-all duration-300 border-slate-100 shadow-xl shadow-slate-100/50"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-400 mb-12">Registry Operations</h5>
                        <ul class="space-y-8 text-lg font-black text-slate-800 tracking-tight">
                            <li><a href="#" class="hover:text-primary-600 transition-all">Capabilities</a></li>
                            <li><a href="#" class="hover:text-primary-600 transition-all">Encryption</a></li>
                            <li><a href="#" class="hover:text-primary-600 transition-all">Infrastructure</a></li>
                            <li><a href="#" class="hover:text-primary-600 transition-all">Enterprise</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-400 mb-12">Network Info</h5>
                        <ul class="space-y-8 text-lg font-black text-slate-800 tracking-tight">
                            <li><a href="#" class="hover:text-primary-600 transition-all">Foundation</a></li>
                            <li><a href="#" class="hover:text-primary-600 transition-all">Careers Node</a></li>
                            <li><a href="#" class="hover:text-primary-600 transition-all">Version Logs</a></li>
                            <li><a href="#" class="hover:text-primary-600 transition-all">Hub Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-between pt-20 border-t border-slate-100 text-[10px] font-black tracking-[0.4em] uppercase text-slate-400">
                    <p>&copy; 2026 EduManage System. Operational Excellence.</p>
                    <div class="flex items-center gap-14 mt-12 md:mt-0">
                        <a href="#" class="hover:text-primary-600 transition-all">Privacy Protocol</a>
                        <a href="#" class="hover:text-primary-600 transition-all">Terms of Ops</a>
                    </div>
                </div>
            </div>
        </footer>
>

        <script>
            // Reveal animations on scroll
            function reveal() {
                var reveals = document.querySelectorAll(".reveal");
                for (var i = 0; i < reveals.length; i++) {
                    var windowHeight = window.innerHeight;
                    var elementTop = reveals[i].getBoundingClientRect().top;
                    var elementVisible = 150;
                    if (elementTop < windowHeight - elementVisible) {
                        reveals[i].classList.add("active");
                    }
                }
            }
            window.addEventListener("scroll", reveal);
            // Run once on load
            reveal();

            // Navbar effect
            window.addEventListener('scroll', () => {
                const nav = document.getElementById('main-nav');
                if (window.scrollY > 50) {
                    nav.classList.add('py-4');
                    nav.querySelector('.glass-card').classList.add('!px-10', 'shadow-2xl');
                } else {
                    nav.classList.remove('py-4');
                    nav.querySelector('.glass-card').classList.remove('!px-10', 'shadow-2xl');
                }
            });
        </script>
    </body>
</html>
