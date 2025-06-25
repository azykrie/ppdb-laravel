@extends('layouts.admin')
@section('title', 'Detail & Verifikasi Biodata Siswa')

@section('content')
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('admin.calon-siswa.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <span class="text-sm font-medium">Kembali ke Daftar</span>
            </a>
            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Detail Biodata:
                {{ $biodataSiswa->nama_lengkap ?? 'N/A' }}</h1>
        </div>

        {{-- Pesan Notifikasi (Success/Error) --}}
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-50 p-4 text-green-700" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 rounded-md bg-red-50 p-4 text-red-700" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- Bagian Informasi Biodata Siswa (Tidak Berubah) --}}
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Informasi Biodata Siswa</h2>

            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Status Verifikasi Biodata Saat Ini:</h3>
                @php
                    $statusClass = '';
                    $statusText = '';
                    switch ($biodataSiswa->verification_status) {
                        case 'pending':
                            $statusClass = 'bg-yellow-100 text-yellow-800';
                            $statusText = 'Menunggu Verifikasi';
                            break;
                        case 'verified':
                            $statusClass = 'bg-green-100 text-green-800';
                            $statusText = 'Terverifikasi';
                            break;
                        case 'rejected':
                            $statusClass = 'bg-red-100 text-red-800';
                            $statusText = 'Ditolak';
                            break;
                        default:
                            $statusClass = 'bg-gray-100 text-gray-800';
                            $statusText = 'Tidak Diketahui';
                    }
                @endphp
                <span
                    class="inline-flex items-center justify-center rounded-full {{ $statusClass }} px-3 py-1.5 text-sm font-medium">
                    {{ $statusText }}
                </span>

                @if ($biodataSiswa->verification_notes)
                    <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                        <h4 class="font-semibold mb-1">Catatan Verifikasi:</h4>
                        <p>{{ $biodataSiswa->verification_notes }}</p>
                        @if ($biodataSiswa->verifiedBy)
                            <p class="mt-2 text-xs text-red-500">Diverifikasi oleh: {{ $biodataSiswa->verifiedBy->name }}
                                pada {{ \Carbon\Carbon::parse($biodataSiswa->verified_at)->format('d F Y H:i') }}</p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                {{-- ... Detail Biodata Lainnya (Tidak Berubah) ... --}}
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">NISN</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->nisn ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Nama Lengkap</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->nama_lengkap ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Tempat, Tanggal Lahir</h3>
                    <p class="text-gray-600">
                        {{ $biodataSiswa->tempat_lahir ?? '-' }},
                        {{ $biodataSiswa->tanggal_lahir ? \Carbon\Carbon::parse($biodataSiswa->tanggal_lahir)->format('d F Y') : '-' }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Jenis Kelamin</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->jenis_kelamin ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                    <h3 class="font-medium text-gray-800 mb-1">Agama</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->agama ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                    <h3 class="font-medium text-gray-800 mb-1">Alamat Lengkap</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->alamat ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Nomor Telepon</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->no_telepon ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Asal Sekolah</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->asal_sekolah ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Jurusan Yang Di Pilih</h3>
                    <p class="text-gray-600">{{ $biodataSiswa->jurusan ?? '-' }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Foto Nilai Rapor</h3>
                    @if ($biodataSiswa->foto_nilai_rapor)
                        <a href="{{ asset('storage/' . $biodataSiswa->foto_nilai_rapor) }}" target="_blank"
                            class="inline-flex items-center gap-1.5 text-blue-600 hover:underline">
                            Lihat File
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    @else
                        <p class="text-gray-600">Belum diunggah</p>
                    @endif
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Foto Ijazah</h3>
                    @if ($biodataSiswa->foto_ijazah)
                        <a href="{{ asset('storage/' . $biodataSiswa->foto_ijazah) }}" target="_blank"
                            class="inline-flex items-center gap-1.5 text-blue-600 hover:underline">
                            Lihat File
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    @else
                        <p class="text-gray-600">Belum diunggah</p>
                    @endif
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium text-gray-800 mb-1">Foto Formal</h3>
                    @if ($biodataSiswa->foto_formal)
                        <a href="{{ asset('storage/' . $biodataSiswa->foto_formal) }}" target="_blank"
                            class="inline-flex items-center gap-1.5 text-blue-600 hover:underline">
                            Lihat File
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    @else
                        <p class="text-gray-600">Belum diunggah</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Form Verifikasi --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Form Verifikasi Biodata</h2>

            <form action="{{ route('admin.calon-siswa.update', $biodataSiswa->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="verification_status" class="block text-sm font-medium text-gray-700">Status
                        Verifikasi</label>
                    <select id="verification_status" name="verification_status"
                        class="mt-1 block w-full rounded-lg border-gray-200 p-3 text-sm shadow-sm" required>
                        <option value="pending"
                            {{ old('verification_status', $biodataSiswa->verification_status) == 'pending' ? 'selected' : '' }}>
                            Menunggu Verifikasi</option>
                        <option value="verified"
                            {{ old('verification_status', $biodataSiswa->verification_status) == 'verified' ? 'selected' : '' }}>
                            Terverifikasi</option>
                        <option value="rejected"
                            {{ old('verification_status', $biodataSiswa->verification_status) == 'rejected' ? 'selected' : '' }}>
                            Ditolak</option>
                    </select>
                    @error('verification_status')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="verification_notes" class="block text-sm font-medium text-gray-700">Catatan Verifikasi
                        (opsional)</label>
                    <textarea class="mt-1 w-full rounded-lg border-gray-200 p-3 text-sm shadow-sm"
                        placeholder="Contoh: Ijazah tidak jelas, Mohon upload ulang foto formal" rows="4" id="verification_notes"
                        name="verification_notes">{{ old('verification_notes', $biodataSiswa->verification_notes) }}</textarea>
                    @error('verification_notes')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring active:bg-indigo-700">
                    Update Status Verifikasi
                </button>
            </form>
        </div>
    </div>
@endsection
