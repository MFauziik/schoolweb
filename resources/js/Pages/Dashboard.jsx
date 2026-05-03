import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ stats, recentActivities }) {
    return (
        <>
            <Head title="Dashboard" />

            {/* Welcome Banner */}
            <div className="bg-white border border-[#EAEAEA] shadow-apple rounded-3xl p-8 md:p-12 mb-8 relative overflow-hidden">
                {/* Subtle accent blob */}
                <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-primary-100/50 rounded-full blur-3xl -mr-64 -mt-64 pointer-events-none"></div>
                <div className="relative z-10">
                    <h2 className="text-3xl font-semibold text-[#1D1D1F] mb-3 tracking-tight">Welcome back, Admin.</h2>
                    <p className="text-[#6E6E73] text-lg max-w-xl leading-relaxed">Here's what is happening at your school today. You have {stats.studentCount} active students currently enrolled.</p>
                </div>
            </div>

            {/* Stats Grid */}
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <DashboardStatCard 
                    label="Students" 
                    value={stats.studentCount} 
                    trend="+12% this month" 
                    icon={<UserIcon />} 
                    colorClass="text-blue-500 bg-blue-50/50"
                />
                <DashboardStatCard 
                    label="Teachers" 
                    value={stats.teacherCount} 
                    trend="Stable" 
                    icon={<TeacherIcon />} 
                    colorClass="text-indigo-500 bg-indigo-50/50"
                />
                <DashboardStatCard 
                    label="Resources" 
                    value={stats.inventoryCount} 
                    trend="Needs attention" 
                    icon={<BoxIcon />} 
                    colorClass="text-purple-500 bg-purple-50/50"
                />
            </div>

            <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {/* Recent Activities */}
                <div className="lg:col-span-2 glass-card p-8">
                    <div className="flex items-center justify-between mb-8">
                        <h3 className="text-xl font-semibold text-[#1D1D1F] tracking-tight">Recent Activities</h3>
                        <button className="text-sm font-medium text-primary-500 hover:text-primary-600">See All</button>
                    </div>

                    <div className="space-y-5">
                        {recentActivities.map((activity, idx) => (
                            <div key={idx} className="flex items-center gap-4 group">
                                <div className={`w-10 h-10 rounded-full flex items-center justify-center shrink-0 border ${
                                    activity.color === 'blue' ? 'bg-blue-50/50 text-blue-500 border-blue-100' : 
                                    activity.color === 'green' ? 'bg-green-50/50 text-green-500 border-green-100' : 
                                    'bg-amber-50/50 text-amber-500 border-amber-100'
                                }`}>
                                   <ActivityIcon type={activity.type} className="w-4 h-4" />
                                </div>
                                <div className="flex-1 min-w-0">
                                    <p className="text-sm font-medium text-[#1D1D1F] truncate group-hover:text-primary-600 transition-colors">{activity.title}</p>
                                    <p className="text-[13px] text-[#86868B] truncate mt-0.5">{activity.description}</p>
                                </div>
                                <div className="text-[13px] text-[#86868B] whitespace-nowrap">{activity.time}</div>
                            </div>
                        ))}
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="glass-card p-8">
                    <h3 className="text-xl font-semibold text-[#1D1D1F] tracking-tight mb-8">Quick Actions</h3>
                    <div className="grid grid-cols-2 gap-3 max-h-min">
                        <QuickActionCard icon={<UserIcon className="w-5 h-5" />} label="Add Student" />
                        <QuickActionCard icon={<TeacherIcon className="w-5 h-5" />} label="Add Teacher" />
                        <QuickActionCard icon={<BoxIcon className="w-5 h-5" />} label="Add Asset" />
                        <QuickActionCard icon={<BookIcon className="w-5 h-5" />} label="Log Borrow" />
                    </div>
                </div>
            </div>
        </>
    );
}

Dashboard.layout = page => <AuthenticatedLayout header="Overview">{page}</AuthenticatedLayout>;

function DashboardStatCard({ label, value, trend, icon, colorClass }) {
    return (
        <div className="glass-card p-6 hover:shadow-apple-hover transition-shadow duration-300">
            <div className="flex items-center justify-between mb-4">
                <div className={`w-10 h-10 rounded-full flex items-center justify-center ${colorClass}`}>
                    {icon}
                </div>
                <div className="text-[11px] font-semibold text-[#86868B] uppercase tracking-wider">{label}</div>
            </div>
            <div className="text-3xl font-semibold text-[#1D1D1F] tracking-tight mb-1">{value}</div>
            <div className="text-sm text-[#86868B]">{trend}</div>
        </div>
    );
}

function QuickActionCard({ icon, label }) {
    return (
        <button className="flex flex-col items-center justify-center p-4 bg-[#F5F5F7] rounded-2xl border border-transparent hover:border-[#D2D2D7] hover:bg-white transition-all group">
            <div className="text-[#6E6E73] group-hover:text-primary-500 mb-2 transition-colors">
                {icon}
            </div>
            <span className="text-[13px] font-medium text-[#1D1D1F]">{label}</span>
        </button>
    );
}

function ActivityIcon({ type, ...props }) {
    if (type === 'student_registered') return <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><polyline points="16 11 18 13 22 9"></polyline></svg>;
    if (type === 'teacher_registered') return <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M12 2a10 10 0 0 0-10 10c0 5.5 4.5 10 10 10s10-4.5 10-10a10 10 0 0 0-10-10z"></path><path d="m14 12-2 2-2-2"></path><path d="M12 18V12"></path></svg>;
    return <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>;
}

const UserIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>;
const TeacherIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="7" r="4"></circle><path d="M12 22C12 22 16 11 12 11C8 11 12 22 12 22Z"></path></svg>;
const BoxIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>;
const BookIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>;
