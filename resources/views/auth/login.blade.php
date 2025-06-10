@extends('layouts.login')

@section('title', 'Login')

@section('content')
    <section class="bg-gray-100">
        <div class="max-w-screen-xl mx-auto flex items-center justify-center min-h-screen px-4">
            <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 space-y-6">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Masuk ke Akun Anda</h2>
                    <p class="mt-1 text-sm text-gray-500">Silakan masuk untuk melanjutkan</p>
                </div>

                @if (session('status'))
                    <div class="text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="text-sm text-red-600">
                        <ul class="list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required autofocus
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300 text-indigo-600">
                            <span class="text-sm text-gray-600">Ingat saya</span>
                        </label>

                        <a href="" class="text-sm text-indigo-600 hover:underline">Lupa Password?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-200 text-sm font-semibold">
                        Masuk
                    </button>
                </form>

                <p class="text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register.index') }}" class="text-indigo-600 hover:underline">Daftar</a>
                </p>
                <p class="text-center text-sm text-gray-600">
                    Kembali ke Halaman Utama?
                    <a href="{{ route('portal-pendaftaran.index') }}" class="text-indigo-600 hover:underline">Beranda</a>
                </p>
            </div>
        </div>
    </section>
@endsection
