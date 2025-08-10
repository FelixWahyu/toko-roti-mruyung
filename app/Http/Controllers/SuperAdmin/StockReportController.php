<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockReportController extends Controller
{
    public function index()
    {
        $bestSellingProducts = Product::select('products.name', 'products.stock', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->groupBy('products.id', 'products.name', 'products.stock')
            ->orderBy('total_sold', 'desc')
            ->take(10)
            ->get();

        $slowMovingProducts = Product::select('products.name', 'products.stock', DB::raw('COALESCE(SUM(order_items.quantity), 0) as total_sold'))
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->leftJoin('orders', function ($join) {
                $join->on('order_items.order_id', '=', 'orders.id')
                    ->where('orders.status', 'completed');
            })
            ->groupBy('products.id', 'products.name', 'products.stock')
            ->orderBy('total_sold', 'asc')
            ->take(10)
            ->get();

        return view('superadmin.reports.report-stock', compact('bestSellingProducts', 'slowMovingProducts'));
    }
}
