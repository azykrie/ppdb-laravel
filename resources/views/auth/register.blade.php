@extends('layouts.login')
@section('title', 'Register')
@section('content')
    <section class="bg-gray-100">
        <div class="max-w-screen-xl mx-auto flex items-center justify-center min-h-screen px-4">
            <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 space-y-6">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h2>
                    <p class="mt-1 text-sm text-gray-500">Silakan isi data untuk membuat akun</p>
                </div>

                @if ($errors->any())
                    <div class="text-sm text-red-600">
                        <ul class="list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required autofocus
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-200 text-sm font-semibold">
                        Daftar
                    </button>
                </form>

                <p class="text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login.index') }}" class="text-indigo-600 hover:underline">Masuk</a>
                </p>
                <p class="text-center text-sm text-gray-600">
                    Kembali ke Halaman Utama?
                    <a href="{{ route('portal-pendaftaran.index') }}" class="text-indigo-600 hover:underline">Beranda</a>
                </p>
            </div>
        </div>
    </section>
@endsection
