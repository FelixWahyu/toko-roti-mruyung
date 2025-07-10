@extends('layouts.superadmin-app')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-gray-500">Total Pendapatan</h3>
            <p class="mt-2 text-3xl font-bold text-gray-900">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-gray-500">Total Pesanan</h3>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $totalOrders }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-gray-500">Total Pelanggan</h3>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-sm font-medium text-gray-500">Pesanan Hari Ini</h3>
            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $newOrders }}</p>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-gray-800">Grafik Penjualan Tahun Ini</h3>
        <canvas id="salesChart" class="mt-4"></canvas>
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
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
