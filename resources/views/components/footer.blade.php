<!-- Footer -->
<footer class="bg-gray-800 dark:bg-gray-900 text-white theme-transition">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <i class="fas fa-graduation-cap text-2xl text-primary-400 mr-3"></i>
                    <span class="text-xl font-bold">EduManage</span>
                </div>
                <p class="text-gray-300 max-w-md">
                    Sistem manajemen sekolah modern yang membantu mengelola siswa, guru, dan inventaris dengan
                    efisien.
                </p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors">Beranda</a>
                    </li>
                    <li><a href="{{ route('students.index') }}"
                            class="text-gray-300 hover:text-white transition-colors">Data Siswa</a></li>
                    <li><a href="{{ route('teachers.index') }}"
                            class="text-gray-300 hover:text-white transition-colors">Data Guru</a></li>
                    <li><a href="{{ route('inventories.index') }}"
                            class="text-gray-300 hover:text-white transition-colors">Inventory</a></li>
                    <!-- TAMBAHAN: Link Peminjaman di Footer -->
                    <li><a href="{{ route('borrowings.create') }}"
                            class="text-gray-300 hover:text-white transition-colors">Peminjaman Barang</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                <ul class="space-y-2 text-gray-300">
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-primary-400"></i>
                        info@edumanage.com
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-2 text-primary-400"></i>
                        (021) 1234-5678
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-primary-400"></i>
                        Jakarta, Indonesia
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 EduManage. All rights reserved.</p>
        </div>
    </div>
</footer>