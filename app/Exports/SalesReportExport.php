<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SalesReportExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize, WithStyles
{
    protected $orders;
    protected $startDate;
    protected $endDate;
    protected $storeName;
    protected $storeAddress;
    protected $totalRevenue;

    public function __construct(Collection $orders, $startDate, $endDate, $storeName, $storeAddress)
    {
        $this->orders = $orders;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->storeName = $storeName;
        $this->storeAddress = $storeAddress;
        $this->totalRevenue = $orders->sum('grand_total');
    }

    public function collection()
    {
        return $this->orders;
    }

    public function headings(): array
    {
        return [
            'Tanggal Pesanan',
            'Kode Pesanan',
            'Nama Pelanggan',
            'Metode Pembayaran',
            'Status',
            'Grand Total',
        ];
    }

    public function map($order): array
    {
        return [
            $order->created_at->format('d-m-Y'),
            $order->order_code,
            $order->user->name,
            $order->payment_method,
            ucfirst($order->status),
            $order->grand_total,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            6 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $event->sheet->insertNewRowBefore(1, 5);
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->mergeCells('A2:F2');
                $event->sheet->mergeCells('A4:F4');
                $event->sheet->mergeCells('A5:F5');

                $event->sheet->setCellValue('A1', $this->storeName);
                $event->sheet->setCellValue('A2', $this->storeAddress);
                $event->sheet->setCellValue('A4', 'LAPORAN PENJUALAN');
                $event->sheet->setCellValue('A5', 'Periode: ' . \Carbon\Carbon::parse($this->startDate)->format('d F Y') . ' - ' . \Carbon\Carbon::parse($this->endDate)->format('d F Y'));

                $event->sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $event->sheet->getStyle('A4')->getFont()->setBold(true)->setSize(14);
                $event->sheet->getStyle('A1:A6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $totalRow = $this->orders->count() + 7;
                $event->sheet->mergeCells("A{$totalRow}:E{$totalRow}");
                $event->sheet->setCellValue("A{$totalRow}", 'Total');
                $event->sheet->setCellValue("F{$totalRow}", $this->totalRevenue);

                $event->sheet->getStyle("A{$totalRow}:F{$totalRow}")->getFont()->setBold(true);
                $event->sheet->getStyle("A{$totalRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                $event->sheet->getStyle('F7:F' . ($totalRow))->getNumberFormat()->setFormatCode('#,##0');

                $tableRange = 'A6:F' . $totalRow;
                $sheet->getStyle($tableRange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            },
        ];
    }
}
