<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Aplikasi Laravel')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>

<body class="bg-gray-50 font-sans text-gray-900 antialiased">
    
    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="md:flex md:items-center md:gap-12">
                    <a class="block text-teal-600" href="{{ url('/') }}">
                        <span class="sr-only">Home</span>
                        <svg class="h-8 w-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.906 59.906 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </a>
                </div>

                {{-- NAVIGASI UNTUK DESKTOP (md ke atas) --}}
                <div class="hidden md:block">
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Beranda </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Pendaftaran </a>
                            </li>
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Pengumuman </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow transition hover:bg-teal-700" href="{{ route('login.index') }}">
                            Login
                        </a>
                        <div class="hidden sm:flex">
                            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:bg-gray-200" href="{{ route('register.index') }}">
                                Register
                            </a>
                        </div>
                    </div>

                    {{-- TOMBOL BURGER UNTUK MOBILE --}}
                    <div class="block md:hidden">
                        {{-- Memberikan ID agar bisa dipilih oleh JavaScript --}}
                        <button id="burger-button" class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- MENU DROPDOWN UNTUK MOBILE --}}
            {{-- Memberikan ID dan class 'hidden' secara default --}}
            <nav id="mobile-menu" class="hidden md:hidden border-t border-gray-100">
                <ul class="flex flex-col items-center gap-2 py-4 text-sm">
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75 w-full text-center block py-2" href="#"> Beranda </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75 w-full text-center block py-2" href="#"> Pendaftaran </a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75 w-full text-center block py-2" href="#"> Pengumuman </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="py-12">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 pb-8 sm:px-6 lg:px-8">
            <div class="border-t border-gray-100 pt-8">
                <p class="text-center text-xs/relaxed text-gray-500">
                    © {{ date('Y') }}. Nama Sekolah Anda. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    @stack('scripts')

    {{-- Script untuk meng-handle klik tombol burger --}}
    <script>
        // Pilih elemen tombol dan menu berdasarkan ID yang sudah kita buat
        const burgerButton = document.getElementById('burger-button');
        const mobileMenu = document.getElementById('mobile-menu');

        // Tambahkan 'event listener' untuk mendengarkan event 'click' pada tombol
        burgerButton.addEventListener('click', () => {
            // Toggle (tambah/hapus) class 'hidden' pada elemen menu
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>