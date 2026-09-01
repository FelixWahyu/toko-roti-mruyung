@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Laporan Stok</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-sm border border-gray-200">
            <div class="px-5 py-4 border-b border-gray-200">
                <h2 class="text-sm font-bold uppercase tracking-wider text-gray-900">10 Produk Terlaris</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Produk</th>
                            <th class="px-5 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($bestSellingProducts as $product)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">{{ $product->name }}</td>
                                <td class="px-5 py-3 whitespace-nowrap text-right font-mono font-semibold text-gray-900">{{ $product->total_sold }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-5 py-6 text-center text-xs text-gray-500">Belum ada data penjualan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-sm border border-gray-200">
            <div class="px-5 py-4 border-b border-gray-200">
                <h2 class="text-sm font-bold uppercase tracking-wider text-gray-900">10 Produk Paling Lambat Terjual</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Produk</th>
                            <th class="px-5 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($slowMovingProducts as $product)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">{{ $product->name }}</td>
                                <td class="px-5 py-3 whitespace-nowrap text-right font-mono font-semibold text-gray-900">{{ $product->total_sold }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-5 py-6 text-center text-xs text-gray-500">Belum ada data penjualan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
