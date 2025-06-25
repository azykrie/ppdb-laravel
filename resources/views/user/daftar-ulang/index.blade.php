@extends('layouts.user')

@section('title', 'Daftar Ulang')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 px-4 py-12">
    <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 text-center">
        <div class="mx-auto w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M12 5a7 7 0 1 1 0 14a7 7 0 0 1 0-14z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800">Belum Daftar Ulang</h2>
        <p class="mt-2 text-gray-600">
            Anda belum melakukan pembayaran daftar ulang. Silakan melakukan pembayaran sebesar <span class="font-semibold text-indigo-600">Rp 200.000</span> untuk melanjutkan proses pendaftaran.
        </p>

        <a href="{{ route('user.daftar-ulang.pembayaran') }}"
            class="mt-6 inline-block w-full bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
            Bayar Sekarang
        </a>
    </div>
</div>
@endsection
