@extends('layouts.guest')

@section('title', 'PPDB Online - Sekolah Impian Anda')

@section('content')
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-teal-100/20 to-blue-100/20 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    Selamat Datang di Penerimaan Peserta Didik Baru Online
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Gerbang menuju pendidikan berkualitas. Daftar sekarang dan raih masa depan gemilang bersama kami!
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href=""
                        class="rounded-md bg-teal-600 px-8 py-3.5 text-base font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-teal-600">
                        Daftar Sekarang
                    </a>
                    <a href="#" class="text-base font-semibold leading-7 text-gray-900">
                        Pelajari Lebih Lanjut <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 99.1%, 77.5% 85.1%, 23.3% 39.7%)">
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Informasi Penting PPDB
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Pastikan Anda membaca informasi berikut sebelum melakukan pendaftaran.
                </p>
            </div>
            <dl class="mt-10 grid grid-cols-1 gap-x-8 gap-y-16 lg:grid-cols-3">
                <div class="mx-auto max-w-xs lg:mx-0">
                    <dt class="text-base font-semibold leading-7 text-teal-600">
                        <svg class="mb-2 h-6 w-6 text-teal-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 006 3.012m0 8.043a8.967 8.967 0 016 3.012m6.757-12.057a8.967 8.967 0 011.232 17.346m-6.757-12.057a8.967 8.967 0 00-1.232 17.346m-1.79 8.054a9.02 9.02 0 01-.874-16.762m9.185 8.054a9.02 9.02 0 00.874-16.762" />
                        </svg>
                        Jalur Pendaftaran
                    </dt>
                    <dd class="mt-1 text-base leading-7 text-gray-600">
                        Informasi mengenai berbagai jalur pendaftaran yang tersedia (misalnya, jalur prestasi, jalur zonasi, dll.).
                    </dd>
                </div>
                <div class="mx-auto max-w-xs lg:mx-0">
                    <dt class="text-base font-semibold leading-7 text-teal-600">
                        <svg class="mb-2 h-6 w-6 text-teal-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 21h18M3 3h18m0 0v2.25M3 5.25v13.5A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V5.25M3 10.5h18" />
                        </svg>
                        Jadwal Penting
                    </dt>
                    <dd class="mt-1 text-base leading-7 text-gray-600">
                        Kalender penting yang berisi tanggal-tanggal pembukaan, penutupan pendaftaran, pengumuman, dan daftar ulang.
                    </dd>
                </div>
                <div class="mx-auto max-w-xs lg:mx-0">
                    <dt class="text-base font-semibold leading-7 text-teal-600">
                        <svg class="mb-2 h-6 w-6 text-teal-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a3 3 0 00-3-3H7.5a3 3 0 00-3 3v13.5a3 3 0 003 3h9a3 3 0 003-3V10.5M9 11.25h.008v.008H9v-.008zm0 3.75h.008v.008H9v-.008zm3 1.5h.008v.008H12v-.008zm0-3.75h.008v.008H12v-.008zm3 1.5h.008v.008H15v-.008zm0-3.75h.008v.008H15v-.008z" />
                        </svg>
                        Persyaratan Pendaftaran
                    </dt>
                    <dd class="mt-1 text-base leading-7 text-gray-600">
                        Daftar lengkap dokumen dan persyaratan yang dibutuhkan untuk mendaftar sebagai calon siswa.
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Alur Pendaftaran Online
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Ikuti langkah-langkah mudah berikut untuk mendaftar secara online.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="relative overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Langkah 1: Membuat Akun</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Calon siswa membuat akun baru melalui tombol "Daftar Sekarang".
                        </p>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-0.5 text-xs font-medium text-teal-800">1</span>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Langkah 2: Mengisi Formulir</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Login dan lengkapi formulir pendaftaran dengan data diri yang benar.
                        </p>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-0.5 text-xs font-medium text-teal-800">2</span>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Langkah 3: Unggah Berkas</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Unggah semua berkas persyaratan yang dibutuhkan sesuai dengan format yang ditentukan.
                        </p>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-0.5 text-xs font-medium text-teal-800">3</span>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Langkah 4: Verifikasi Data</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Admin akan melakukan verifikasi data dan berkas yang telah Anda unggah.
                        </p>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-0.5 text-xs font-medium text-teal-800">4</span>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Langkah 5: Pengumuman</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Pantau terus website untuk melihat pengumuman hasil seleksi.
                        </p>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-0.5 text-xs font-medium text-teal-800">5</span>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Langkah 6: Daftar Ulang</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Jika dinyatakan lulus, segera lakukan daftar ulang sesuai dengan jadwal yang ditentukan.
                        </p>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-0.5 text-xs font-medium text-teal-800">6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-xl text-center">
                <h2 class="text-lg font-semibold leading-8 text-teal-600">Testimoni</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Apa Kata Mereka?
                </p>
                <p class="mt-4 text-lg leading-8 text-gray-600">
                    Beberapa kesan positif dari alumni dan siswa kami.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 gap-y-10 sm:grid-cols-2 md:grid-cols-3">
                <div class="rounded-lg bg-gray-100 p-8">
                    <blockquote class="mt-4 text-center text-gray-600">
                        <p class="text-sm italic">"Lingkungan belajar yang kondusif dan guru-guru yang sangat mendukung membuat saya berkembang pesat."</p>
                    </blockquote>
                    <div class="mt-6 flex items-center justify-center gap-x-4">
                        <img class="h-8 w-8 rounded-full bg-gray-50" src="https://via.placeholder.com/48" alt="">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">Alumni A</p>
                            <p class="text-gray-600">Tahun Lulus 2022</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg bg-gray-100 p-8">
                    <blockquote class="mt-4 text-center text-gray-600">
                        <p class="text-sm italic">"Fasilitas lengkap dan kegiatan ekstrakurikuler yang beragam sangat mendukung minat dan bakat siswa."</p>
                    </blockquote>
                    <div class="mt-6 flex items-center justify-center gap-x-4">
                        <img class="h-8 w-8 rounded-full bg-gray-50" src="https://via.placeholder.com/48" alt="">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">Siswa B</p>
                            <p class="text-gray-600">Kelas XII RPL</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg bg-gray-100 p-8">
                    <blockquote class="mt-4 text-center text-gray-600">
                        <p class="text-sm italic">"Proses pendaftaran online sangat mudah dan informatif. Saya terbantu dengan semua panduan yang diberikan."</p>
                    </blockquote>
                    <div class="mt-6 flex items-center justify-center gap-x-4">
                        <img class="h-8 w-8 rounded-full bg-gray-50" src="https://via.placeholder.com/48" alt="">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">Calon Siswa C</p>
                            <p class="text-gray-600">Pendaftar 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection