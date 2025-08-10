@extends('layouts.superadmin-app')

@section('content')
    <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
    <div class="block md:flex justify-between items-center mt-1">
        <p class="text-slate-500">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        <div class="mt-1 md:mt-0">
            <p class="text-slate-500">{{ $dateNow->format('D') }}, {{ $dateNow->format('d F Y') }}</p>
            <p class="text-slate-500">{{ $dateNow->format('H:i A') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mt-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Total Pendapatan</h3>
                <p class="mt-2 text-2xl font-bold text-slate-900">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 text-yellow-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Total Pesanan</h3>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalOrders }}</p>
            </div>
            <div class="bg-emerald-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Total Pelanggan</h3>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalUsers }}</p>
            </div>
            <div class="bg-sky-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-6 text-sky-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Total Produks</h3>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalProduct }}</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-6 text-purple-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mt-4">
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                <h3 class="text-xl font-semibold text-slate-800">{{ $chartTitle }}</h3>
                <div class="flex space-x-1 bg-slate-100 p-1 rounded-lg mt-2 sm:mt-0">
                    <a href="{{ route('admin.dashboard.index', ['filter' => 'daily']) }}"
                        class="px-3 py-1 text-sm font-semibold rounded-md transition-colors {{ $filter == 'daily' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Harian
                    </a>
                    <a href="{{ route('admin.dashboard.index', ['filter' => 'weekly']) }}"
                        class="px-3 py-1 text-sm font-semibold rounded-md transition-colors {{ $filter == 'weekly' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Mingguan
                    </a>
                    <a href="{{ route('admin.dashboard.index', ['filter' => 'monthly']) }}"
                        class="px-3 py-1 text-sm font-semibold rounded-md transition-colors {{ $filter == 'monthly' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Bulanan
                    </a>
                    <a href="{{ route('admin.dashboard.index', ['filter' => 'yearly']) }}"
                        class="px-3 py-1 text-sm font-semibold rounded-md transition-colors {{ $filter == 'yearly' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Tahunan
                    </a>
                </div>
            </div>
            <canvas id="salesChart" class="mt-4"></canvas>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            @if (auth()->user()->role == 'owner')
                <h3 class="text-xl font-semibold text-slate-800 mb-4">5 Produk Terlaris</h3>
                @if (!empty($topProductsLabels))
                    <canvas id="topProductsChart"></canvas>
                @else
                    <p class="text-sm text-center text-slate-500 py-8">Belum ada data penjualan yang cukup.</p>
                @endif
            @elseif(auth()->user()->role == 'superadmin')
                <h3 class="text-xl font-semibold text-slate-800 mb-4">Aktivitas Terbaru</h3>
                <div class="space-y-4">
                    @forelse($recentOrders as $order)
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center
                            @if ($order->status == 'pending') bg-yellow-100 text-yellow-600 @endif
                            @if ($order->status == 'paid') bg-cyan-100 text-cyan-600 @endif
                            @if ($order->status == 'processing') bg-indigo-100 text-indigo-600 @endif
                            @if ($order->status == 'shipped') bg-purple-100 text-purple-600 @endif
                            @if ($order->status == 'completed') bg-green-100 text-green-600 @endif
                            @if ($order->status == 'cancelled') bg-red-100 text-red-600 @endif ">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-700">
                                    Pesanan baru dari <span class="font-bold">{{ $order->user->name }}</span>
                                </p>
                                <p class="text-xs text-slate-500">
                                    {{ $order->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <a href="{{ route('admin.orders.show', $order) }}"
                                class="text-xs font-semibold text-indigo-600 hover:underline">
                                Lihat
                            </a>
                        </div>
                    @empty
                        <p class="text-sm text-center text-slate-500 py-8">Belum ada aktivitas terbaru.</p>
                    @endforelse
                </div>
            @endif
        </div>
    </div>

    @if ($limitStok->isNotEmpty())
        <div class="mt-4 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex items-center space-x-3 mb-4">
                <div class="bg-red-100 p-2 rounded-full">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-800">Peringatan Stok Rendah</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Gambar</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-slate-500 uppercase">Produk</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-slate-500 uppercase">Sisa Stok</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @foreach ($limitStok as $product)
                            <tr>
                                <td class="px-6 py-4">
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                        class="h-12 w-12 object-cover rounded-md">
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap font-semibold text-slate-700">{{ $product->name }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-right font-bold text-red-600">
                                    {{ $product->stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: 'Pendapatan',
                        data: @json($chartData),
                        backgroundColor: 'rgba(79, 70, 229, 0.8)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 1,
                        borderRadius: 8,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            const topProductsCtx = document.getElementById('topProductsChart');
            if (topProductsCtx) {
                const topProductsChart = new Chart(topProductsCtx.getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: @json($topProductsLabels),
                        datasets: [{
                            label: 'Jumlah Terjual',
                            data: @json($topProductsData),
                            backgroundColor: [
                                'rgba(79, 70, 229, 0.8)',
                                'rgba(245, 158, 11, 0.8)',
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(239, 68, 68, 0.8)',
                                'rgba(107, 114, 128, 0.8)'
                            ],
                            borderColor: [
                                'rgba(255, 255, 255, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    plugins: [ChartDataLabels],
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 12,
                                    boxWidth: 12,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            title: {
                                display: false,
                            },
                            datalabels: {
                                formatter: (value, ctx) => {
                                    const dataPoints = ctx.chart.data.datasets[0].data;
                                    const total = dataPoints.reduce((acc, data) => acc + Number(data),
                                        0);
                                    if (total === 0) {
                                        return '0%';
                                    }
                                    const percentage = (value / total * 100);
                                    return percentage > 1 ? percentage.toFixed(1) + "%" : '';
                                },
                                color: '#fff',
                                font: {
                                    weight: 'bold',
                                    size: 14,
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
