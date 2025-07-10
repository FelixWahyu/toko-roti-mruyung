<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot {
            font-weight: bold;
        }

        .total {
            text-align: right;
        }
    </style>
</head>

<body>
    <h1>Laporan Penjualan</h1>
    <h2>Toko Roti Mruyung</h2>
    <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} -
        {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Pesanan</th>
                <th>Pelanggan</th>
                <th class="total">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td class="total">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Total Pendapatan</td>
                <td class="total">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
