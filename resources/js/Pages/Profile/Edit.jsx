import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, usePage } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import InputLabel from '@/Components/InputLabel';
import InputError from '@/Components/InputError';

export default function Edit({ mustVerifyEmail, status }) {
    const user = usePage().props.auth.user;

    return (
        <>
            <Head title="Profile" />

            <div className="max-w-4xl mx-auto space-y-10">
                <div className="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h2 className="text-2xl font-extrabold text-slate-900 mb-2">Profile Information</h2>
                    <p className="text-slate-500 mb-8 font-medium">Update your account's profile information and email address.</p>
                    
                    <UpdateProfileInformation user={user} mustVerifyEmail={mustVerifyEmail} status={status} />
                </div>

                <div className="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h2 className="text-2xl font-extrabold text-slate-900 mb-2">Update Password</h2>
                    <p className="text-slate-500 mb-8 font-medium">Ensure your account is using a long, random password to stay secure.</p>
                    
                    <UpdatePassword />
                </div>
            </div>
        </>
    );
}

Edit.layout = page => <AuthenticatedLayout header="Profile">{page}</AuthenticatedLayout>;

function UpdateProfileInformation({ user, mustVerifyEmail, status }) {
    const { data, setData, patch, errors, processing, recentlySuccessful } = useForm({
        name: user.name,
        email: user.email,
    });

    const submit = (e) => {
        e.preventDefault();
        patch(route('profile.update'));
    };

    return (
        <form onSubmit={submit} className="max-w-xl space-y-6">
            <div>
                <InputLabel htmlFor="name" value="Name" />
                <TextInput
                    id="name"
                    className="mt-1 block w-full"
                    value={data.name}
                    onChange={(e) => setData('name', e.target.value)}
                    required
                    isFocused
                    autoComplete="name"
                />
                <InputError className="mt-2" message={errors.name} />
            </div>

            <div>
                <InputLabel htmlFor="email" value="Email" />
                <TextInput
                    id="email"
                    type="email"
                    className="mt-1 block w-full"
                    value={data.email}
                    onChange={(e) => setData('email', e.target.value)}
                    required
                    autoComplete="username"
                />
                <InputError className="mt-2" message={errors.email} />
            </div>

            <div className="flex items-center gap-4 pt-4 border-t border-slate-50">
                <PrimaryButton disabled={processing}>Save Changes</PrimaryButton>
                {recentlySuccessful && (
                    <p className="text-sm font-bold text-emerald-600">Saved successfully!</p>
                )}
            </div>
        </form>
    );
}

function UpdatePassword() {
    const { data, setData, put, errors, reset, processing, recentlySuccessful } = useForm({
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();
        put(route('password.update'), {
            preserveScroll: true,
            onSuccess: () => reset(),
        });
    };

    return (
        <form onSubmit={submit} className="max-w-xl space-y-6">
            <div>
                <InputLabel htmlFor="current_password" value="Current Password" />
                <TextInput
                    id="current_password"
                    type="password"
                    className="mt-1 block w-full"
                    value={data.current_password}
                    onChange={(e) => setData('current_password', e.target.value)}
                    autoComplete="current-password"
                />
                <InputError message={errors.current_password} className="mt-2" />
            </div>

            <div>
                <InputLabel htmlFor="password" value="New Password" />
                <TextInput
                    id="password"
                    type="password"
                    className="mt-1 block w-full"
                    value={data.password}
                    onChange={(e) => setData('password', e.target.value)}
                    autoComplete="new-password"
                />
                <InputError message={errors.password} className="mt-2" />
            </div>

            <div>
                <InputLabel htmlFor="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    type="password"
                    className="mt-1 block w-full"
                    value={data.password_confirmation}
                    onChange={(e) => setData('password_confirmation', e.target.value)}
                    autoComplete="new-password"
                />
                <InputError message={errors.password_confirmation} className="mt-2" />
            </div>

            <div className="flex items-center gap-4 pt-4 border-t border-slate-50">
                <PrimaryButton disabled={processing}>Update Password</PrimaryButton>
                {recentlySuccessful && (
                    <p className="text-sm font-bold text-emerald-600">Password updated!</p>
                )}
            </div>
        </form>
    );
}
