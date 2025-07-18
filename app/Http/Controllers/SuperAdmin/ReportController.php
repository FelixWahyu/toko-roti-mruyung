<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SalesReportExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $orders = collect(); // Default collection kosong

        if ($startDate && $endDate) {
            $orders = Order::with('user')
                ->where('status', 'completed')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->latest()
                ->get();
        }

        return view('superadmin.reports.report-page', compact('orders', 'startDate', 'endDate'));
    }

    public function exportPDF(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        $orders = Order::with('user')
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $totalRevenue = $orders->sum('grand_total');

        $settings = Setting::all()->keyBy('key');
        $storeName = $settings['store_name']->value ?? 'Toko Roti Mruyung';
        $storeAddress = $settings['store_address']->value ?? '';
        $logoPath = $settings['store_logo']->value ?? null;

        $pdf = Pdf::loadView('superadmin.reports.report_pdf_page', compact('orders', 'startDate', 'endDate', 'totalRevenue', 'storeName', 'storeAddress', 'logoPath'));
        return $pdf->stream('laporan-penjualan-' . $startDate . '-' . $endDate . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        // Ambil data tetapan
        $settings = Setting::all()->keyBy('key');
        $storeName = $settings['store_name']->value ?? 'Toko Roti Mruyung';
        $storeAddress = $settings['store_address']->value ?? '';

        return Excel::download(new SalesReportExport($startDate, $endDate, $storeName, $storeAddress), 'laporan-penjualan-' . $startDate . '-' . $endDate . '.xlsx');
    }
}
