@extends('layouts.superadmin-app')

@section('content')
    <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
    <p class="text-slate-500 mt-1">Selamat datang kembali, {{ Auth::user()->name }}!</p>

    <!-- Kartu Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Total Pendapatan</h3>
                <p class="mt-2 text-3xl font-bold text-slate-900">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
            <div class="bg-indigo-100 p-3 ms-1 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 text-indigo-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-between">
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
        <div class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Total Pelanggan</h3>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalUsers }}</p>
            </div>
            <div class="bg-sky-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-slate-500">Stok Roti Limit</h3>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $limitStok }}</p>
            </div>
            <div class="bg-red-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Grafik & Pesanan Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                <h3 class="text-xl font-semibold text-slate-800">{{ $chartTitle }}</h3>
                <!-- Butang Penapis -->
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
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h3 class="text-xl font-semibold text-slate-800">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                @forelse($recentOrders as $order)
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div
                                class="w-10 h-10 rounded-full flex items-center justify-center
                                @if ($order->status == 'pending') bg-yellow-100 text-yellow-600 @endif
                                @if ($order->status == 'paid') bg-cyan-100 text-cyan-600 @endif
                                @if ($order->status == 'processing') bg-yellow-100 text-yellow-600 @endif
                                @if ($order->status == 'completed') bg-green-100 text-green-600 @endif
                                @if ($order->status == 'cancelled') bg-red-100 text-red-600 @endif
                            ">
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
        </div>
    </div>

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
        });
    </script>
@endsection
