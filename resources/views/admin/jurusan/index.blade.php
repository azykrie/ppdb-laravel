@extends('layouts.admin')
@section('title', 'Jurusan')
@section('content')
    <div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Daftar Jurusan</h2>
            <a href="{{ route('admin.jurusan.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                + Tambah Jurusan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Jurusan</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($jurusans as $index => $jurusan)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $jurusan->nama_jurusan }}</td>
                            <td class="px-4 py-2 text-sm space-x-2">
                                <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}"
                                   class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{route('admin.jurusan.destroy', $jurusan->id) }}" method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($jurusans->isEmpty())
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                Tidak ada data jurusan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection