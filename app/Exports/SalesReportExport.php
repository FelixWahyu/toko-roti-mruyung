<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SalesReportExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $storeName;
    protected $storeAddress;
    protected $totalRevenue;
    protected $dataCount;

    public function __construct($startDate, $endDate, $storeName, $storeAddress)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->storeName = $storeName;
        $this->storeAddress = $storeAddress;
    }

    public function collection()
    {
        $orders = Order::with('user')
            ->where('status', 'completed')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get();

        // Simpan jumlah pendapatan dan bilangan data untuk digunakan kemudian
        $this->totalRevenue = $orders->sum('grand_total');
        $this->dataCount = $orders->count();

        return $orders;
    }

    public function headings(): array
    {
        // Ini adalah kepala jadual data
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
        // Ini memetakan setiap baris data
        return [
            $order->order_code,
            $order->user->name,
            $order->created_at->format('d-m-Y'),
            $order->total_amount,
            $order->shipping_cost,
            $order->grand_total,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Menetapkan gaya untuk baris kepala jadual (sekarang di baris 6)
        return [
            6 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Menambah 5 baris kosong di atas untuk kepala surat
                $event->sheet->insertNewRowBefore(1, 5);

                // Menggabungkan sel untuk tajuk
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->mergeCells('A2:F2');
                $event->sheet->mergeCells('A4:F4');
                $event->sheet->mergeCells('A5:F5');

                // Menetapkan nilai kepala surat
                $event->sheet->setCellValue('A1', $this->storeName);
                $event->sheet->setCellValue('A2', $this->storeAddress);
                $event->sheet->setCellValue('A4', 'LAPORAN PENJUALAN');
                $event->sheet->setCellValue('A5', 'Periode: ' . \Carbon\Carbon::parse($this->startDate)->format('d F Y') . ' - ' . \Carbon\Carbon::parse($this->endDate)->format('d F Y'));

                // Menetapkan gaya untuk kepala surat
                $event->sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $event->sheet->getStyle('A4')->getFont()->setBold(true)->setSize(14);
                $event->sheet->getStyle('A1:A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // Menambah bahagian jumlah pendapatan di bawah jadual
                $totalRow = $this->dataCount + 7; // 6 baris untuk kepala surat + 1 baris untuk kepala jadual
                $event->sheet->mergeCells("A{$totalRow}:E{$totalRow}");
                $event->sheet->setCellValue("A{$totalRow}", 'Total Pendapatan');
                $event->sheet->setCellValue("F{$totalRow}", $this->totalRevenue);

                // Menetapkan gaya untuk baris jumlah
                $event->sheet->getStyle("A{$totalRow}:F{$totalRow}")->getFont()->setBold(true);
                $event->sheet->getStyle("A{$totalRow}")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                // Menetapkan format nombor untuk lajur kewangan
                $event->sheet->getStyle('D7:F' . ($totalRow))->getNumberFormat()->setFormatCode('#,##0');
            },
        ];
    }
}
