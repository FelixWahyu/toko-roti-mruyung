@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Laporan Penjualan</h1>

    <div class="bg-white p-6 rounded-lg shadow-md mb-6 border border-gray-200">
        <form action="{{ route('admin.reports.index') }}" method="GET">
            {{-- <div class="flex flex-wrap items-center gap-2 mb-4">
                <span class="text-sm font-medium text-gray-700 mr-2">Filter Cepat:</span>
                <a href="{{ route('admin.reports.index', ['period' => 'today']) }}"
                    class="px-3 py-1 text-sm rounded-full {{ $period == 'today' ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-700' }}">Hari
                    Ini</a>
                <a href="{{ route('admin.reports.index', ['period' => 'this_week']) }}"
                    class="px-3 py-1 text-sm rounded-full {{ $period == 'this_week' ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-700' }}">Minggu
                    Ini</a>
                <a href="{{ route('admin.reports.index', ['period' => 'this_month']) }}"
                    class="px-3 py-1 text-sm rounded-full {{ $period == 'this_month' ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-700' }}">Bulan
                    Ini</a>
            </div>

            <hr class="my-4"> --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $startDate }} ?? ''"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $endDate }}?? ''"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                        <option value="">Semua Metode</option>
                        <option value="Transfer Bank" {{ $paymentMethod == 'Transfer Bank' ? 'selected' : '' }}>Transfer
                            Bank</option>
                        <option value="QRIS" {{ $paymentMethod == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                        <option value="COD" {{ $paymentMethod == 'COD' ? 'selected' : '' }}>COD</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status Pesanan</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing
                        </option>
                        <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button type="submit"
                        class="bg-indigo-600 flex gap-1 items-center hover:bg-indigo-700 text-white font-bold py-2 px-3 rounded-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                        Filter</button>
                </div>
            </div>
        </form>

        <div class="mt-4 flex space-x-2">
            <a href="{{ route('admin.reports.pdf', request()->query()) }}" target="_blank"
                class="bg-red-600 flex gap-1 items-center hover:bg-red-700 text-white font-bold py-2 px-3 rounded-lg text-sm"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                </svg>
                Export PDF</a>
            {{-- <a href="{{ route('admin.reports.excel', request()->query()) }}"
                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg text-sm">Export
                Excel</a> --}}
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Pesanan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Metode Pembayaran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-indigo-600">{{ $order->order_code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->payment_method }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full capitalize
                                @if ($order->status == 'pending') bg-yellow-100 text-yellow-800 @endif
                                @if ($order->status == 'paid') bg-cyan-100 text-cyan-800 @endif
                                @if ($order->status == 'processing') bg-blue-100 text-blue-800 @endif
                                @if ($order->status == 'shipped') bg-purple-100 text-purple-800 @endif
                                @if ($order->status == 'completed') bg-green-100 text-green-800 @endif
                                @if ($order->status == 'cancelled') bg-red-100 text-red-800 @endif
                            ">{{ $order->status }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-slate-500">Tidak ada data penjualan untuk
                            filter yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
            @if ($orders->isNotEmpty())
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="5" class="px-6 py-3 text-center font-bold">Total (Halaman ini)</td>
                        <td class="px-6 py-3 text-right font-bold">
                            Rp{{ number_format($orders->sum('grand_total'), 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ $errors->first() }}',
                });
            });
        </script>
    @endif
@endsection
