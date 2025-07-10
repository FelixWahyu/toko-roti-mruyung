@extends('layouts.app')

@section('content')
    <div class="bg-gray-50">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Form Checkout -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Pengiriman</h2>

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Penerima</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor
                                    Telepon</label>
                                <input type="text" id="phone_number" name="phone_number"
                                    value="{{ auth()->user()->phone_number }}" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @error('phone_number')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="shipping_address" class="block text-sm font-medium text-gray-700">Alamat Lengkap
                                    Pengiriman</label>
                                <textarea id="shipping_address" name="shipping_address" rows="4" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ auth()->user()->address }}</textarea>
                                @error('shipping_address')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="pt-6">
                                <button type="submit"
                                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Buat Pesanan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Ringkasan Pesanan -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>
                    <ul class="divide-y divide-gray-200">
                        @php
                            $subtotal = 0;
                            $shipping_cost = 10000; // Contoh ongkir statis
                        @endphp
                        @foreach ($cartItems as $item)
                            @php $subtotal += $item->product->price * $item->quantity; @endphp
                            <li class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="font-medium text-gray-800">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="font-medium text-gray-900">
                                    Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                            </li>
                        @endforeach
                    </ul>
                    <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                        <div class="flex justify-between text-sm text-gray-600">
                            <p>Subtotal</p>
                            <p>Rp{{ number_format($subtotal, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <p>Ongkos Kirim</p>
                            <p>Rp{{ number_format($shipping_cost, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between text-lg font-bold text-gray-900">
                            <p>Grand Total</p>
                            <p>Rp{{ number_format($subtotal + $shipping_cost, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
