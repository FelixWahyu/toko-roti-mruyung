<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SalesReportExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try {
            $filteredData = $this->getFilteredOrders($request, true);

            return view('superadmin.reports.report-page', [
                'orders' => $filteredData['orders'],
                'startDate' => $filteredData['startDate'],
                'endDate' => $filteredData['endDate'],
                'paymentMethod' => $request->input('payment_method'),
                'status' => $filteredData['status'],
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
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

        $user = Auth::user();

        $pdf = Pdf::loadView('superadmin.reports.report_pdf_page', compact('orders', 'startDate', 'endDate', 'totalRevenue', 'storeName', 'storeAddress', 'logoPath', 'user'));
        return $pdf->stream('laporan-penjualan-' . $startDate . '-' . $endDate . '.pdf');
    }

    public function getFilteredOrders(Request $request, bool $paginate = false): array
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $paymentMethod = $request->input('payment_method');
        $status = $request->input('status');

        if (($startDate && !$endDate) || (!$startDate && $endDate)) {
            throw ValidationException::withMessages([
                'start_date' => 'Tanggal awal dan akhir harus diisi!',
            ]);
        }

        $query = Order::query()->with('user');

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        } else {
            $firstOrderDate = Order::orderBy('created_at', 'asc')->first()->created_at ?? Carbon::now();
            $startDate = Carbon::parse($firstOrderDate)->toDateString();
            $endDate = Carbon::now()->toDateString();
        }

        if ($paymentMethod) {
            $query->where('payment_method', $paymentMethod);
        }

        if ($status) {
            $query->where('status', $status);
        }

        $orders = $paginate
            ? $query->latest()->paginate(10)->withQueryString()
            : $query->latest()->get();

        return [
            'orders' => $orders,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'status' => $status,
        ];
    }
}
