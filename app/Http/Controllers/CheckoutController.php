<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('info', 'Keranjang Anda kosong, silakan berbelanja terlebih dahulu.');
        }
        $shippingZones = ShippingZone::all();
        $settings = Setting::all()->keyBy('key');
        return view('checkout.checkout-page', compact('cartItems', 'shippingZones', 'settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_zone_id' => 'required|exists:shipping_zones,id',
            'shipping_method' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'Tidak ada item di keranjang untuk di-checkout.');
        }

        try {
            DB::beginTransaction();

            $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

            // Logik pengiraan kos penghantaran di backend
            $zone = ShippingZone::find($request->shipping_zone_id);
            $settings = Setting::all()->keyBy('key');
            $minPurchase = (float)($settings['min_purchase_free_shipping']->value ?? 0);
            $freeDistricts = explode(',', $settings['free_shipping_districts']->value ?? '');

            $shipping_cost = $zone->cost;
            if ($request->shipping_method === 'Ambil di Toko') {
                $shipping_cost = 0;
            } elseif ($minPurchase > 0 && $subtotal >= $minPurchase && in_array($zone->district, $freeDistricts)) {
                $shipping_cost = 0;
            }

            $grand_total = $subtotal + $shipping_cost;

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_code' => 'TRM-' . strtoupper(Str::random(8)),
                'total_amount' => $subtotal,
                'shipping_cost' => $shipping_cost,
                'grand_total' => $grand_total,
                'shipping_address' => $request->shipping_address,
                'shipping_method' => $request->shipping_method,
                'payment_method' => $request->payment_method,
                'shipping_zone_id' => $request->shipping_zone_id,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
                $item->product->decrement('stock', $item->quantity);
            }

            $user = Auth::user();
            if ($user->shipping_zone_id !== $request->shipping_zone_id) {
                $user->shipping_zone_id = $request->shipping_zone_id;
                $user->save();
            }

            Cart::where('user_id', Auth::id())->delete();
            DB::commit();

            // Arahkan ke halaman arahan pembayaran yang baru
            return redirect()->route('order.payment.instruction', $order);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }

    // Kaedah baru untuk halaman arahan pembayaran
    public function paymentInstruction(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(404);
        }

        $storeAccounts = collect();
        if ($order->payment_method === 'Transfer Bank') {
            $storeAccounts = BankAccount::all();
        }

        $settings = Setting::all()->keyBy('key');
        $qrisImage = $settings['store_qris_image']->value ?? null;

        return view('checkout.payment-page', compact('order', 'storeAccounts', 'qrisImage'));
    }
}
