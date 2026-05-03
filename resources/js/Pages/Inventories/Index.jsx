import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';
import { useState, useEffect, useRef } from 'react';

export default function Index({ inventories, kategoris, filters }) {
    const [search, setSearch] = useState(filters.search || '');
    const isFirstRender = useRef(true);

    useEffect(() => {
        if (isFirstRender.current) {
            isFirstRender.current = false;
            return;
        }
        const delayDebounceFn = setTimeout(() => {
            router.get(route('inventories.index'), { search, kategori: filters.kategori, status: filters.status }, { preserveState: true, replace: true });
        }, 300);

        return () => clearTimeout(delayDebounceFn);
    }, [search]);

    const handleSearch = (e) => {
        e.preventDefault();
    };

    return (
        <AuthenticatedLayout header="Inventory Management">
            <Head title="Inventories" />

            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 className="text-2xl font-semibold text-[#1D1D1F] tracking-tight">School Inventory</h2>
                    <p className="text-[#6E6E73] text-[15px] mt-1 tracking-tight">Track and manage school assets and equipment.</p>
                </div>
                <Link href={route('inventories.create')} className="btn-primary">
                    <PlusIcon className="w-5 h-5 mr-2" />
                    New Item
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
                        placeholder="Search by item name or code..."
                        className="form-input pl-11 bg-white"
                    />
                </form>
                <div className="flex gap-4 w-full md:w-auto">
                    <select 
                        className="form-select min-w-[160px] bg-white text-[#1D1D1F]"
                        value={filters.kategori || ''}
                        onChange={(e) => router.get(route('inventories.index'), { ...filters, kategori: e.target.value })}
                    >
                        <option value="">All Categories</option>
                        {kategoris.map((k) => (
                            <option key={k} value={k}>{k}</option>
                        ))}
                    </select>
                </div>
            </div>

            {/* Table */}
            <div className="glass-card overflow-hidden">
                <div className="overflow-x-auto">
                    <table className="w-full text-left border-collapse">
                        <thead>
                            <tr className="border-b border-[#EAEAEA] bg-[#F5F5F7]/50">
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Item Name</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Code</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Category</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Location</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Status</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-[#EAEAEA]">
                            {inventories.data.map((item) => (
                                <tr key={item.id} className="hover:bg-[#F5F5F7]/40 transition-colors group">
                                    <td className="px-6 py-4">
                                        <div className="flex items-center gap-4">
                                            <div className="w-10 h-10 rounded-full bg-violet-50 flex items-center justify-center text-violet-600 shrink-0 border border-violet-100/50">
                                                <BoxIcon className="w-5 h-5" />
                                            </div>
                                            <p className="text-[15px] font-semibold text-[#1D1D1F] truncate group-hover:text-primary-600 transition-colors">{item.nama_barang}</p>
                                        </div>
                                    </td>
                                    <td className="px-6 py-4 text-[15px] text-[#1D1D1F]">{item.kode_barang}</td>
                                    <td className="px-6 py-4">
                                        <span className="px-3 py-1 bg-white border border-[#D2D2D7] text-[#515154] rounded-full text-[12px] font-medium shadow-sm block w-max">
                                            {item.kategori}
                                        </span>
                                    </td>
                                    <td className="px-6 py-4 text-[15px] text-[#1D1D1F]">{item.lokasi_barang}</td>
                                    <td className="px-6 py-4">
                                        <div className={`inline-flex items-center gap-2 px-3 py-1 rounded-full border text-[13px] font-medium ${
                                            item.status === 'Tersedia' ? 'bg-emerald-50 text-emerald-700 border-emerald-100' :
                                            item.status === 'Dipinjam' ? 'bg-blue-50 text-blue-700 border-blue-100' :
                                            'bg-red-50 text-red-700 border-red-100'
                                        }`}>
                                            <span className={`w-2 h-2 rounded-full ${
                                                item.status === 'Tersedia' ? 'bg-emerald-500' :
                                                item.status === 'Dipinjam' ? 'bg-blue-500' :
                                                'bg-red-500'
                                            }`}></span>
                                            {item.status}
                                        </div>
                                    </td>
                                    <td className="px-6 py-4 text-right">
                                        <div className="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <Link href={route('inventories.edit', item.id)} className="p-2 text-[#86868B] hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all">
                                                <EditIcon className="w-4 h-4" />
                                            </Link>
                                            <button 
                                                onClick={() => { if(confirm('Delete this item?')) router.delete(route('inventories.destroy', item.id)) }}
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
                        Showing {inventories.from} to {inventories.to} of <span className="font-semibold text-[#1D1D1F]">{inventories.total}</span> items
                    </p>
                    <div className="flex items-center gap-1">
                        {inventories.links.map((link, idx) => (
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
        </AuthenticatedLayout>
    );
}

const PlusIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>;
const SearchIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>;
const BoxIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>;
const EditIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>;
const TrashIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>;
