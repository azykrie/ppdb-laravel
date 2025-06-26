@extends('layouts.user')

@section('title', 'Daftar Ulang')

@section('content')
@if($pembayaran->status === 'berhasil')
    <div class="bg-green-100 p-4 rounded shadow text-green-700">
        Pembayaran Anda telah berhasil! Terima kasih.
    </div>
@else
    <div class="bg-yellow-100 p-4 rounded shadow text-yellow-700">
        Menunggu pembayaran...
    </div>
@endif
@endsection
