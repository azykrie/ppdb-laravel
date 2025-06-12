@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6 max-w-xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Jurusan</h2>

        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_jurusan" class="block text-sm font-medium text-gray-700">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan"
                    value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400">
                
                @error('nama_jurusan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.jurusan.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 mr-2">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
