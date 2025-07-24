@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <a href="{{ route('profile.index') }}"
                    class="inline-flex items-center mb-6 text-sm text-gray-600 hover:text-brown-500">
                    &larr; Kembali ke Profil
                </a>
                <h1 class="text-2xl font-bold text-gray-900 text-center">Selesaikan Pembayaran</h1>
                <p class="text-gray-600 mt-2 text-center">Untuk pesanan dengan kode: <strong
                        class="text-indigo-600">{{ $order->order_code }}</strong></p>

                <div class="mt-6 border-t pt-6 text-center">
                    <p class="text-sm text-gray-500">Total yang harus dibayar:</p>
                    <p class="text-3xl font-bold text-gray-900">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</p>
                </div>

                <!-- Paparan Dinamik Berdasarkan Kaedah Pembayaran -->
                <div class="mt-6 text-left">

                    {{-- JIKA TRANSFER BANK --}}
                    @if ($order->payment_method === 'Transfer Bank')
                        <p class="font-semibold text-gray-700">Silakan transfer ke salah satu rekening berikut:</p>
                        <div class="mt-4 space-y-4">
                            @forelse($storeAccounts as $account)
                                <div class="p-4 border rounded-lg bg-gray-50">
                                    <p class="font-bold text-lg">{{ $account->bank_name }}</p>
                                    <p class="text-gray-800 text-xl font-mono tracking-wider">{{ $account->account_number }}
                                    </p>
                                    <p class="text-gray-600">a/n {{ $account->account_holder_name }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">Informasi rekening belum tersedia. Silakan hubungi admin.
                                </p>
                            @endforelse
                        </div>

                        {{-- JIKA QRIS --}}
                    @elseif($order->payment_method === 'QRIS')
                        <p class="font-semibold text-gray-700 text-center">Silakan pindai atau muat turun kode QRIS di bawah
                            ini:</p>
                        @if ($qrisImage)
                            <img src="{{ Storage::url($qrisImage) }}" alt="[Kode QRIS]"
                                class="mx-auto mt-4 rounded-lg border p-2">
                            <a href="{{ Storage::url($qrisImage) }}" download="QRIS-{{ $order->order_code }}.png"
                                class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Muat Turun Kode QRIS
                            </a>
                        @else
                            <p class="text-center text-sm text-red-600 mt-4">Kode QRIS belum tersedia. Silakan hubungi
                                admin.</p>
                        @endif
                    @endif
                </div>

                {{-- Borang Upload hanya muncul jika perlu --}}
                @if (in_array($order->payment_method, ['Transfer Bank', 'QRIS']))
                    <form action="{{ route('order.payment.store', $order) }}" method="POST" enctype="multipart/form-data"
                        class="mt-8 border-t pt-8">
                        @csrf
                        <div>
                            <label for="payment_proof" class="block text-sm font-medium text-gray-700">File Bukti
                                Pembayaran</label>
                            <input type="file" name="payment_proof" id="payment_proof" required
                                class="mt-1 block w-full text-sm p-1 border text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Ukuran Maks: 2MB.</p>
                            @error('payment_proof')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-brown-500 hover:bg-brown-600">
                                Saya sudah bayar, Konfirmasi Pembayaran
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
