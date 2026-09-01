@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Laporan Penjualan</h1>

    <div class="bg-white p-5 rounded-sm mb-6 border border-gray-200">
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
                    <label for="start_date" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $startDate }} ?? ''"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                </div>
                <div>
                    <label for="end_date" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $endDate }}?? ''"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                </div>
                <div>
                    <label for="payment_method" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                        <option value="">Semua Metode</option>
                        <option value="Transfer Bank" {{ $paymentMethod == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="QRIS" {{ $paymentMethod == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                        <option value="COD" {{ $paymentMethod == 'COD' ? 'selected' : '' }}>COD</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Status Pesanan</label>
                    <select name="status" id="status"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-between gap-3 mt-4 pt-4 border-t border-gray-100">
                <button type="submit"
                    class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm inline-flex items-center space-x-1.5 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    <span>Terapkan Filter</span>
                </button>

                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.reports.pdf', request()->query()) }}" target="_blank"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-sm text-sm inline-flex items-center space-x-1.5 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                        </svg>
                        <span>Export PDF</span>
                    </a>
                    {{-- <a href="{{ route('admin.reports.excel', request()->query()) }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg text-sm">Export
                        Excel</a> --}}
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-sm overflow-x-auto border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Kode Pesanan</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Pelanggan</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Metode Pembayaran</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Jumlah</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-50/70 transition-colors">
                        <td class="px-5 py-3 whitespace-nowrap text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-5 py-3 whitespace-nowrap font-mono text-xs font-semibold text-gray-900">{{ $order->order_code }}</td>
                        <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">{{ $order->user->name }}</td>
                        <td class="px-5 py-3 whitespace-nowrap text-gray-600">{{ $order->payment_method }}</td>
                        <td class="px-5 py-3 whitespace-nowrap">
                            <span
                                class="px-2 py-0.5 text-xs font-semibold rounded-sm capitalize
                                @if ($order->status == 'pending') bg-amber-100 text-amber-800 @endif
                                @if ($order->status == 'paid') bg-sky-100 text-sky-800 @endif
                                @if ($order->status == 'processing') bg-indigo-100 text-indigo-800 @endif
                                @if ($order->status == 'shipped') bg-purple-100 text-purple-800 @endif
                                @if ($order->status == 'completed') bg-emerald-100 text-emerald-800 @endif
                                @if ($order->status == 'cancelled') bg-rose-100 text-rose-800 @endif
                            ">{{ $order->status }}</span>
                        </td>
                        <td class="px-5 py-3 whitespace-nowrap text-right font-medium text-gray-900">
                            Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-xs text-gray-500">Tidak ada data penjualan untuk filter yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
            @if ($orders->isNotEmpty())
                <tfoot class="bg-gray-50 border-t border-gray-200 font-semibold">
                    <tr>
                        <td colspan="5" class="px-5 py-3 text-center text-gray-700">Total (Halaman ini)</td>
                        <td class="px-5 py-3 text-right text-gray-900 font-bold">
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
                    confirmButtonColor: '#111827'
                });
            });
        </script>
    @endif
@endsection
