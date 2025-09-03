<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use App\Models\BankAccount;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Services\WhatsAppService;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->paginate(5);
        $shippingZones = ShippingZone::all();

        return view('profile.profile-page', compact('user', 'orders', 'shippingZones'));
    }

    public function updateDetails(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string',
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'shipping_zone_id' => 'nullable|exists:shipping_zones,id',
        ]);

        $data = $request->only('name', 'username', 'email', 'phone_number', 'address', 'shipping_zone_id');

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profile-picture', 'public');
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    public function showOrderDetail(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $order->load('items.product');

        $statusLevels = [
            'pending' => 1,
            'paid' => 2,
            'processing' => 3,
            'shipped' => 4,
            'completed' => 5,
        ];
        $currentStatusLevel = $statusLevels[$order->status] ?? 0;

        $steps = [
            'pending' => 'Pending',
            'paid' => 'Dibayar',
            'processing' => 'Diproses',
            'shipped' => 'Dikirim',
            'completed' => 'Selesai',
        ];
        $currentStatus = array_search($order->status, array_keys($steps));

        return view('profile.show-order', compact('order', 'currentStatusLevel', 'currentStatus', 'steps'));
    }

    public function showPaymentForm(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $storeAccounts = BankAccount::all();
        $settings = Setting::all()->keyBy('key');
        $qrisImage = $settings['store_qris_image']->value ?? null;

        return view('profile.payment', compact('order', 'storeAccounts', 'qrisImage'));
    }

    public function storePayment(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($order->payment_proof) {
            Storage::disk('public')->delete($order->payment_proof);
        }

        $path = $request->file('payment_proof')->store('payments', 'public');

        $order->update([
            'payment_proof' => $path,
            'status' => 'paid',
        ]);

        return redirect()->route('profile.index')->with('success', 'Bukti pembayaran berhasil diunggah. Pesanan Anda akan segera kami proses.');
    }

    public function confirmReceipt(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        if ($order->status !== 'shipped') {
            return back()->with('error', 'Hanya pesanan yang telah dikirim yang dapat dikonfirmasi.');
        }

        $order->update(['status' => 'completed']);

        $this->notifyAdmin($order, 'receipt_confirmed');

        return back()->with('success', 'Terima kasih telah mengonfirmasi pesanan Anda!');
    }

    public function cancelOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        if (!in_array($order->status, ['pending', 'paid'])) {
            return back()->with('error', 'Pesanan yang sudah diproses tidak dapat dibatalkan.');
        }

        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        $order->update(['status' => 'cancelled']);

        $this->notifyAdmin($order, 'order_cancelled');

        return back()->with('success', 'Pesanan Anda berhasil dibatalkan.');
    }

    public function destroyPhoto(Request $request)
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return back()->with('success', 'Foto profil berhasil dihapus.');
    }

    private function notifyAdmin(Order $order, string $type)
    {
        $adminNumber = config('services.admin.whatsapp_number');
        if (!$adminNumber) {
            return;
        }

        $customerName = $order->user->name;
        $message = '';

        if ($type === 'receipt_confirmed') {
            $message = "*Pesanan telah dikonfirmasi oleh Pelanggan*\n\nPesanan *{$order->order_code}* dari pelanggan *{$customerName}* telah ditandai sebagai *Selesai*.";
        } elseif ($type === 'order_cancelled') {
            $message = "*Pesanan telah dibatalkan oleh Pelanggan*\n\nPesanan *{$order->order_code}* dari pelanggan *{$customerName}* telah *Dibatalkan*. Stok produk telah dikembalikan secara otomatis.";
        }

        if ($message) {
            $whatsappService = new WhatsAppService();
            $whatsappService->sendMessage($adminNumber, $message);
        }
    }
}
