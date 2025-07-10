@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-lg text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Pesanan Berhasil Dibuat!</h2>
            <p class="mt-2 text-gray-600">Terima kasih telah berbelanja di Toko Roti Mruyung.</p>
            <div class="mt-6 border-t border-gray-200 pt-6">
                <p class="text-sm text-gray-500">Nomor Pesanan Anda:</p>
                <p class="text-lg font-semibold text-indigo-600">{{ $order->order_code }}</p>
                <p class="mt-4 text-sm text-gray-500">Total yang harus dibayar:</p>
                <p class="text-2xl font-bold text-gray-900">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</p>
                <p class="mt-4 text-sm text-gray-600">
                    Silakan lakukan pembayaran ke salah satu rekening kami dan konfirmasi pembayaran Anda.
                </p>
            </div>
            <div class="mt-8">
                <a href="{{ route('home') }}"
                    class="text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md px-6 py-3">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
@endsection
