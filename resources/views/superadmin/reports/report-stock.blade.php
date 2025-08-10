@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Laporan Stok</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold text-slate-800">10 Produk Terlaris</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Produk</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-slate-500 uppercase">Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($bestSellingProducts as $product)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap font-semibold text-slate-700">{{ $product->name }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-right text-slate-500">{{ $product->total_sold }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-2 text-center text-slate-500">Belum ada data penjualan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold text-slate-800">10 Produk Paling Lambat Terjual</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Produk</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-slate-500 uppercase">Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($slowMovingProducts as $product)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap font-semibold text-slate-700">{{ $product->name }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-right text-slate-500">{{ $product->total_sold }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-2 text-center text-slate-500">Belum ada data penjualan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
