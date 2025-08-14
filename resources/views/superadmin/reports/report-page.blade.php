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
                <div class="flex space-x-2">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">Filter</button>
                </div>
            </div>
        </form>

        <div class="mt-4 flex space-x-2">
            <a href="{{ route('admin.reports.pdf', request()->query()) }}" target="_blank"
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg text-sm">Export PDF</a>
            <a href="{{ route('admin.reports.excel', request()->query()) }}"
                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg text-sm">Export
                Excel</a>
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
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-slate-500">Tidak ada data penjualan untuk
                            filter yang dipilih.</td>
                    </tr>
                @endforelse
            </tbody>
            @if ($orders->isNotEmpty())
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-right font-bold">Total Pendapatan (Halaman ini)</td>
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
