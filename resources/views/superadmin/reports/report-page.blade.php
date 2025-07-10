@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Laporan Penjualan</h1>

    <!-- Form Filter -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <form action="{{ route('admin.reports.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 items-end">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $startDate }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $endDate }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="md:col-span-1 lg:col-span-2 flex space-x-2">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Filter Laporan
                    </button>
                    @if ($startDate && $endDate)
                        <a href="{{ route('admin.reports.pdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}"
                            target="_blank" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Export PDF
                        </a>
                        <a href="{{ route('admin.reports.excel', ['start_date' => $startDate, 'end_date' => $endDate]) }}"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Export Excel
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Hasil Laporan -->
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Pesanan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-indigo-600">{{ $order->order_code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Silakan pilih rentang tanggal untuk
                            menampilkan laporan.</td>
                    </tr>
                @endforelse
            </tbody>
            @if ($orders->isNotEmpty())
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-3 text-right font-bold">Total Pendapatan</td>
                        <td class="px-6 py-3 text-right font-bold">
                            Rp{{ number_format($orders->sum('grand_total'), 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
@endsection
