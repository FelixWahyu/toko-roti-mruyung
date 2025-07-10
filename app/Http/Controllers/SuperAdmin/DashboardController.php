<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where('status', 'completed')->sum('grand_total');
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'pelanggan')->count();
        $newOrders = Order::whereDate('created_at', Carbon::today())->count();

        // Data untuk Grafik Penjualan Bulanan
        $salesData = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(grand_total) as total')
        )
            ->whereYear('created_at', date('Y'))
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $chartLabels = [];
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $total = $salesData->firstWhere('month', $i)->total ?? 0;
            array_push($chartLabels, $month);
            array_push($chartData, $total);
        }

        return view('superadmin.dashboard-page', compact(
            'totalRevenue',
            'totalOrders',
            'totalUsers',
            'newOrders',
            'chartLabels',
            'chartData'
        ));
    }
}
