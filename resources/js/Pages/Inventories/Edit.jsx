import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TextInput from '@/Components/TextInput';
import InputLabel from '@/Components/InputLabel';
import InputError from '@/Components/InputError';

export default function Edit({ inventory }) {
    const { data, setData, put, processing, errors } = useForm({
        kode_barang: inventory.kode_barang || '',
        nama_barang: inventory.nama_barang || '',
        kategori: inventory.kategori || '',
        status: inventory.status || '',
        lokasi_barang: inventory.lokasi_barang || '',
        is_active: inventory.is_active || false,
    });

    const submit = (e) => {
        e.preventDefault();
        put(route('inventories.update', inventory.id));
    };

    return (
        <>
            <Head title="Edit Inventory" />

            <div className="max-w-2xl mx-auto">
                <div className="flex items-center gap-4 mb-10">
                    <Link href={route('inventories.index')} className="p-2 text-slate-400 hover:text-slate-600 bg-white border border-slate-200 rounded-xl transition-all">
                        <ArrowLeftIcon className="w-5 h-5" />
                    </Link>
                    <div>
                        <h2 className="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Asset</h2>
                        <p className="text-slate-500 font-medium">Update details for {inventory.nama_barang}.</p>
                    </div>
                </div>

                <form onSubmit={submit} className="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm space-y-8">
                    <div className="space-y-6">
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div className="md:col-span-1">
                                <InputLabel htmlFor="kode_barang" value="Item Code" />
                                <TextInput
                                    id="kode_barang"
                                    value={data.kode_barang}
                                    onChange={(e) => setData('kode_barang', e.target.value)}
                                    className="mt-1 block w-full uppercase"
                                    required
                                />
                                <InputError message={errors.kode_barang} className="mt-2" />
                            </div>
                            <div className="md:col-span-2">
                                <InputLabel htmlFor="nama_barang" value="Item Name" />
                                <TextInput
                                    id="nama_barang"
                                    value={data.nama_barang}
                                    onChange={(e) => setData('nama_barang', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.nama_barang} className="mt-2" />
                            </div>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <InputLabel htmlFor="kategori" value="Category" />
                                <TextInput
                                    id="kategori"
                                    value={data.kategori}
                                    onChange={(e) => setData('kategori', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.kategori} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="status" value="Status" />
                                <select
                                    id="status"
                                    value={data.status}
                                    onChange={(e) => setData('status', e.target.value)}
                                    className="mt-1 block w-full border-slate-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm"
                                    required
                                >
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                    <option value="Dalam Perbaikan">Dalam Perbaikan</option>
                                </select>
                                <InputError message={errors.status} className="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel htmlFor="lokasi_barang" value="Storage Location" />
                            <TextInput
                                id="lokasi_barang"
                                value={data.lokasi_barang}
                                onChange={(e) => setData('lokasi_barang', e.target.value)}
                                className="mt-1 block w-full"
                                required
                            />
                            <InputError message={errors.lokasi_barang} className="mt-2" />
                        </div>

                        <div className="flex items-center">
                            <label className="flex items-center cursor-pointer group">
                                <input
                                    type="checkbox"
                                    checked={data.is_active}
                                    onChange={(e) => setData('is_active', e.target.checked)}
                                    className="rounded-lg border-slate-300 text-primary-600 shadow-sm focus:ring-primary-500"
                                />
                                <span className="ms-3 text-sm font-bold text-slate-700 group-hover:text-primary-600 transition-colors">Visible in Inventory</span>
                            </label>
                        </div>
                    </div>

                    <div className="flex items-center justify-end gap-4 pt-6 border-t border-slate-50">
                        <Link href={route('inventories.index')}>
                            <SecondaryButton>Cancel</SecondaryButton>
                        </Link>
                        <PrimaryButton disabled={processing}>
                            Update Asset
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </>
    );
}

Edit.layout = page => <AuthenticatedLayout header="Edit Item">{page}</AuthenticatedLayout>;

const ArrowLeftIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>;
