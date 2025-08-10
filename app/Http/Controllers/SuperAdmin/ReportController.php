<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SalesReportExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filteredData = $this->getFilteredOrders($request, true);

        return view('superadmin.reports.report-page', [
            'orders' => $filteredData['orders'],
            'startDate' => $filteredData['startDate'],
            'endDate' => $filteredData['endDate'],
            'paymentMethod' => $request->input('payment_method'),
            'period' => $request->input('period'),
        ]);
    }

    public function exportPDF(Request $request)
    {
        $filteredData = $this->getFilteredOrders($request, false);
        $orders = $filteredData['orders'];
        $startDate = $filteredData['startDate'];
        $endDate = $filteredData['endDate'];

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
        $filteredData = $this->getFilteredOrders($request, false);
        $startDate = $filteredData['startDate'];
        $endDate = $filteredData['endDate'];

        $settings = Setting::all()->keyBy('key');
        $storeName = $settings['store_name']->value ?? 'Toko Roti Mruyung';
        $storeAddress = $settings['store_address']->value ?? '';

        return Excel::download(new SalesReportExport($filteredData['orders'], $startDate, $endDate, $storeName, $storeAddress), 'laporan-penjualan.xlsx');
    }

    public function getFilteredOrders(Request $request, bool $paginate = false): array
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $paymentMethod = $request->input('payment_method');
        $period = $request->input('period');

        if ($period) {
            switch ($period) {
                case 'today':
                    $startDate = Carbon::today()->toDateString();
                    $endDate = Carbon::today()->toDateString();
                    break;
                case 'this_week':
                    $startDate = Carbon::now()->startOfWeek()->toDateString();
                    $endDate = Carbon::now()->endOfWeek()->toDateString();
                    break;
                case 'this_month':
                    $startDate = Carbon::now()->startOfMonth()->toDateString();
                    $endDate = Carbon::now()->endOfMonth()->toDateString();
                    break;
            }
        }

        $query = Order::query()->with('user')->where('status', 'completed');

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        }

        if ($paymentMethod) {
            $query->where('payment_method', $paymentMethod);
        }

        $orders = $paginate
            ? $query->latest()->paginate(10)->withQueryString()
            : $query->latest()->get();

        return [
            'orders' => $orders,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];
    }
}
