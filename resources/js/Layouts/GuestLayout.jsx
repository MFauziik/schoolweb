import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50 font-sans text-slate-900 antialiased">
            <div className="absolute inset-0 z-0 overflow-hidden pointer-events-none">
                <div className="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-primary-100 rounded-full blur-[120px] opacity-60"></div>
                <div className="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] bg-indigo-100 rounded-full blur-[120px] opacity-60"></div>
            </div>

            <div className="z-10">
                <Link href="/">
                    <ApplicationLogo className="w-20 h-20 fill-current text-slate-500" />
                </Link>
            </div>

            <div className="w-full sm:max-w-md mt-6 px-8 py-10 bg-white/80 backdrop-blur-xl border border-white shadow-[0_20px_50px_-12px_rgba(0,0,0,0.05)] overflow-hidden sm:rounded-3xl z-10">
                {children}
            </div>
        </div>
    );
}
