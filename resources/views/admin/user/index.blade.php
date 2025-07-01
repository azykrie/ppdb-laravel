@extends('layouts.admin')
@section('title', 'Daftar Ulang')
@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Siswa Berhasil Daftar Ulang </h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $index => $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm">{{ $item->email }}</td>
                            <td class="px-6 py-4 text-sm">{{ $item->role }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data daftar ulang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
