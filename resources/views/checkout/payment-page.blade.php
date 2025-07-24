@extends('layouts.app')
@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center py-12">
        <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-lg text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="mt-6 text-2xl font-bold text-gray-900">Pesanan Berhasil Dibuat!</h2>
            <p class="mt-2 text-gray-600">Terima kasih. Segera selesaikan pembayaran Anda.</p>

            <div class="mt-6 border-t border-gray-200 pt-6">
                <p class="text-sm text-gray-500">Nomor Pesanan Anda:</p>
                <p class="text-lg font-semibold text-indigo-600">{{ $order->order_code }}</p>
                <p class="mt-4 text-sm text-gray-500">Total yang harus dibayar:</p>
                <p class="text-2xl font-bold text-gray-900">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</p>
            </div>

            {{-- Paparan Dinamik Berdasarkan Kaedah Pembayaran --}}
            <div class="mt-6 text-left">
                @if ($order->payment_method === 'Transfer Bank')
                    <p class="font-semibold text-gray-700">Silakan transfer ke salah satu rekening berikut:</p>
                    <div class="mt-4 space-y-4">
                        @foreach ($storeAccounts as $account)
                            <div class="p-4 border rounded-lg bg-gray-50">
                                <p class="font-bold text-lg">{{ $account->bank_name }}</p>
                                <p class="text-gray-800 text-xl font-mono">{{ $account->account_number }}</p>
                                <p class="text-gray-600">Nama Pemilik {{ $account->account_holder_name }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8"><a href="{{ route('order.payment', $order) }}"
                            class="w-full block text-center text-base font-medium text-white bg-brown-500 hover:bg-brown-600 rounded-md px-6 py-3">Upload
                            Bukti Pembayaran</a></div>
                @elseif($order->payment_method === 'QRIS')
                    <p class="font-semibold text-gray-700 text-center">Silakan pindai atau muat turun kode QRIS di bawah
                        ini:</p>

                    @if ($qrisImage)
                        <img src="{{ Storage::url($qrisImage) }}" alt="[Kode QRIS]"
                            class="mx-auto mt-4 rounded-lg border p-2">

                        <a href="{{ Storage::url($qrisImage) }}" download="QRIS-{{ $order->order_code }}.png"
                            class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Muat Turun Kode QRIS
                        </a>
                    @else
                        <p class="text-center text-sm text-red-600 mt-4">Kode QRIS belum tersedia. Silakan hubungi admin.
                        </p>
                    @endif

                    <div class="mt-8">
                        <a href="{{ route('order.payment', $order) }}"
                            class="w-full block text-center text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md px-6 py-3">
                            Saya Sudah Bayar, Upload Bukti
                        </a>
                    </div>
                @endif
            </div>

            <div class="mt-8"><a href="{{ route('profile.index') }}"
                    class="text-sm text-gray-600 hover:text-brown-500">Lihat Riwayat Pesanan</a></div>
        </div>
    </div>
@endsection
