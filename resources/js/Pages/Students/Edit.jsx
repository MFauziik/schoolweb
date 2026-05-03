import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm, router } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TextInput from '@/Components/TextInput';
import InputLabel from '@/Components/InputLabel';
import InputError from '@/Components/InputError';

export default function Edit({ student }) {
    const { data, setData, post, processing, errors } = useForm({
        _method: 'PUT',
        nama: student.nama || '',
        nisn: student.nisn || '',
        kelas: student.kelas || '',
        jurusan: student.jurusan || '',
        tanggal_lahir: student.tanggal_lahir || '',
        angkatan: student.angkatan || '',
        is_active: student.is_active || false,
        foto: null,
    });

    const submit = (e) => {
        e.preventDefault();
        // Since we are uploading file, we use POST with _method PUT
        router.post(route('students.update', student.id), {
            ...data,
            _method: 'PUT'
        });
    };

    return (
        <>
            <Head title="Edit Student" />

            <div className="max-w-2xl mx-auto">
                <div className="flex items-center gap-4 mb-10">
                    <Link href={route('students.index')} className="p-2 text-slate-400 hover:text-slate-600 bg-white border border-slate-200 rounded-xl transition-all">
                        <ArrowLeftIcon className="w-5 h-5" />
                    </Link>
                    <div>
                        <h2 className="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Student</h2>
                        <p className="text-slate-500 font-medium">Update information for {student.nama}.</p>
                    </div>
                </div>

                <form onSubmit={submit} className="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm space-y-8">
                    {/* Current Photo */}
                    <div className="flex items-center gap-6 p-6 bg-slate-50 rounded-3xl border border-slate-100">
                        <div className="w-20 h-20 rounded-2xl bg-white border border-slate-200 overflow-hidden shrink-0">
                            {student.foto ? (
                                <img src={`/storage/${student.foto}`} alt="" className="w-full h-full object-cover" />
                            ) : (
                                <div className="w-full h-full flex items-center justify-center text-slate-300">
                                    <UserIcon className="w-8 h-8" />
                                </div>
                            )}
                        </div>
                        <div>
                            <p className="text-sm font-bold text-slate-800">Current Photo</p>
                            <p className="text-xs text-slate-500">Will be replaced if a new file is chosen.</p>
                        </div>
                    </div>

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
                                <InputLabel htmlFor="nisn" value="NISN" />
                                <TextInput
                                    id="nisn"
                                    value={data.nisn}
                                    onChange={(e) => setData('nisn', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.nisn} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="kelas" value="Class" />
                                <TextInput
                                    id="kelas"
                                    value={data.kelas}
                                    onChange={(e) => setData('kelas', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.kelas} className="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel htmlFor="jurusan" value="Jurusan" />
                            <select
                                id="jurusan"
                                value={data.jurusan}
                                onChange={(e) => setData('jurusan', e.target.value)}
                                className="mt-1 block w-full border-slate-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm"
                                required
                            >
                                <option value="">Select Jurusan</option>
                                <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                                <option value="Teknik Otomotif">Teknik Otomotif</option>
                                <option value="Teknik Pengelasan dan Fabrikasi Logam">Teknik Pengelasan dan Fabrikasi Logam</option>
                                <option value="Broadcasting dan Film">Broadcasting dan Film</option>
                                <option value="Animasi">Animasi</option>
                            </select>
                            <InputError message={errors.jurusan} className="mt-2" />
                        </div>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <InputLabel htmlFor="tanggal_lahir" value="Birth Date" />
                                <TextInput
                                    id="tanggal_lahir"
                                    type="date"
                                    value={data.tanggal_lahir}
                                    onChange={(e) => setData('tanggal_lahir', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.tanggal_lahir} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="angkatan" value="Batch (Angkatan)" />
                                <TextInput
                                    id="angkatan"
                                    type="number"
                                    value={data.angkatan}
                                    onChange={(e) => setData('angkatan', e.target.value)}
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError message={errors.angkatan} className="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel value="Change Student Photo" />
                            <input
                                type="file"
                                onChange={(e) => setData('foto', e.target.files[0])}
                                className="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-all"
                            />
                            <InputError message={errors.foto} className="mt-2" />
                        </div>

                        <div className="flex items-center">
                            <label className="flex items-center cursor-pointer group">
                                <input
                                    type="checkbox"
                                    checked={data.is_active}
                                    onChange={(e) => setData('is_active', e.target.checked)}
                                    className="rounded-lg border-slate-300 text-primary-600 shadow-sm focus:ring-primary-500"
                                />
                                <span className="ms-3 text-sm font-bold text-slate-700 group-hover:text-primary-600 transition-colors">Active Student</span>
                            </label>
                        </div>
                    </div>

                    <div className="flex items-center justify-end gap-4 pt-6 border-t border-slate-50">
                        <Link href={route('students.index')}>
                            <SecondaryButton>Cancel</SecondaryButton>
                        </Link>
                        <PrimaryButton disabled={processing}>
                            Update Student
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </>
    );
}

Edit.layout = page => <AuthenticatedLayout header="Edit Student">{page}</AuthenticatedLayout>;

const ArrowLeftIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>;
const UserIcon = (props) => <svg {...props} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>;
