import { useState, useEffect } from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown';
import NavLink from '@/Components/NavLink';
import { Link, usePage } from '@inertiajs/react';

export default function AuthenticatedLayout({ header, children }) {
    const user = usePage().props.auth.user;
    const { flash } = usePage().props;
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);
    const [showFlash, setShowFlash] = useState(false);

    useEffect(() => {
        if (flash.success || flash.error) {
            setShowFlash(true);
            const timer = setTimeout(() => setShowFlash(false), 5000);
            return () => clearTimeout(timer);
        }
    }, [flash]);

    return (
        <div className="min-h-screen bg-[#F5F5F7] flex selection:bg-primary-500/30">
            {/* Sidebar */}
            <aside className="w-64 bg-white/80 backdrop-blur-3xl border-r border-[#EAEAEA] hidden lg:flex flex-col sticky top-0 h-screen z-20 transition-all">
                <div className="px-6 pb-6 pt-8">
                    <Link href="/" className="inline-block transition-transform active:scale-95">
                        <ApplicationLogo className="w-auto h-8" />
                    </Link>
                </div>

                <nav className="flex-1 px-4 space-y-1 overflow-y-auto pt-2">
                    <div className="px-3 text-[11px] font-bold text-[#86868B] uppercase tracking-wider mb-2">Menu</div>
                    <SidebarLink href={route('dashboard')} active={route().current('dashboard')}>
                        <DashboardIcon className="w-5 h-5 mr-3 opacity-80" />
                        Dashboard
                    </SidebarLink>

                    <div className="pt-6 pb-2 px-3 text-[11px] font-bold text-[#86868B] uppercase tracking-wider">Management</div>
                    
                    <SidebarLink href={route('students.index')} active={route().current('students.*')}>
                        <UserIcon className="w-5 h-5 mr-3 opacity-80" />
                        Students
                    </SidebarLink>

                    <SidebarLink href={route('teachers.index')} active={route().current('teachers.*')}>
                        <TeacherIcon className="w-5 h-5 mr-3 opacity-80" />
                        Teachers
                    </SidebarLink>

                    <SidebarLink href={route('inventories.index')} active={route().current('inventories.*')}>
                        <BoxIcon className="w-5 h-5 mr-3 opacity-80" />
                        Inventories
                    </SidebarLink>

                    <SidebarLink href={route('borrowings.index')} active={route().current('borrowings.*')}>
                        <BookIcon className="w-5 h-5 mr-3 opacity-80" />
                        Borrowings
                    </SidebarLink>
                </nav>

                <div className="p-4 border-t border-[#EAEAEA]">
                    <div className="flex items-center p-3 hover:bg-[#F5F5F7] rounded-xl transition-colors cursor-pointer group">
                        <div className="w-9 h-9 bg-primary-100 rounded-full flex items-center justify-center text-primary-700 font-bold mr-3 group-hover:scale-105 transition-transform">
                            {user.name.charAt(0)}
                        </div>
                        <div className="flex-1 min-w-0">
                            <p className="text-sm font-semibold text-[#1D1D1F] truncate leading-tight">{user.name}</p>
                            <p className="text-xs text-[#86868B] truncate leading-tight">{user.email}</p>
                        </div>
                    </div>
                </div>
            </aside>

            {/* Main Content */}
            <div className="flex-1 flex flex-col min-w-0 overflow-hidden">
                <header className="h-16 bg-[#F5F5F7]/80 backdrop-blur-xl border-b border-[#EAEAEA] sticky top-0 z-10 flex items-center justify-between px-8">
                   <div className="lg:hidden flex items-center">
                        <Link href="/">
                            <ApplicationLogo className="w-auto h-7" />
                        </Link>
                   </div>

                   <div className="font-semibold text-[#1D1D1F] text-lg hidden lg:block tracking-tight">
                        {header}
                   </div>

                   <div className="flex items-center gap-4">
                        <div className="hidden sm:flex sm:items-center sm:ms-6">
                            <div className="ms-3 relative">
                                <Dropdown>
                                    <Dropdown.Trigger>
                                        <span className="inline-flex rounded-xl">
                                            <button
                                                type="button"
                                                className="inline-flex items-center px-3 py-2 text-sm font-medium rounded-xl text-[#515154] hover:text-[#1D1D1F] hover:bg-white/60 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {user.name}

                                                <svg
                                                    className="ms-2 -me-0.5 h-4 w-4 opacity-50"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fillRule="evenodd"
                                                        d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1 -1.414 0l-4-4a1 1 0 0 1 0-1.414z"
                                                        clipRule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </Dropdown.Trigger>

                                    <Dropdown.Content>
                                        <Dropdown.Link href={route('profile.edit')}>Profile</Dropdown.Link>
                                        <Dropdown.Link href={route('logout')} method="post" as="button">
                                            Log Out
                                        </Dropdown.Link>
                                    </Dropdown.Content>
                                </Dropdown>
                            </div>
                        </div>
                   </div>
                </header>

                <main className="flex-1 overflow-y-auto p-6 md:p-10 h-[calc(100vh-4rem)]">
                    <div className="max-w-7xl mx-auto animate-in fade-in duration-700 slide-in-from-bottom-4">
                        {children}
                    </div>
                </main>
            </div>
        </div>
    );
}

function SidebarLink({ href, active, children }) {
    return (
        <Link
            href={href || ''}
            className={`flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 group ${
                active 
                ? 'bg-primary-50 text-primary-600 shadow-sm' 
                : 'text-[#515154] hover:bg-[#F5F5F7] hover:text-[#1D1D1F]'
            }`}
        >
            {children}
        </Link>
    );
}

// Icons
const DashboardIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>;
const UserIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>;
const TeacherIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M12 2a10 10 0 0 0-10 10c0 5.5 4.5 10 10 10s10-4.5 10-10a10 10 0 0 0-10-10z"></path><path d="M12 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path><path d="M6 20a6 6 0 0 1 12 0"></path></svg>;
const BoxIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>;
const BookIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>;
