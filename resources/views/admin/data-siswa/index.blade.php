@extends('layouts.admin')
@section('title', 'Data Siswa')
@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Data Siswa</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Jurusan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">NISN</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataSiswa as $index => $item)
                <tr class="border-b">
                    <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 text-sm">{{ $item->biodataSiswa->nama_lengkap ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $item->biodataSiswa->jurusan ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $item->biodataSiswa->nisn ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data siswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
