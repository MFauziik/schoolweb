import { Link, Head } from '@inertiajs/react';
import ApplicationLogo from '@/Components/ApplicationLogo';

export default function Home({ auth, stats }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="min-h-screen bg-slate-50 font-sans selection:bg-primary-500 selection:text-white">
                {/* Background Blobs */}
                <div className="fixed inset-0 overflow-hidden pointer-events-none">
                    <div className="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-primary-100 rounded-full blur-[140px] opacity-60"></div>
                    <div className="absolute -bottom-[10%] -right-[10%] w-[50%] h-[50%] bg-indigo-100 rounded-full blur-[140px] opacity-60"></div>
                </div>

                {/* Navigation */}
                <nav className="relative z-20 flex items-center justify-between px-8 py-6 max-w-7xl mx-auto">
                    <ApplicationLogo />
                    <div className="flex items-center gap-6">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="px-6 py-2.5 font-bold text-white bg-primary-600 rounded-full shadow-lg shadow-primary-500/20 hover:shadow-primary-500/30 hover:-translate-y-0.5 transition-all duration-300"
                            >
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link href={route('login')} className="text-slate-600 font-bold hover:text-primary-600 transition-colors">
                                    Sign In
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="px-6 py-2.5 font-bold text-white bg-primary-600 rounded-full shadow-lg shadow-primary-500/20 hover:shadow-primary-500/30 hover:-translate-y-0.5 transition-all duration-300"
                                >
                                    Get Started
                                </Link>
                            </>
                        )}
                    </div>
                </nav>

                {/* Hero Section */}
                <main className="relative z-10 max-w-7xl mx-auto px-8 py-20 lg:py-32 flex flex-col items-center text-center">
                    <div className="inline-flex items-center gap-2 px-4 py-2 bg-white/50 backdrop-blur-md border border-white rounded-full text-sm font-bold text-primary-600 mb-8 animate-in fade-in slide-in-from-top-4 duration-1000">
                        <span className="flex h-2 w-2 rounded-full bg-primary-600 animate-pulse"></span>
                        Next Generation School Management
                    </div>

                    <h1 className="text-6xl lg:text-8xl font-extrabold tracking-tight text-slate-900 mb-8 leading-[1.1]">
                        Manage your school <br />
                        <span className="bg-clip-text text-transparent bg-gradient-to-r from-primary-600 via-indigo-600 to-violet-600">
                            with elegance.
                        </span>
                    </h1>

                    <p className="text-lg lg:text-xl text-slate-500 max-w-2xl mb-12 leading-relaxed">
                        A modern, minimalist, and powerful dashboard to handle students, teachers, and resources. 
                        Designed for efficiency and beauty.
                    </p>

                    <div className="flex flex-col sm:flex-row gap-4 mb-24">
                        <Link
                            href={route('register')}
                            className="px-10 py-4 bg-slate-900 text-white font-bold rounded-2xl shadow-xl shadow-slate-900/10 hover:shadow-slate-900/20 hover:-translate-y-1 transition-all duration-300"
                        >
                            Start for free
                        </Link>
                        <Link
                            href="#stats"
                            className="px-10 py-4 bg-white text-slate-900 font-bold rounded-2xl border border-slate-200 shadow-sm hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300"
                        >
                            View Statistics
                        </Link>
                    </div>

                    {/* Stats Grid */}
                    <div id="stats" className="grid grid-cols-2 md:grid-cols-3 gap-8 w-full max-w-4xl mx-auto">
                        <StatCard icon={<UserIcon />} label="Students" value={stats.studentCount} color="bg-blue-50 text-blue-600" />
                        <StatCard icon={<TeacherIcon />} label="Teachers" value={stats.teacherCount} color="bg-indigo-50 text-indigo-600" />
                        <StatCard icon={<BoxIcon />} label="Resources" value={stats.inventoryCount} color="bg-violet-50 text-violet-600" />
                    </div>
                </main>
            </div>
        </>
    );
}

function StatCard({ icon, label, value, color }) {
    return (
        <div className="p-8 bg-white/60 backdrop-blur-xl border border-white rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 group">
            <div className={`w-14 h-14 ${color} rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-500`}>
                {icon}
            </div>
            <div className="text-4xl font-extrabold text-slate-900 mb-2">{value}</div>
            <div className="text-sm font-bold text-slate-400 uppercase tracking-widest">{label}</div>
        </div>
    );
}

const UserIcon = () => <svg className="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>;
const TeacherIcon = () => <svg className="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M12 2a10 10 0 0 0-10 10c0 5.5 4.5 10 10 10s10-4.5 10-10a10 10 0 0 0-10-10z"></path><path d="M12 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path><path d="M6 20a6 6 0 0 1 12 0"></path></svg>;
const BoxIcon = () => <svg className="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>;
