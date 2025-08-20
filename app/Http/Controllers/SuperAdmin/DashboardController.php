<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalRevenue = Order::where('status', 'completed')->sum('grand_total');
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'pelanggan')->count();
        $totalProduct = Product::count();
        $limitStok = Product::where('stock', '<=', 10)->orderBy('stock', 'asc')->get();
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        $dateNow = Carbon::now();

        $filter = $request->input('filter');
        if (!$filter) {
            $filter = auth()->user()->role === 'admin' ? 'daily' : 'monthly';
        }

        $query = Order::query()->where('status', 'completed');
        $chartLabels = [];
        $chartData = [];
        $chartTitle = '';

        switch ($filter) {
            case 'daily':
                $chartTitle = 'Penjualan 7 Hari Terakhir';
                $salesData = $query->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('SUM(grand_total) as total')
                )
                    ->where('created_at', '>=', Carbon::now()->subDays(6))
                    ->groupBy('date')
                    ->orderBy('date', 'asc')
                    ->get()->keyBy('date');

                for ($i = 6; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $dateString = $date->format('Y-m-d');
                    $chartLabels[] = $date->format('d M');
                    $chartData[] = $salesData->get($dateString)->total ?? 0;
                }
                break;

            case 'weekly':
                $chartTitle = 'Penjualan 4 Minggu Terakhir';
                $salesData = $query->select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('WEEK(created_at, 1) as week'),
                    DB::raw('SUM(grand_total) as total')
                )
                    ->where('created_at', '>=', Carbon::now()->subWeeks(3)->startOfWeek())
                    ->groupBy('year', 'week')
                    ->orderBy('year', 'asc')->orderBy('week', 'asc')
                    ->get();

                for ($i = 3; $i >= 0; $i--) {
                    $week = Carbon::now()->subWeeks($i);
                    $weekNum = $week->weekOfYear;
                    $yearNum = $week->year;
                    $chartLabels[] = "Minggu " . $weekNum;
                    $chartData[] = $salesData->where('year', $yearNum)->firstWhere('week', $weekNum)->total ?? 0;
                }
                break;

            case 'monthly':
                $chartTitle = 'Penjualan Bulanan';
                $salesData = $query->select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('SUM(grand_total) as total')
                )
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get()->keyBy('month');

                for ($i = 1; $i <= 12; $i++) {
                    $chartLabels[] = Carbon::create()->month($i)->format('F');
                    $chartData[] = $salesData->get($i)->total ?? 0;
                }
                break;

            case 'yearly':
            default:
                $chartTitle = 'Penjualan per Tahun';
                $salesData = $query->select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('SUM(grand_total) as total')
                )
                    ->groupBy('year')
                    ->orderBy('year', 'asc')
                    ->get();

                foreach ($salesData as $sale) {
                    $chartLabels[] = $sale->year;
                    $chartData[] = $sale->total;
                }
                break;
        }

        $topProductsLabels = [];
        $topProductsData = [];

        if (auth()->user()->role === 'owner') {
            $topProducts = Product::select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
                ->join('order_items', 'products.id', '=', 'order_items.product_id')
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->where('orders.status', 'completed')
                ->groupBy('products.id', 'products.name')
                ->orderBy('total_sold', 'desc')
                ->take(5)
                ->get();

            foreach ($topProducts as $product) {
                $topProductsLabels[] = $product->name;
                $topProductsData[] = $product->total_sold;
            }
        }

        return view('superadmin.dashboard-page', compact(
            'totalRevenue',
            'totalOrders',
            'totalUsers',
            'totalProduct',
            'limitStok',
            'chartLabels',
            'chartData',
            'chartTitle',
            'recentOrders',
            'filter',
            'topProductsLabels',
            'topProductsData',
            'dateNow'
        ));
    }
}
