@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <a href="{{ route('profile.index') }}"
                    class="inline-flex items-center mb-6 text-sm text-gray-600 hover:text-brown-500">
                    &larr; Kembali ke Profil
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Upload Bukti Pembayaran</h1>
                <p class="text-gray-600 mt-2">Untuk pesanan dengan kode: <strong
                        class="text-indigo-600">{{ $order->order_code }}</strong></p>

                <div class="mt-6 border-t pt-6">
                    <p class="text-sm text-gray-500">Total yang harus dibayar:</p>
                    <p class="text-3xl font-bold text-gray-900">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</p>
                </div>

                <!-- BARU: Blok untuk menampilkan rekening bank -->
                <div class="mt-6 text-left">
                    <p class="font-semibold text-gray-700">Silakan transfer ke salah satu rekening berikut:</p>
                    <div class="mt-4 space-y-4">
                        @forelse($storeAccounts as $account)
                            <div class="p-4 border rounded-lg bg-gray-50">
                                <p class="font-bold text-lg">{{ $account->bank_name }}</p>
                                <p class="text-gray-800 text-xl font-mono tracking-wider">{{ $account->account_number }}</p>
                                <p class="text-gray-600">a/n {{ $account->account_holder_name }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Informasi rekening belum tersedia. Silakan hubungi admin.</p>
                        @endforelse
                    </div>
                </div>

                <form action="{{ route('order.payment.store', $order) }}" method="POST" enctype="multipart/form-data"
                    class="mt-8 border-t pt-8">
                    @csrf
                    <div>
                        <label for="payment_proof" class="block text-sm font-medium text-gray-700">File Bukti
                            Pembayaran</label>
                        <input type="file" name="payment_proof" id="payment_proof" required
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Ukuran Maks: 2MB.</p>
                        @error('payment_proof')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-brown-500 hover:bg-brown-600">
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
