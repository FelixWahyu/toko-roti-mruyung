<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Setting;
use App\Models\OrderItem;
use App\Models\BankAccount;
use Illuminate\Support\Str;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        // Jika keranjang kosong, redirect ke halaman produk
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('info', 'Keranjang Anda kosong, silakan berbelanja terlebih dahulu.');
        }

        $shippingZones = ShippingZone::all();
        $settings = Setting::all()->keyBy('key');

        return view('checkout.checkout-page', compact('cartItems', 'shippingZones', 'settings'));
    }

    /**
     * Menyimpan pesanan ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_zone_id' => 'required|exists:shipping_zones,id',
        ]);
        // $request->validate(['shipping_zone_id' => 'required|exists:shipping_zones,id']);

        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'Tidak ada item di keranjang untuk di-checkout.');
        }

        // Gunakan DB Transaction untuk memastikan semua query berhasil atau tidak sama sekali
        try {
            DB::beginTransaction();

            $subtotal = 0;
            foreach ($cartItems as $item) {
                // Cek stok lagi sebelum membuat pesanan
                if ($item->product->stock < $item->quantity) {
                    throw new \Exception('Stok untuk produk ' . $item->product->name . ' tidak mencukupi.');
                }
                $subtotal += $item->product->price * $item->quantity;
            }

            $zone = ShippingZone::find($request->shipping_zone_id);
            $settings = Setting::all()->keyBy('key');
            $minPurchase = $settings['min_purchase_free_shipping']->value ?? 0;
            $freeDistricts = explode(',', $settings['free_shipping_districts']->value ?? '');

            $shipping_cost = $zone->cost;
            if ($minPurchase > 0 && $subtotal >= $minPurchase && in_array($zone->district, $freeDistricts)) {
                $shipping_cost = 0;
            }

            $grand_total = $subtotal + $shipping_cost;

            // 1. Buat pesanan baru (Order)
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_code' => 'TRM-' . strtoupper(Str::random(8)),
                'total_amount' => $subtotal,
                'shipping_cost' => $shipping_cost,
                'grand_total' => $grand_total,
                'shipping_address' => $request->shipping_address,
                'status' => 'pending', // Status awal pesanan
            ]);

            // 2. Pindahkan item dari keranjang ke item pesanan (Order Items)
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // 3. Kurangi stok produk
                $item->product->decrement('stock', $item->quantity);
            }

            // 4. Kosongkan keranjang pengguna
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('order.success', $order);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan halaman sukses setelah pesanan dibuat.
     */
    public function success(Order $order)
    {
        // Pastikan user hanya bisa melihat halaman sukses pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(404);
        }

        $storeAccounts = BankAccount::all();


        return view('checkout.success-page', compact('order', 'storeAccounts'));
    }
}
