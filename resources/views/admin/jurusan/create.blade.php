@extends('layouts.admin')
@section('title', 'Create Jurusan')
@section('content')
    <div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Jurusan</h2>

        <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama_jurusan" class="block text-sm font-medium text-gray-700">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan"
                       value="{{ old('nama_jurusan') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring focus:ring-blue-200 focus:outline-none"
                       required>
                @error('nama_jurusan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.jurusan.index') }}"
                   class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit"
                        class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection