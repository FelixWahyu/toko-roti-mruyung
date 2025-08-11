@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Detail Pesanan</h1>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 mt-6">
                <div class="lg:col-span-3 space-y-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold border-b pb-2">Item yang Dipesan</h3>
                        <table class="min-w-full mt-4">
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr class="border-b last:border-b-0">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img src="{{ Storage::url($item->product->image) }}"
                                                    alt="{{ $item->product->name }}"
                                                    class="h-16 w-16 object-cover rounded-md mr-4">
                                                <div>
                                                    <p class="font-medium text-gray-800">{{ $item->product->name }}</p>
                                                    <p class="text-sm text-gray-500">{{ $item->quantity }} x
                                                        Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 text-right font-semibold">
                                            Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold border-b pb-2">Alamat Pengiriman</h3>
                        @if ($order->shippingZone)
                            <p class="mt-4 text-gray-800">Kecamatan: {{ $order->shippingZone->district }}</p>
                        @endif
                        <p class="mt-4 text-gray-800">Alamat Lengkap: {{ $order->shipping_address }}</p>
                    </div>
                </div>

                <div class="space-y-6 lg:col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold border-b pb-2">Ringkasan Pesanan</h3>
                        <div class="mt-4 space-y-2 text-sm">
                            <p class="flex justify-between"><strong>Kode:</strong> <span
                                    class="font-mono text-indigo-600">{{ $order->order_code }}</span></p>
                            <p class="flex justify-between"><strong>Tanggal:</strong>
                                <span>{{ $order->created_at->format('d F Y') }}</span>
                            </p>
                            <p class="flex justify-between"><strong>Metode Pembayaran:</strong>
                                <span>{{ $order->payment_method }}</span>
                            </p>
                            <p class="flex justify-between"><strong>Metode Pengiriman:</strong>
                                <span>{{ $order->shipping_method }}</span>
                            </p>
                            <p class="flex justify-between items-center"><strong>Status:</strong>
                                <span
                                    class="inline-flex items-center space-x-2 px-2 py-1 text-xs font-semibold rounded-md capitalize
                                    @if ($order->status == 'pending') bg-yellow-200 text-yellow-800 @endif
                                    @if ($order->status == 'paid') bg-cyan-200 text-cyan-800 @endif
                                    @if ($order->status == 'processing') bg-blue-200 text-blue-800 @endif
                                    @if ($order->status == 'shipped') bg-purple-200 text-purple-800 @endif
                                    @if ($order->status == 'completed') bg-green-200 text-green-800 @endif
                                    @if ($order->status == 'cancelled') bg-red-200 text-red-800 @endif ">
                                    @if ($order->status == 'pending')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                    @if ($order->status == 'paid')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                            </path>
                                        </svg>
                                    @endif
                                    @if ($order->status == 'processing')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    @endif
                                    @if ($order->status == 'shipped')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                        </svg>
                                    @endif
                                    @if ($order->status == 'completed')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                    @if ($order->status == 'cancelled')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    @endif
                                    <span>{{ $order->status }}</span>
                                </span>
                            </p>
                            <div class="border-t pt-2 mt-2">
                                <p class="flex justify-between">Subtotal:
                                    <span>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                </p>
                                <p class="flex justify-between">Ongkos Kirim:
                                    <span>Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                                </p>
                                <p class="flex justify-between font-bold text-base mt-1">Grand Total:
                                    <span>Rp{{ number_format($order->grand_total, 0, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>
                        @if ($order->payment_proof)
                            <div class="p-2 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold border-b pb-2 mb-4">Bukti Pembayaran Anda</h3>
                                <a href="{{ Storage::url($order->payment_proof) }}" target="_blank">
                                    <img src="{{ Storage::url($order->payment_proof) }}" alt="Bukti Pembayaran"
                                        class="w-full rounded-md hover:opacity-80 transition-opacity">
                                </a>

                                @if ($order->status == 'paid')
                                    <a href="{{ route('order.payment', $order) }}"
                                        class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z">
                                            </path>
                                        </svg>
                                        Edit Bukti Pembayaran
                                    </a>
                                @endif
                            </div>
                        @endif
                        <div
                            class="mt-4 pt-4 border-t flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-2">
                            @if ($order->status == 'pending' && !$order->payment_proof && !in_array($order->payment_method, ['COD', 'Debit']))
                                <a href="{{ route('order.payment', $order) }}"
                                    class="w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                                    Upload Bukti Bayar
                                </a>
                            @endif
                            @if ($order->status == 'shipped')
                                <form action="{{ route('order.confirm_receipt', $order) }}" method="POST" class="w-full"
                                    onsubmit="showConfirmation(event, 'Konfirmasi Pesanan?', 'Apakah Anda yakin sudah menerima pesanan ini?', 'Sudah Diterima')">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm font-medium">
                                        Pesanan Diterima
                                    </button>
                                </form>
                            @endif
                            @if (in_array($order->status, ['pending', 'paid']))
                                <form action="{{ route('order.cancel', $order) }}" method="POST" class="w-full"
                                    onsubmit="showConfirmation(event, 'Batalkan Pesanan?', 'Pesanan yang telah dibatalkan tidak dapat dikembalikan.', 'Ya, Batalkan')">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-medium">
                                        Batalkan Pesanan
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
