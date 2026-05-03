import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';

export default function Index({ borrowings }) {
    const handleReturn = (id) => {
        if (confirm('Mark this item as returned?')) {
            router.post(route('borrowings.return', id));
        }
    };

    return (
        <>
            <Head title="Borrowings" />

            <div className="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 className="text-2xl font-semibold text-[#1D1D1F] tracking-tight">Active Borrowings</h2>
                    <p className="text-[#6E6E73] text-[15px] mt-1 tracking-tight">Monitor school assets currently in use by staff or students.</p>
                </div>
                <Link href={route('borrowings.create')} className="btn-primary">
                    <PlusIcon className="w-5 h-5 mr-2" />
                    Log New
                </Link>
            </div>

            {/* Table */}
            <div className="glass-card overflow-hidden">
                <div className="overflow-x-auto">
                    <table className="w-full text-left border-collapse">
                        <thead>
                            <tr className="border-b border-[#EAEAEA] bg-[#F5F5F7]/50">
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Item</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Borrower</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Date</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap">Status</th>
                                <th className="px-6 py-4 text-[13px] font-semibold text-[#6E6E73] tracking-tight whitespace-nowrap text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-[#EAEAEA]">
                            {borrowings.data.map((borrow) => (
                                <tr key={borrow.id} className="hover:bg-[#F5F5F7]/40 transition-colors group">
                                    <td className="px-6 py-4">
                                        <div className="flex items-center gap-4">
                                            <div className="w-10 h-10 rounded-full bg-pink-50 flex items-center justify-center text-pink-600 shrink-0 border border-pink-100/50">
                                                <BoxIcon className="w-5 h-5" />
                                            </div>
                                            <div className="min-w-0">
                                                <p className="text-[15px] font-semibold text-[#1D1D1F] truncate leading-tight group-hover:text-primary-600 transition-colors">{borrow.inventory.nama_barang}</p>
                                                <p className="text-[13px] text-[#86868B]">{borrow.inventory.kode_barang}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td className="px-6 py-4">
                                        <p className="text-[15px] font-semibold text-[#1D1D1F] leading-tight">{borrow.peminjam_nama}</p>
                                        <p className="text-[13px] text-[#86868B] mt-0.5">{borrow.peminjam_kelas}</p>
                                    </td>
                                    <td className="px-6 py-4 text-[15px] text-[#1D1D1F]">
                                        {new Date(borrow.created_at).toLocaleDateString()}
                                    </td>
                                    <td className="px-6 py-4">
                                        <span className={`px-3 py-1 rounded-full text-[12px] font-medium border ${
                                            borrow.status_peminjaman === 'dipinjam' 
                                            ? 'bg-amber-50 text-amber-700 border-amber-100' 
                                            : 'bg-emerald-50 text-emerald-700 border-emerald-100'
                                        }`}>
                                            {borrow.status_peminjaman === 'dipinjam' ? 'In Use' : 'Returned'}
                                        </span>
                                    </td>
                                    <td className="px-6 py-4 text-right">
                                        {borrow.status_peminjaman === 'dipinjam' ? (
                                            <button 
                                                onClick={() => handleReturn(borrow.id)}
                                                className="px-4 py-2 bg-emerald-500 text-white rounded-xl text-[13px] font-semibold hover:bg-emerald-600 transition-colors shadow-sm"
                                            >
                                                Mark Returned
                                            </button>
                                        ) : (
                                            <span className="text-[13px] font-semibold text-[#86868B] px-4 py-2">Completed</span>
                                        )}
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>

                {/* Pagination */}
                <div className="px-6 py-4 bg-[#F5F5F7]/30 border-t border-[#EAEAEA] flex items-center justify-between">
                    <p className="text-[13px] font-medium text-[#86868B]">
                        Showing {borrowings.from} to {borrowings.to} of <span className="font-semibold text-[#1D1D1F]">{borrowings.total}</span> records
                    </p>
                    <div className="flex items-center gap-1">
                        {borrowings.links.map((link, idx) => (
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

Index.layout = page => <AuthenticatedLayout header="Borrowings Management">{page}</AuthenticatedLayout>;

const PlusIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>;
const BoxIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>;
