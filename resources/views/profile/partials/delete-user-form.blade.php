<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-black text-red-600 tracking-tight">
            Hapus Akun
        </h2>

        <p class="mt-1 text-sm text-slate-500 font-medium">
            Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-50 text-red-600 border border-red-100 py-3 px-6 rounded-xl font-black uppercase tracking-widest text-xs hover:bg-red-600 hover:text-white transition-all shadow-sm"
    >Hapus Akun</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-slate-900 tracking-tight">
                Apakah Anda yakin ingin menghapus akun?
            </h2>

            <p class="mt-2 text-sm text-slate-500 font-medium">
                Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
            </p>

            <div class="mt-8">
                <x-input-label for="password" value="Kata Sandi" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full bg-slate-50 border-slate-200 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-red-500/10 focus:border-red-500 transition-all font-bold tracking-tight outline-none"
                    placeholder="Masukkan Kata Sandi"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-6 py-3 rounded-xl bg-slate-100 text-slate-600 font-black uppercase tracking-widest text-xs hover:bg-slate-200 transition-all">
                    Batal
                </button>

                <button type="submit" class="px-6 py-3 rounded-xl bg-red-600 text-white font-black uppercase tracking-widest text-xs hover:bg-red-700 transition-all shadow-lg shadow-red-500/20">
                    Hapus Akun Secara Permanen
                </button>
            </div>
        </form>
    </x-modal>
</section>
