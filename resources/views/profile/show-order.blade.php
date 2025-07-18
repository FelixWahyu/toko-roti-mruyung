@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('profile.index') }}"
                class="inline-flex items-center mb-6 text-sm text-gray-600 hover:text-indigo-600">
                &larr; Kembali ke Riwayat Pesanan
            </a>
            <h1 class="text-3xl font-extrabold text-gray-900">Detail Pesanan</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-6">
                <!-- Kolom Kiri: Detail Item -->
                <div class="lg:col-span-2 space-y-6">
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
                </div>

                <!-- Kolom Kanan: Ringkasan & Alamat -->
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold border-b pb-2">Ringkasan Pesanan</h3>
                        <div class="mt-4 space-y-2 text-sm">
                            <p class="flex justify-between"><strong>Kode:</strong> <span
                                    class="font-mono text-indigo-600">{{ $order->order_code }}</span></p>
                            <p class="flex justify-between"><strong>Tanggal:</strong>
                                <span>{{ $order->created_at->format('d F Y') }}</span>
                            </p>
                            <p class="flex justify-between items-center"><strong>Status:</strong>
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full capitalize
                                @if ($order->status == 'pending') bg-yellow-200 text-yellow-800 @endif
                                @if ($order->status == 'paid' || $order->status == 'processing') bg-yellow-200 text-yellow-800 @endif
                                @if ($order->status == 'shipped' || $order->status == 'completed') bg-green-200 text-green-800 @endif
                                @if ($order->status == 'cancelled') bg-red-200 text-red-800 @endif
                            ">{{ $order->status }}</span>
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
                        <div
                            class="mt-4 pt-4 border-t flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-2">
                            @if ($order->status == 'pending' && !$order->payment_proof)
                                <a href="{{ route('order.payment', $order) }}"
                                    class="w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                                    Upload Bukti Bayar
                                </a>
                            @endif

                            @if (in_array($order->status, ['pending', 'paid']))
                                <form action="{{ route('order.cancel', $order) }}" method="POST" class="w-full"
                                    onsubmit="return confirm('Anda yakin ingin membatalkan pesanan ini?');">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-medium">
                                        Batalkan Pesanan
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold border-b pb-2">Alamat Pengiriman</h3>
                        <p class="mt-4 text-gray-600 text-sm">{{ $order->shipping_address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
