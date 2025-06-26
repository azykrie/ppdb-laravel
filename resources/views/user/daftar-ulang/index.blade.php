@extends('layouts.user')

@section('title', 'Daftar Ulang Berhasil')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 px-4">
        <div class="bg-white shadow-lg rounded-2xl p-6 text-gray-800">
            <h2 class="text-2xl font-bold mb-4">Pembayaran Berhasil</h2>

            <div class="mb-6">
                <p class="text-sm text-gray-600">
                    Selamat! Pembayaran daftar ulang Anda telah berhasil. Berikut adalah detail informasi Anda:
                </p>
            </div>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="font-medium">Nama Lengkap:</span>
                    <span>{{ $biodataSiswa->nama_lengkap ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">NISN:</span>
                    <span>{{ $biodataSiswa->nisn ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Jurusan:</span>
                    <span>{{ $biodataSiswa->jurusan ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Status Pembayaran:</span>
                    <span class="text-green-600 font-semibold">Berhasil</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Jumlah Dibayar:</span>
                    <span>Rp {{ number_format($pembayaran->price, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href=""
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded-lg">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
