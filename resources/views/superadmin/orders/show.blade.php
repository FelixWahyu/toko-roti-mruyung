@extends('layouts.superadmin-app')
@section('content')
    <div class="text-xs mb-3 text-gray-500">
        <a href="{{ route('admin.orders.index') }}" class="hover:text-gray-900">Daftar Pesanan</a>
        <span class="mx-1.5 text-gray-400">/</span>
        <span class="text-gray-800 font-medium">{{ $order->order_code }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Detail Pesanan {{ $order->order_code }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white p-5 rounded-sm border border-gray-200">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">Item Pesanan</h3>
                <table class="min-w-full mt-3 text-sm">
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="py-3">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                            alt="{{ $item->product->name }}" class="h-12 w-12 object-cover rounded-sm border border-gray-200 mr-3">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $item->product->name }}</p>
                                            <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 text-right font-medium text-gray-900">
                                    Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 pt-3 border-t border-gray-100 space-y-1.5 text-right">
                    <p class="text-xs text-gray-600">Subtotal: <span
                            class="font-medium text-gray-900">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span></p>
                    <p class="text-xs text-gray-600">Ongkos Kirim: <span
                            class="font-medium text-gray-900">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</span></p>
                    <p class="text-base font-bold text-gray-900 pt-1">Grand Total: <span>Rp{{ number_format($order->grand_total, 0, ',', '.') }}</span></p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-sm border border-gray-200">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">Alamat Pengiriman</h3>
                <div class="mt-3 text-sm text-gray-700 space-y-1">
                    @if ($order->shippingZone)
                        <p><span class="font-medium text-gray-900">Daerah:</span> {{ $order->shippingZone->district }}</p>
                    @endif
                    <p><span class="font-medium text-gray-900">Alamat Lengkap:</span> {{ $order->shipping_address }}</p>
                </div>
            </div>
        </div>

        <div class="space-y-5">
            <div class="bg-white p-5 rounded-sm border border-gray-200">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">Informasi Pelanggan</h3>
                <div class="mt-3 space-y-2 text-xs">
                    <p class="flex justify-between"><strong class="text-gray-600">Tanggal:</strong> <span class="font-medium text-gray-900">{{ $order->created_at->format('d F Y') }}</span></p>
                    <p class="flex justify-between"><strong class="text-gray-600">Nama:</strong> <span class="font-medium text-gray-900">{{ $order->user->name }}</span></p>
                    <p class="flex justify-between"><strong class="text-gray-600">Email:</strong> <span class="font-medium text-gray-900">{{ $order->user->email }}</span></p>
                    <p class="flex justify-between"><strong class="text-gray-600">Telepon:</strong> <span class="font-medium text-gray-900">{{ $order->user->phone_number }}</span></p>
                    <p class="flex justify-between"><strong class="text-gray-600">Metode Bayar:</strong> <span class="font-medium text-gray-900">{{ $order->payment_method }}</span></p>
                    <p class="flex justify-between"><strong class="text-gray-600">Metode Kirim:</strong> <span class="font-medium text-gray-900">{{ $order->shipping_method }}</span></p>
                </div>
                @if ($order->payment_proof)
                    <div class="mt-4 pt-3 border-t border-gray-100">
                        <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-700 mb-2">Bukti Pembayaran</h4>
                        <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
                            <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran"
                                class="w-full rounded-sm border border-gray-200 hover:opacity-90 transition">
                        </a>
                        <a href="{{ Storage::url($order->payment_proof) }}" target="_blank"
                            class="mt-2 inline-block text-xs text-gray-800 font-semibold hover:underline">
                            Lihat ukuran penuh &rarr;
                        </a>
                    </div>
                @endif
            </div>
            <div class="bg-white p-5 rounded-sm border border-gray-200">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-gray-700 border-b border-gray-100 pb-2.5">Update Status Pesanan</h3>
                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="mt-3">
                    @csrf
                    @method('PATCH')
                    <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Status</label>
                    <select id="status" name="status"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit"
                        class="mt-3 w-full bg-gray-900 text-white font-semibold py-2 px-4 rounded-sm hover:bg-gray-800 text-xs transition">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
