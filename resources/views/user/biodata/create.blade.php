@extends('layouts.user')
@section('title', 'Create Biodata Siswa')
@section('content')
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <h1 class="text-center text-2xl font-bold text-gray-900 sm:text-3xl">Lengkapi Biodata Siswa</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Mohon lengkapi semua informasi yang dibutuhkan untuk proses pendaftaran.
            </p>

            {{-- Form untuk CREATE (POST) --}}
            <form action="{{ route('user.biodata.store') }}" method="POST" enctype="multipart/form-data"
                class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                @csrf


                <div>
                    <label for="nisn" class="sr-only">NISN</label>
                    <div class="relative">
                        <input type="nuumber" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Masukkan NISN" id="nisn" name="nisn"
                            value="{{ old('nisn', $biodataSiswa->nisn ?? '') }}" required />
                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                    </div>
                    @error('nisn')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nama_lengkap" class="sr-only">Nama Lengkap</label>
                    <div class="relative">
                        <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Masukkan Nama Lengkap" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $biodataSiswa->nama_lengkap ?? '') }}" required />
                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                    </div>
                    @error('nama_lengkap')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="tempat_lahir" class="sr-only">Tempat Lahir</label>
                        <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir', $biodataSiswa->tempat_lahir ?? '') }}" required />
                        @error('tempat_lahir')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="sr-only">Tanggal Lahir</label>
                        <input type="date" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $biodataSiswa->tanggal_lahir ?? '') }}" required />
                        @error('tanggal_lahir')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="mt-1 block w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $biodataSiswa->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $biodataSiswa->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="agama" class="sr-only">Agama</label>
                    <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Masukkan Agama" id="agama" name="agama"
                        value="{{ old('agama', $biodataSiswa->agama ?? '') }}" required />
                    @error('agama')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="alamat" class="sr-only">Alamat Lengkap</label>
                    <textarea class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Masukkan Alamat Lengkap"
                        rows="4" id="alamat" name="alamat" required>{{ old('alamat', $biodataSiswa->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="no_telepon" class="sr-only">Nomor Telepon</label>
                    <input type="tel" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Nomor Telepon (opsional)" id="no_telepon" name="no_telepon"
                        value="{{ old('no_telepon', $biodataSiswa->no_telepon ?? '') }}" />
                    @error('no_telepon')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="asal_sekolah" class="sr-only">Asal Sekolah</label>
                    <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Masukkan Asal Sekolah" id="asal_sekolah" name="asal_sekolah"
                        value="{{ old('asal_sekolah', $biodataSiswa->asal_sekolah ?? '') }}" required />
                    @error('asal_sekolah')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bagian Upload Foto dengan Preview --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    {{-- Foto Nilai Rapor --}}
                    <div>
                        <label for="foto_nilai_rapor" class="block text-sm font-medium text-gray-700">Foto Nilai
                            Rapor</label>
                        <input type="file"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                            id="foto_nilai_rapor" name="foto_nilai_rapor"
                            onchange="previewImage(event, 'preview_foto_nilai_rapor')" />
                        @error('foto_nilai_rapor')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        @if (isset($biodataSiswa->foto_nilai_rapor) && $biodataSiswa->foto_nilai_rapor)
                            <div class="mt-2 text-center">
                                <p class="text-xs text-gray-500 mb-1">File saat ini:</p>
                                <img id="current_foto_nilai_rapor"
                                    src="{{ asset('storage/' . $biodataSiswa->foto_nilai_rapor) }}"
                                    alt="Current Foto Rapor"
                                    class="w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200">
                            </div>
                        @endif
                        <div class="mt-2 text-center">
                            <p class="text-xs text-gray-500 mb-1">Preview:</p>
                            <img id="preview_foto_nilai_rapor" src="#" alt="Preview Foto Rapor"
                                class="hidden w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200">
                        </div>
                    </div>

                    {{-- Foto Ijazah --}}
                    <div>
                        <label for="foto_ijazah" class="block text-sm font-medium text-gray-700">Foto Ijazah</label>
                        <input type="file"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                            id="foto_ijazah" name="foto_ijazah" onchange="previewImage(event, 'preview_foto_ijazah')" />
                        @error('foto_ijazah')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        @if (isset($biodataSiswa->foto_ijazah) && $biodataSiswa->foto_ijazah)
                            <div class="mt-2 text-center">
                                <p class="text-xs text-gray-500 mb-1">File saat ini:</p>
                                <img id="current_foto_ijazah" src="{{ asset('storage/' . $biodataSiswa->foto_ijazah) }}"
                                    alt="Current Foto Ijazah"
                                    class="w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200">
                            </div>
                        @endif
                        <div class="mt-2 text-center">
                            <p class="text-xs text-gray-500 mb-1">Preview:</p>
                            <img id="preview_foto_ijazah" src="#" alt="Preview Foto Ijazah"
                                class="hidden w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200">
                        </div>
                    </div>

                    {{-- Foto Formal --}}
                    <div>
                        <label for="foto_formal" class="block text-sm font-medium text-gray-700">Foto Formal</label>
                        <input type="file"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                            id="foto_formal" name="foto_formal" onchange="previewImage(event, 'preview_foto_formal')" />
                        @error('foto_formal')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        @if (isset($biodataSiswa->foto_formal) && $biodataSiswa->foto_formal)
                            <div class="mt-2 text-center">
                                <p class="text-xs text-gray-500 mb-1">File saat ini:</p>
                                <img id="current_foto_formal" src="{{ asset('storage/' . $biodataSiswa->foto_formal) }}"
                                    alt="Current Foto Formal"
                                    class="w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200">
                            </div>
                        @endif
                        <div class="mt-2 text-center">
                            <p class="text-xs text-gray-500 mb-1">Preview:</p>
                            <img id="preview_foto_formal" src="#" alt="Preview Foto Formal"
                                class="hidden w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200">
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                    Simpan Biodata
                </button>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            function previewImage(event, previewId) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById(previewId);
                    output.src = reader.result;
                    output.classList.remove('hidden'); // Tampilkan preview
                    // Opsional: Sembunyikan gambar "current" jika ada
                    const currentImage = document.getElementById('current_' + previewId.replace('preview_', ''));
                    if (currentImage) {
                        currentImage.classList.add('hidden');
                    }
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endpush
@endsection
