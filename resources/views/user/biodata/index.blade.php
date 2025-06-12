@extends('layouts.user')
@section('title', 'Biodata Siswa')

@section('content')
<div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl">
        <h1 class="text-center text-2xl font-bold text-gray-900 sm:text-3xl">Status Biodata Siswa</h1>

        @if (isset($biodataSiswa) && $biodataSiswa)
            <div class="bg-white shadow rounded-lg p-6 mt-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900">Informasi Biodata Anda</h2>
                    @if ($biodataSiswa->verification_status !== 'verified')
                        <a href="{{ route('user.biodata.edit', $biodataSiswa->id) }}"
                            class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-indigo-600 px-5 py-3 text-indigo-600 transition hover:bg-indigo-50 hover:text-indigo-700 focus:outline-none focus:ring active:bg-indigo-700">
                            <span class="text-sm font-medium"> Edit Biodata </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 2.222-1.539 1.539m4.505 4.505-1.539 1.539M18.272 4.09l4.187 4.187-1.539 1.539-4.187-4.187m-3.418 5.756 1.539 1.539-4.187 4.187-1.539-1.539m-4.505-4.505 1.539-1.539-4.187-4.187 1.539-1.539m-4.505 4.505 1.539 1.539-4.187 4.187-1.539-1.539m-4.505 4.505 1.539 1.539-4.187 4.187-1.539-1.539M14.25 12h.008v.008H14.25V12Zm-3.5 0h.008v.008H10.75V12Zm-3.5 0h.008v.008H7.25V12Zm-3.5 0h.008v.008H3.75V12Zm-3.5 0h.008v.008H0.25V12Z" />
                            </svg>
                        </a>
                    @else
                        <span
                            class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 px-5 py-3 text-gray-500">
                            <span class="text-sm font-medium"> Biodata Terverifikasi </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                    @endif
                </div>

                {{-- Status Verifikasi --}}
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Status Verifikasi Biodata:</h3>
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
                                <p class="mt-2 text-xs text-red-500">Diverifikasi oleh:
                                    {{ $biodataSiswa->verifiedBy->name }} pada
                                    {{ \Carbon\Carbon::parse($biodataSiswa->verified_at)->format('d F Y H:i') }}</p>
                            @endif
                        </div>
                    @endif
                </div>

                <p class="text-gray-700 mb-4">Berikut adalah detail biodata yang telah Anda masukkan.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    {{-- ... detail biodata lainnya (NISN, Nama, Tanggal Lahir, dll.) ... --}}
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


                    {{-- Tampilan untuk dokumen dengan PREVIEW --}}
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium text-gray-800 mb-1">Foto Nilai Rapor</h3>
                        @if ($biodataSiswa->foto_nilai_rapor)
                            <a href="{{ asset('storage/' . $biodataSiswa->foto_nilai_rapor) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 text-blue-600 hover:underline mb-2">
                                Lihat File
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                            {{-- Preview Gambar --}}
                            <img src="{{ asset('storage/' . $biodataSiswa->foto_nilai_rapor) }}"
                                 alt="Preview Foto Rapor"
                                 class="w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200 mt-2">
                        @else
                            <p class="text-gray-600">Belum diunggah</p>
                        @endif
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium text-gray-800 mb-1">Foto Ijazah</h3>
                        @if ($biodataSiswa->foto_ijazah)
                            <a href="{{ asset('storage/' . $biodataSiswa->foto_ijazah) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 text-blue-600 hover:underline mb-2">
                                Lihat File
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                            {{-- Preview Gambar --}}
                            <img src="{{ asset('storage/' . $biodataSiswa->foto_ijazah) }}"
                                 alt="Preview Foto Ijazah"
                                 class="w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200 mt-2">
                        @else
                            <p class="text-gray-600">Belum diunggah</p>
                        @endif
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium text-gray-800 mb-1">Foto Formal</h3>
                        @if ($biodataSiswa->foto_formal)
                            <a href="{{ asset('storage/' . $biodataSiswa->foto_formal) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 text-blue-600 hover:underline mb-2">
                                Lihat File
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                            {{-- Preview Gambar --}}
                            <img src="{{ asset('storage/' . $biodataSiswa->foto_formal) }}"
                                 alt="Preview Foto Formal"
                                 class="w-32 h-32 object-cover mx-auto rounded-lg border border-gray-200 mt-2">
                        @else
                            <p class="text-gray-600">Belum diunggah</p>
                        @endif
                    </div>
                </div>
            </div>
        @else
            {{-- Tampilan JIKA BIODATA BELUM DIISI (Tidak Berubah) --}}
            <div class="bg-white shadow rounded-lg p-6 mt-6 text-center">
                <div class="flex flex-col items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-16 text-yellow-500 mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.174 3.35 1.94 3.35h14.72c1.766 0 2.806-1.85 1.94-3.35L19.5 9.75a1.125 1.125 0 0 0-1.94 0L12 16.5l-2.06-3.574a1.125 1.125 0 0 0-1.94 0L3.75 12V6.375M16.5 12h.008v.008H16.5V12Zm-3 0h.008v.008H13.5V12Zm-3 0h.008v.008H10.5V12Zm-3 0h.008v.008H7.5V12Zm-3 0h.008v.008H4.5V12Z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Biodata Anda Belum Lengkap!</h2>
                </div>
                <p class="text-gray-700 mb-6">
                    Anda belum mengisi biodata siswa. Mohon lengkapi biodata Anda untuk melanjutkan proses pendaftaran.
                </p>
                <a href="{{ route('user.biodata.create') }}"
                    class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring active:bg-indigo-700">
                    Lengkapi Biodata Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection