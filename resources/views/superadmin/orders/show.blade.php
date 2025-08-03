@extends('layouts.superadmin-app')
@section('content')
    <a href="{{ route('admin.orders.index') }}"
        class="inline-flex items-center mb-6 text-sm px-3 py-1 rounded-md text-gray-600 bg-indigo-100 hover:text-indigo-600">
        &larr; Kembali ke Daftar Pesanan
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan: {{ $order->order_code }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-6">
        <!-- Kolom Kiri: Detail Pesanan & Item -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold border-b pb-2">Item Pesanan</h3>
                <table class="min-w-full mt-4">
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="{{ Storage::url($item->product->image) }}"
                                            alt="{{ $item->product->name }}" class="h-16 w-16 object-cover rounded-md mr-4">
                                        <div>
                                            <p class="font-medium">{{ $item->product->name }}</p>
                                            <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 text-right">
                                    Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 space-y-2 text-right">
                    <p class="text-sm text-gray-600">Subtotal: <span
                            class="font-medium">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span></p>
                    <p class="text-sm text-gray-600">Ongkos Kirim: <span
                            class="font-medium">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</span></p>
                    <p class="text-lg font-bold text-gray-800">Grand Total: <span
                            class="text-indigo-600">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</span></p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold border-b pb-2">Alamat Pengiriman</h3>
                @if ($order->shippingZone)
                    <p class="mt-4 text-gray-800">Kecamatan: {{ $order->shippingZone->district }}</p>
                @endif
                <p class="mt-4 text-gray-800">Alamat Lengkap: {{ $order->shipping_address }}</p>
            </div>
        </div>

        <!-- Kolom Kanan: Info Pelanggan & Update Status -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold border-b pb-2">Informasi Pelanggan</h3>
                <div class="mt-4 space-y-2 text-sm">
                    <p class="flex justify-between"><strong>Nama:</strong> {{ $order->user->name }}</p>
                    <p class="flex justify-between"><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p class="flex justify-between"><strong>Telepon:</strong> {{ $order->user->phone_number }}</p>
                    <p class="flex justify-between"><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
                </div>
                @if ($order->payment_proof)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold border-b pb-2">Bukti Pembayaran</h3>
                        <div class="mt-4">
                            <a href="{{ Storage::url($order->payment_proof) }}" target="_blank">
                                <img src="{{ Storage::url($order->payment_proof) }}" alt="Bukti Pembayaran"
                                    class="w-full rounded-md shadow-md hover:opacity-80 transition-opacity">
                            </a>
                            <a href="{{ Storage::url($order->payment_proof) }}" target="_blank"
                                class="mt-2 inline-block text-sm text-indigo-600 hover:underline">
                                Lihat ukuran penuh
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold border-b pb-2">Update Status Pesanan</h3>
                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing
                        </option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit"
                        class="mt-4 w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
