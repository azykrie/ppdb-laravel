<div class="md:hidden p-4 bg-white shadow">
    <button id="toggleSidebar" class="text-gray-600 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>

<div id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 transform bg-white border-r border-gray-200 overflow-y-auto transition-transform duration-300 md:relative md:translate-x-0 -translate-x-full md:flex md:flex-col md:justify-between">
    <div class="px-4 py-6">
        <span class="flex items-start px-4">
            <svg class="h-8 w-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.906 59.906 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg>
        </span>

        <ul class="mt-6 space-y-1">
            <li>
                <a href="#" class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.calon-siswa.index') }}"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Calon Siswa
                </a>
            </li>
            <li>
                <a href="{{ route('admin.jurusan.index') }}"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Jurusan
                </a>
            </li>
            <li>
                <a href="#"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Jalur Pendaftaran
                </a>
            </li>
            <li>
                <a href="#"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Data Siswa
                </a>
            </li>
            <li>
                <a href="#"
                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                    Pengumuman
                </a>
            </li>
        </ul>
    </div>

    <div class="border-t border-gray-200">
        <div class="p-4">
            <a href="#" class="group block flex-shrink-0">
                <div class="flex items-center">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                            {{ auth()->user()->name }}</p>
                        <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">Lihat profil</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="border-t border-gray-200 p-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const mainContent = document.querySelector('main'); // Asumsikan konten utama Anda ada di tag <main>

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('translate-x-0');
    }

    toggleBtn.addEventListener('click', (e) => {
        e.stopPropagation(); // Mencegah event klik menyebar ke document
        toggleSidebar();
    });

    document.addEventListener('click', (e) => {
        // Cek apakah sidebar terbuka dan klik terjadi di luar sidebar dan bukan pada tombol toggle
        const isSidebarOpen = sidebar.classList.contains('translate-x-0');
        if (isSidebarOpen && !sidebar.contains(e.target)) {
            toggleSidebar();
        }
    });
</script>
