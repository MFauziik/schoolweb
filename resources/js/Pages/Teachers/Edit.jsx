import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TextInput from '@/Components/TextInput';
import InputLabel from '@/Components/InputLabel';
import InputError from '@/Components/InputError';

export default function Edit({ teacher }) {
    const { data, setData, put, processing, errors } = useForm({
        nama: teacher.nama || '',
        nip: teacher.nip || '',
        jabatan: teacher.jabatan || '',
        email: teacher.email || '',
        no_hp: teacher.no_hp || '',
        alamat: teacher.alamat || '',
        is_active: teacher.is_active || false,
    });

    const submit = (e) => {
        e.preventDefault();
        put(route('teachers.update', teacher.id));
    };

    return (
        <>
            <Head title="Edit Teacher" />

            <div className="max-w-2xl mx-auto">
                <div className="flex items-center gap-4 mb-10">
                    <Link href={route('teachers.index')} className="p-2 text-slate-400 hover:text-slate-600 bg-white border border-slate-200 rounded-xl transition-all">
                        <ArrowLeftIcon className="w-5 h-5" />
                    </Link>
                    <div>
                        <h2 className="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Teacher</h2>
                        <p className="text-slate-500 font-medium">Update details for {teacher.nama}.</p>
                    </div>
                </div>

                <form onSubmit={submit} className="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm space-y-8">
                    <div className="space-y-6">
                        <div>
                            <InputLabel htmlFor="nama" value="Full Name" />
                            <TextInput
                                id="nama"
                                value={data.nama}
                                onChange={(e) => setData('nama', e.target.value)}
                                className="mt-1 block w-full"
                                required
                            />
                            <InputError message={errors.nama} className="mt-2" />
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <InputLabel htmlFor="nip" value="NIP" />
                                <TextInput
                                    id="nip"
                                    value={data.nip}
                                    onChange={(e) => setData('nip', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.nip} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="jabatan" value="Position" />
                                <TextInput
                                    id="jabatan"
                                    value={data.jabatan}
                                    onChange={(e) => setData('jabatan', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.jabatan} className="mt-2" />
                            </div>
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <InputLabel htmlFor="email" value="Email Address" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.email} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="no_hp" value="Phone Number" />
                                <TextInput
                                    id="no_hp"
                                    value={data.no_hp}
                                    onChange={(e) => setData('no_hp', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.no_hp} className="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel htmlFor="alamat" value="Address" />
                            <textarea
                                id="alamat"
                                value={data.alamat}
                                onChange={(e) => setData('alamat', e.target.value)}
                                className="mt-1 block w-full border-slate-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm text-sm"
                                rows="3"
                                required
                            ></textarea>
                            <InputError message={errors.alamat} className="mt-2" />
                        </div>

                        <div className="flex items-center">
                            <label className="flex items-center cursor-pointer group">
                                <input
                                    type="checkbox"
                                    checked={data.is_active}
                                    onChange={(e) => setData('is_active', e.target.checked)}
                                    className="rounded-lg border-slate-300 text-primary-600 shadow-sm focus:ring-primary-500"
                                />
                                <span className="ms-3 text-sm font-bold text-slate-700 group-hover:text-primary-600 transition-colors">Active Member</span>
                            </label>
                        </div>
                    </div>

                    <div className="flex items-center justify-end gap-4 pt-6 border-t border-slate-50">
                        <Link href={route('teachers.index')}>
                            <SecondaryButton>Cancel</SecondaryButton>
                        </Link>
                        <PrimaryButton disabled={processing}>
                            Update Teacher
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </>
    );
}

Edit.layout = page => <AuthenticatedLayout header="Edit Teacher">{page}</AuthenticatedLayout>;

const ArrowLeftIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>;
