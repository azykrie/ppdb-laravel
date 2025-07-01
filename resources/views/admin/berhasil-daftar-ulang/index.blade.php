@extends('layouts.admin')
@section('title', 'User')
@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">User </h1>

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
                @forelse ($daftarUlangList as $index => $item)
                <tr class="border-b">
                    <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 text-sm">{{ $item->biodataSiswa->nama_lengkap ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm">
                        @if ($item->status === 'berhasil')
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Berhasil</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">Belum</span>
                        @endif
                    </td>
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
