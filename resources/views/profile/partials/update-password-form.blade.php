<section>
    <header>
        <h2 class="text-2xl font-black text-slate-900 tracking-tight">
            Perbarui Kata Sandi
        </h2>

        <p class="mt-1 text-sm text-slate-500 font-medium">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Kata Sandi Saat Ini" class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="w-full bg-slate-50 border-slate-200 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Kata Sandi Baru" class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1" />
            <x-text-input id="update_password_password" name="password" type="password" class="w-full bg-slate-50 border-slate-200 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Konfirmasi Kata Sandi" class="text-xs font-black uppercase tracking-widest text-slate-400 mb-2 ml-1" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-slate-50 border-slate-200 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-primary-500/10 focus:border-primary-500 transition-all font-bold tracking-tight outline-none" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="btn-primary py-4 px-10 !rounded-2xl shadow-lg shadow-primary-500/20 font-black uppercase tracking-widest text-sm transition-all hover:scale-[1.02]">
                Simpan Kata Sandi
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 font-black uppercase tracking-widest"
                >Berhasil Diperbarui.</p>
            @endif
        </div>
    </form>
</section>
