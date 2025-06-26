@extends('layouts.user')

@section('title', 'Pembayaran Daftar Ulang')

@section('content')
    <div class="max-w-xl mx-auto mt-10 px-4">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Konfirmasi Pembayaran Daftar Ulang</h2>

            <div class="space-y-4">
                <div class="flex justify-between text-sm text-gray-700">
                    <span class="font-medium">Nama :</span>
                    <span>{{ $biodataSiswa->nama_lengkap ?? '-' }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-700">
                    <span class="font-medium">Nama Jurusan:</span>
                    <span>{{ $biodataSiswa->jurusan ?? '-' }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-700">
                    <span class="font-medium">NISN:</span>
                    <span>{{ $biodataSiswa->nisn ?? '-' }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-700 border-t pt-4">
                    <span class="font-semibold text-lg">Jumlah Pembayaran:</span>
                    <span class="font-bold text-indigo-600 text-lg">Rp 200.000</span>
                </div>
            </div>

            <div class="mt-6" id="form-bayar">
                @csrf
                <button id="pay-button" type="button"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    // Redirect ke halaman index setelah pembayaran sukses
                    window.location.href = '{{ route('user.daftar-ulang.index', $pembayaran->id) }}';
                },
                onPending: function(result) {
                    // Redirect ke halaman index juga, karena menunggu
                    window.location.href = '{{ route('user.daftar-ulang.index', $pembayaran->id) }}';
                },
                onError: function(result) {
                    alert("Pembayaran gagal. Silakan coba lagi.");
                }
            });
        };
    </script>
@endsection
