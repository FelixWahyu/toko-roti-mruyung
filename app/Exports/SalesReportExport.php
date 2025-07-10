<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesReportExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Order::with('user')
            ->where('status', 'completed')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get();
    }

    public function headings(): array
    {
        return [
            'Kode Pesanan',
            'Nama Pelanggan',
            'Tanggal Pesanan',
            'Subtotal',
            'Ongkos Kirim',
            'Grand Total',
        ];
    }

    public function map($order): array
    {
        return [
            $order->order_code,
            $order->user->name,
            $order->created_at->format('d-m-Y'),
            $order->total_amount,
            $order->shipping_cost,
            $order->grand_total,
        ];
    }
}
