import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TextInput from '@/Components/TextInput';
import InputLabel from '@/Components/InputLabel';
import InputError from '@/Components/InputError';

export default function Create({ availableItems }) {
    const { data, setData, post, processing, errors } = useForm({
        inventory_id: '',
        peminjam_nama: '',
        peminjam_kelas: '',
        keperluan: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('borrowings.store'));
    };

    return (
        <AuthenticatedLayout
            header="Log New Borrowing"
        >
            <Head title="Create Borrowing" />

            <div className="max-w-2xl mx-auto">
                <div className="flex items-center gap-4 mb-10">
                    <Link href={route('borrowings.index')} className="p-2 text-slate-400 hover:text-slate-600 bg-white border border-slate-200 rounded-xl transition-all">
                        <ArrowLeftIcon className="w-5 h-5" />
                    </Link>
                    <div>
                        <h2 className="text-3xl font-extrabold text-slate-900 tracking-tight">Borrow Asset</h2>
                        <p className="text-slate-500 font-medium">Assign a school asset to a student or staff member.</p>
                    </div>
                </div>

                <form onSubmit={submit} className="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm space-y-8">
                    <div className="space-y-6">
                        <div>
                            <InputLabel htmlFor="inventory_id" value="Select Asset" />
                            <select
                                id="inventory_id"
                                value={data.inventory_id}
                                onChange={(e) => setData('inventory_id', e.target.value)}
                                className="mt-1 block w-full border-slate-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm text-sm"
                                required
                            >
                                <option value="">Choose an available item...</option>
                                {availableItems.map((item) => (
                                    <option key={item.id} value={item.id}>
                                        {item.kode_barang} - {item.nama_barang} ({item.lokasi_barang})
                                    </option>
                                ))}
                            </select>
                            <InputError message={errors.inventory_id} className="mt-2" />
                            {availableItems.length === 0 && (
                                <p className="text-xs text-amber-600 mt-2 font-medium">No items currently available for borrowing.</p>
                            )}
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <InputLabel htmlFor="peminjam_nama" value="Borrower Name" />
                                <TextInput
                                    id="peminjam_nama"
                                    value={data.peminjam_nama}
                                    onChange={(e) => setData('peminjam_nama', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                    placeholder="e.g. John Doe"
                                />
                                <InputError message={errors.peminjam_nama} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="peminjam_kelas" value="Borrower Class / Position" />
                                <TextInput
                                    id="peminjam_kelas"
                                    value={data.peminjam_kelas}
                                    onChange={(e) => setData('peminjam_kelas', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                    placeholder="e.g. XII PPLG 1"
                                />
                                <InputError message={errors.peminjam_kelas} className="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel htmlFor="keperluan" value="Purpose of Borrowing" />
                            <textarea
                                id="keperluan"
                                value={data.keperluan}
                                onChange={(e) => setData('keperluan', e.target.value)}
                                className="mt-1 block w-full border-slate-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm text-sm"
                                rows="3"
                                required
                                placeholder="State the reason for borrowing this item..."
                            ></textarea>
                            <InputError message={errors.keperluan} className="mt-2" />
                        </div>
                    </div>

                    <div className="flex items-center justify-end gap-4 pt-6 border-t border-slate-100">
                        <Link href={route('borrowings.index')}>
                            <SecondaryButton>Cancel</SecondaryButton>
                        </Link>
                        <PrimaryButton disabled={processing || availableItems.length === 0}>
                            Complete Log
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}

const ArrowLeftIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>;
