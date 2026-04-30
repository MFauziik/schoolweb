<section>
    <header>
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-slate-500 font-medium">
            Perbarui informasi profil dan alamat email akun Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nama Lengkap" class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1" />
            <x-text-input id="name" name="name" type="text" class="w-full bg-slate-50 border-slate-200 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Alamat Email" class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1" />
            <x-text-input id="email" name="email" type="email" class="w-full bg-slate-50 border-slate-200 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 rounded-2xl bg-amber-50 border border-amber-100">
                    <p class="text-sm text-amber-800 font-medium">
                        Alamat email Anda belum diverifikasi.

                        <button form="send-verification" class="ml-2 underline text-amber-600 hover:text-amber-700 font-black">
                            Klik di sini untuk mengirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-black text-xs text-emerald-600 uppercase tracking-widest">
                            Link verifikasi baru telah dikirim ke alamat email Anda.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn-primary py-4 px-10 !rounded-2xl shadow-lg shadow-primary-500/20 font-black uppercase tracking-widest text-sm transition-all hover:scale-[1.02]">
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 font-black uppercase tracking-widest"
                >Berhasil Disimpan.</p>
            @endif
        </div>
    </form>
</section>
