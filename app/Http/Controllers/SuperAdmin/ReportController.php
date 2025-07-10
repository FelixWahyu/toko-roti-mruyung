<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Exports\SalesReportExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $pdf = Pdf::loadView('superadmin.reports.report_pdf_page', compact('orders', 'startDate', 'endDate', 'totalRevenue'));
        return $pdf->stream('laporan-penjualan-' . $startDate . '-' . $endDate . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        return Excel::download(new SalesReportExport($startDate, $endDate), 'laporan-penjualan.xlsx');
    }
}
