@extends('layouts.user')

@section('title', 'Pembayaran Daftar Ulang')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Konfirmasi Pembayaran Daftar Ulang</h2>

        <div class="space-y-4">
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
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $snapToken }}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
@endsection