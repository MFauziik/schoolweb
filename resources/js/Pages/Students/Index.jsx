import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';
import { useState, useEffect, useRef } from 'react';

export default function Index({ students, filters }) {
    const [search, setSearch] = useState(filters.search || '');
    const isFirstRender = useRef(true);

    useEffect(() => {
        if (isFirstRender.current) {
            isFirstRender.current = false;
            return;
        }
        const delayDebounceFn = setTimeout(() => {
            router.get(route('students.index'), { 
                search, 
                jurusan: filters.jurusan, 
                status: filters.status 
            }, { preserveState: true, replace: true });
        }, 300);

        return () => clearTimeout(delayDebounceFn);
    }, [search]);

    const handleSearch = (e) => {
        e.preventDefault();
    };

    return (
        <>
            <Head title="Students" />

            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 className="text-2xl font-semibold text-[#1D1D1F] tracking-tight">Students Directory</h2>
                    <p className="text-[#6E6E73] text-[15px] mt-1 tracking-tight">Manage student profiles, classes, and statuses.</p>
                </div>
                <Link href={route('students.create')} className="btn-primary">
                    <PlusIcon className="w-5 h-5 mr-2" />
                    New Student
                </Link>
            </div>

            {/* Filters and Search */}
            <div className="glass-card p-4 md:p-6 mb-8 flex flex-col md:flex-row gap-4 items-center bg-white/50">
                <form onSubmit={handleSearch} className="relative flex-1 w-full">
                    <SearchIcon className="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[#86868B]" />
                    <input 
                        type="text" 
                        value={search}
                        onChange={(e) => setSearch(e.target.value)}
                        placeholder="Search by name, NISN or class..."
                        className="form-input pl-11 bg-white"
                    />
                </form>
                <div className="flex gap-4 w-full md:w-auto">
                    <select 
                        className="form-select min-w-[160px] bg-white text-[#1D1D1F]"
                        value={filters.jurusan || ''}
                        onChange={(e) => router.get(route('students.index'), { ...filters, jurusan: e.target.value })}
                    >
                        <option value="">All Jurusan</option>
                        <option value="Pengembangan Perangkat Lunak dan Gim">PPLG</option>
                        <option value="Teknik Otomotif">TO</option>
                        <option value="Teknik Pengelasan dan Fabrikasi Logam">TPFL</option>
                        <option value="Broadcasting dan Film">BCF</option>
                        <option value="Animasi">Animasi</option>
                    </select>
                </div>
            </div>

            {/* Table */}
            <div className="glass-card overflow-hidden">
                <div className="overflow-x-auto">
                    <table className="w-full text-left border-collapse">
                        <thead>
                            <tr className="border-b border-[#EAEAEA] bg-[#F5F5F7]/50">
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Student</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">NISN</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Class</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Jurusan</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Status</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-[#EAEAEA]">
                            {students.data.map((student) => (
                                <tr key={student.id} className="hover:bg-[#F5F5F7]/40 transition-colors group">
                                    <td className="px-6 py-4">
                                        <div className="flex items-center gap-4">
                                            <div className="w-10 h-10 rounded-full bg-[#F5F5F7] overflow-hidden shrink-0 border border-[#D2D2D7]/50 flex items-center justify-center">
                                                {student.foto ? (
                                                    <img src={`/storage/${student.foto}`} alt="" className="w-full h-full object-cover" />
                                                ) : (
                                                    <UserIcon className="w-5 h-5 text-[#86868B]" />
                                                )}
                                            </div>
                                            <div className="min-w-0">
                                                <p className="text-[15px] font-semibold text-[#1D1D1F] truncate leading-tight group-hover:text-primary-600 transition-colors">{student.nama}</p>
                                                <p className="text-[13px] text-[#86868B]">Angkatan {student.angkatan}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td className="px-6 py-4 text-[15px] text-[#1D1D1F]">{student.nisn}</td>
                                    <td className="px-6 py-4 text-[15px] text-[#1D1D1F]">{student.kelas}</td>
                                    <td className="px-6 py-4">
                                        <span className="px-3 py-1 bg-white border border-[#D2D2D7] text-[#515154] rounded-full text-[12px] font-medium truncate block max-w-[150px] shadow-sm">
                                            {student.jurusan}
                                        </span>
                                    </td>
                                    <td className="px-6 py-4">
                                        <div className="flex items-center gap-2">
                                            <span className={`w-2 h-2 rounded-full ${student.is_active ? 'bg-primary-500' : 'bg-[#D2D2D7]'}`}></span>
                                            <span className={`text-[13px] font-medium ${student.is_active ? 'text-[#1D1D1F]' : 'text-[#86868B]'}`}>
                                                {student.is_active ? 'Active' : 'Inactive'}
                                            </span>
                                        </div>
                                    </td>
                                    <td className="px-6 py-4 text-right">
                                        <div className="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <Link href={route('students.edit', student.id)} className="p-2 text-[#86868B] hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all">
                                                <EditIcon className="w-4 h-4" />
                                            </Link>
                                            <button 
                                                onClick={() => { if(confirm('Delete this student?')) router.delete(route('students.destroy', student.id)) }}
                                                className="p-2 text-[#86868B] hover:text-red-600 hover:bg-red-50 rounded-xl transition-all"
                                            >
                                                <TrashIcon className="w-4 h-4" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>

                {/* Pagination */}
                <div className="px-6 py-4 bg-[#F5F5F7]/30 border-t border-[#EAEAEA] flex items-center justify-between">
                    <p className="text-[13px] font-medium text-[#86868B]">
                        Showing {students.from} to {students.to} of <span className="font-semibold text-[#1D1D1F]">{students.total}</span> students
                    </p>
                    <div className="flex items-center gap-1">
                        {students.links.map((link, idx) => (
                            <Link
                                key={idx}
                                href={link.url || ''}
                                className={`px-3 py-1.5 rounded-lg text-[13px] font-medium transition-all ${
                                    link.active 
                                    ? 'bg-primary-500 text-white shadow-sm' 
                                    : link.url ? 'text-[#515154] hover:bg-white border border-transparent hover:border-[#D2D2D7]' : 'text-[#BDBDC2] pointer-events-none'
                                }`}
                                dangerouslySetInnerHTML={{ __html: link.label }}
                            />
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
}

Index.layout = page => <AuthenticatedLayout header="Students Management">{page}</AuthenticatedLayout>;

const PlusIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>;
const SearchIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>;
const UserIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>;
const EditIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>;
const TrashIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>;
