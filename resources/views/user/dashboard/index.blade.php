@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Status Pelajar Non-Aktif -->
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Status Daftar Ulang</h2>
                <p class="text-3xl font-bold text-red-500">{{ $statusDaftarUlang }}</p>
            </div>
        </div>
    </div>
@endsection
