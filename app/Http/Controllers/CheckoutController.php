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
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendWhatsAppNotification;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('info', 'Keranjang Anda kosong, silakan berbelanja terlebih dahulu.');
        }
        $shippingZones = ShippingZone::all();
        // $settings = Setting::all()->keyBy('key');
        return view('checkout.checkout-page', compact('cartItems', 'shippingZones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_zone_id' => 'required|exists:shipping_zones,id',
            'payment_method' => 'required|in:Transfer Bank,QRIS,COD',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'Tidak ada item di keranjang untuk di-checkout.');
        }

        try {
            DB::beginTransaction();

            $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

            $zone = ShippingZone::find($request->shipping_zone_id);
            $shipping_cost = $zone->cost;
            // $settings = Setting::all()->keyBy('key');
            // $minPurchase = (float)($settings['min_purchase_free_shipping']->value ?? 0);
            // $freeDistricts = explode(',', $settings['free_shipping_districts']->value ?? '');

            // $shipping_cost = $zone->cost;
            // if ($request->shipping_method === 'Ambil di Toko') {
            //     $shipping_cost = 0;
            // } elseif ($minPurchase > 0 && $subtotal >= $minPurchase && in_array($zone->district, $freeDistricts)) {
            //     $shipping_cost = 0;
            // }

            $grand_total = $subtotal + $shipping_cost;

            // $status = 'pending';

            // if ($request->payment_method === 'COD') {
            //     $status = 'cod-tunggu';
            // }

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_code' => 'TRM-' . strtoupper(Str::random(8)),
                'total_amount' => $subtotal,
                'shipping_cost' => $shipping_cost,
                'grand_total' => $grand_total,
                'shipping_address' => $request->shipping_address,
                'shipping_method' => 'Kurir Toko',
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

            $adminNumber = config('services.admin.whatsapp_number');
            if ($adminNumber) {
                $customerName = $order->user->name;
                $message = "*Tanggal:* {$order->created_at->format('d F Y')}\n\n"
                    . "*Pesanan Baru Masuk!*\n"
                    . "*Nama:* {$customerName}\n"
                    . "*Kode Pesanan:* {$order->order_code}\n"
                    . "*Total:* Rp " . number_format($order->grand_total, 0, ',', '.') . "\n"
                    . "*Metode Pengiriman:* {$order->shipping_method}\n"
                    . "*Metode Pembayaran:* {$order->payment_method}\n\n"
                    . "Periksa dashboard admin untuk memproses.";

                $whatsappService = new WhatsAppService();
                $whatsappService->sendMessage($adminNumber, $message);
            }

            return redirect()->route('order.payment.instruction', $order);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }

    public function paymentInstruction(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(404);
        }

        $storeAccounts = collect();
        $qrisImage = null;

        if ($order->payment_method === 'Transfer Bank') {
            $storeAccounts = BankAccount::all();
        } elseif ($order->payment_method === 'QRIS') {
            $settings = Setting::all()->keyBy('key');
            $qrisImage = $settings['store_qris_image']->value ?? null;
        }

        return view('checkout.payment-page', compact('order', 'storeAccounts', 'qrisImage'));
    }
}
