<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan.
     */
    public function index(Request $request)
    {
        $query = Order::query()->with('user');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $orders = $query->latest()->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return view('superadmin.orders._table-orders', compact('orders'))->render();
        }

        return view('superadmin.orders.order-page', compact('orders'));
    }

    /**
     * Menampilkan detail satu pesanan.
     */
    public function show(Order $order)
    {
        // Eager load relasi yang dibutuhkan
        $order->load('user', 'items.product', 'shippingZone');
        return view('superadmin.orders.show', compact('order'));
    }

    /**
     * Memperbarui status pesanan.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,processing,shipped,completed,cancelled',
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->status;

        if ($oldStatus === $newStatus) {
            return back()->with('info', 'Status pesanan tidak berubah.');
        }

        $order->load('items.product');

        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            foreach ($order->items as $item) {
                // Kembalikan stok produk
                $item->product->increment('stock', $item->quantity);
            }
        } elseif ($oldStatus === 'cancelled' && $newStatus !== 'cancelled') {
            foreach ($order->items as $item) {
                // Kurangi lagi stoknya
                $item->product->decrement('stock', $item->quantity);
            }
        }

        $order->update(['status' => $newStatus]);

        $customerNumber = preg_replace('/\D/', '', $order->user->phone_number);
        if ($customerNumber) {
            $whatsappService = new WhatsAppService();
            $message = '';
            $customerName = $order->user->name;

            if ($newStatus === 'processing' && $oldStatus !== 'processing') {
                $itemDetails = "";
                foreach ($order->items as $item) {
                    $itemSubtotal = number_format($item->price * $item->quantity, 0, ',', '.');
                    $itemDetails .= "- {$item->product->name} (x{$item->quantity}) : *Rp{$itemSubtotal}*\n";
                }

                // Format nombor untuk jumlah
                $subtotalFormatted = number_format($order->total_amount, 0, ',', '.');
                $shippingCostFormatted = number_format($order->shipping_cost, 0, ',', '.');
                $grandTotalFormatted = number_format($order->grand_total, 0, ',', '.');
                $paymentMethod = $order->payment_method;
                $shippingMethod = $order->shipping_method;
                $orderDate = $order->created_at->format('d F Y');

                // Bina mesej lengkap
                $message  = "Tanggal: {$orderDate}\n\n";
                $message .= "Halo *{$customerName}*!\n";
                $message .= "Pesanan Anda dengan kode *{$order->order_code}* telah kami konfirmasi dan sedang diproses.\n\n";
                $message .= "*RINCIAN PESANAN:*\n";
                $message .= "Metode Pembayaran: {$paymentMethod}\n";
                $message .= "Metode Pengiriman: {$shippingMethod}\n";
                $message .= "----------------------------------\n";
                $message .= $itemDetails;
                $message .= "----------------------------------\n";
                $message .= "_Subtotal: Rp{$subtotalFormatted}_\n";
                $message .= "_Ongkos Kirim: Rp{$shippingCostFormatted}_\n";
                $message .= "*Grand Total: Rp{$grandTotalFormatted}*\n\n";
                $message .= "Pesanan Anda sedang kami proses. Terima kasih telah menunggu!";
            } elseif ($newStatus === 'shipped' && $oldStatus !== 'shipped') {
                $message = "Pesanan Anda *{$order->order_code}* sudah selesai diproses dan sedang dalam pengiriman!\n\nMohon konfirmasi penerimaan di halaman 'Riwayat Pesanan' di website setelah pesanan tiba. Terima kasih!";
            }

            if ($message) {
                $result = $whatsappService->sendMessage($customerNumber, $message);
                Log::info("WhatsApp sent to {$customerNumber} with status {$newStatus}: " . ($result ? 'SUCCESS' : 'FAILED'));
            }
        }

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
