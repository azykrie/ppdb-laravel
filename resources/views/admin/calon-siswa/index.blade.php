@extends('layouts.admin') {{-- Pastikan ini mengarah ke layout admin Anda --}}
@section('title', 'Verifikasi Biodata Calon Siswa')

@section('content')
<div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Daftar Calon Siswa & Verifikasi Biodata</h1>

        <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
            {{-- Tombol Tambah/Aksi lain jika diperlukan --}}
            {{-- <a
                href="#"
                class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 px-5 py-3 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring"
                type="button"
            >
                <span class="text-sm font-medium"> Tambah Calon Siswa </span>
            </a> --}}
        </div>
    </div>

    {{-- Pesan Notifikasi (Success/Error) --}}
    @if (session('success'))
        <div class="mt-4 rounded-md bg-green-50 p-4 text-green-700" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mt-4 rounded-md bg-red-50 p-4 text-red-700" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="mt-8 flow-root">
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">Nama Siswa</th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">NISN</th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">Asal Sekolah</th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">Status Biodata</th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">Diverifikasi Oleh</th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">Tanggal Daftar</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($biodataSiswas as $biodata)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $biodata->nama_lengkap ?? $biodata->user->name ?? 'N/A' }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $biodata->nisn ?? 'Belum ada' }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $biodata->asal_sekolah ?? 'Belum ada' }}</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                @php
                                    $statusClass = '';
                                    $statusText = '';
                                    switch ($biodata->verification_status) {
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
                                <span class="inline-flex items-center justify-center rounded-full {{ $statusClass }} px-2.5 py-0.5 text-xs font-medium">
                                    {{ $statusText }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                @if ($biodata->verifiedBy)
                                    {{ $biodata->verifiedBy->name }}
                                    <span class="block text-xs text-gray-500">({{ \Carbon\Carbon::parse($biodata->verified_at)->format('d M Y') }})</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                {{ $biodata->created_at ? \Carbon\Carbon::parse($biodata->created_at)->format('d F Y H:i') : '-' }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a
                                    href="{{ route('admin.calon-siswa.show', $biodata->id) }}"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                                >
                                    Verifikasi
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="whitespace-nowrap px-4 py-4 text-center text-gray-500">
                                Tidak ada data biodata siswa yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $biodataSiswas->links() }}
    </div>
</div>
@endsection