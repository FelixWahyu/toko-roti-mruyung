<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(15);
        return view('superadmin.orders.order-page', compact('orders'));
    }

    /**
     * Menampilkan detail satu pesanan.
     */
    public function show(Order $order)
    {
        // Eager load relasi yang dibutuhkan
        $order->load('user', 'items.product');
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

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
