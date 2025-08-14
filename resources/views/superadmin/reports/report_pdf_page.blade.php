<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            color: #333;
        }

        .header-table {
            width: 100%;
            border: none;
        }

        .header-table td {
            border: none;
            vertical-align: middle;
        }

        .logo-cell {
            width: 100px;
            vertical-align: top;
            padding-right: 0;
        }

        .logo-cell img {
            max-width: 90px;
            max-height: 90px;
        }

        .info-cell {
            vertical-align: middle;
            text-align: center;
            margin: 0;
            padding-left: 0;
        }

        .info-cell h1 {
            margin: 0;
            padding-left: 0;
            font-size: 24px;
        }

        .info-cell p {
            margin: 5px 0;
            font-size: 12px;
            color: #555;
        }

        .content-header {
            margin-bottom: 15px;
        }

        .content-header h2 {
            text-align: center;
            margin: 10px 0 0 0;
            font-size: 18px;
            text-decoration: underline;
        }

        .content-header p {
            text-align: center;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tfoot {
            font-weight: bold;
        }

        .total {
            text-align: right;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
        }

        .signature .tempat {
            margin-right: 1.5rem;
        }

        .signature .date {
            margin-bottom: 70px;
            margin-right: 1.5rem;
        }

        .signature .penanggung-jawab {
            margin-right: 3rem;
        }
    </style>
</head>

<body>
    <table class="header-table">
        <tr>
            <td class="logo-cell">
                @if ($logoPath)
                    <img src="{{ public_path('storage/' . $logoPath) }}" alt="Logo">
                @endif
            </td>
            <td class="info-cell">
                <h1>{{ $storeName }}</h1>
                <p>{{ $storeAddress }}</p>
            </td>
        </tr>
    </table>
    <hr>
    <div class="content-header">
        <h2>Laporan Penjualan</h2>
        <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} -
            {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Pesanan</th>
                <th>Pelanggan</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th class="total">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td class="total">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data penjualan untuk periode ini.</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="total">Total</td>
                <td class="total">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="signature">
        <p class="tempat">Banyumas, {{ now()->format('d F Y') }}</p>
        <p class="date">Penanggung Jawab,</p>
        <p class="name">(_________________________)</p>
        <p class="penanggung-jawab">{{ $user->name }}</p>
        <p class="penanggung-jawab">({{ ucfirst($user->role) }})</p>
    </div>
</body>

</html>
