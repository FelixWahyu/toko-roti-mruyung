<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->paginate(5); // Ambil 5 pesanan terakhir

        return view('profile.profile-page', compact('user', 'orders'));
    }

    /**
     * Memperbarui detail informasi pengguna.
     */
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
        ]);

        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone_number' => $request->phone_number,
        //     'address' => $request->address,
        //     'profile_picture' => $request->profile_picture,
        // ]);

        $data = $request->only('name', 'username', 'email', 'phone_number', 'address');

        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            // Simpan foto baru dan simpan path-nya
            $data['profile_picture'] = $request->file('profile_picture')->store('profile-picture', 'public');
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Memperbarui password pengguna.
     */
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
        // Keamanan: Pastikan user hanya bisa melihat pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        // Eager load relasi item dan produk untuk efisiensi query
        $order->load('items.product');

        return view('profile.show-order', compact('order'));
    }

    public function showPaymentForm(Order $order)
    {
        // Pastikan user hanya bisa mengakses form untuk pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        // BARU: Ambil semua data rekening toko
        $storeAccounts = BankAccount::all();

        return view('profile.payment', compact('order', 'storeAccounts'));
    }

    public function storePayment(Request $request, Order $order)
    {
        // ... (logika method ini tidak berubah)
        // Pastikan user hanya bisa mengupload untuk pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hapus bukti pembayaran lama jika ada
        if ($order->payment_proof) {
            Storage::disk('public')->delete($order->payment_proof);
        }

        // Simpan file baru
        $path = $request->file('payment_proof')->store('payments', 'public');

        // Update pesanan
        $order->update([
            'payment_proof' => $path,
            'status' => 'paid', // Langsung ubah status menjadi 'paid'
        ]);

        return redirect()->route('profile.index')->with('success', 'Bukti pembayaran berhasil diunggah. Pesanan Anda akan segera kami proses.');
    }

    public function cancelOrder(Order $order)
    {
        // Pastikan user hanya bisa membatalkan pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        // Pelanggan hanya bisa membatalkan jika statusnya 'pending' atau 'paid' (belum diproses)
        if (!in_array($order->status, ['pending', 'paid'])) {
            return back()->with('error', 'Pesanan yang sudah diproses tidak dapat dibatalkan.');
        }

        // Kembalikan stok untuk setiap item
        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        // Ubah status pesanan menjadi 'cancelled'
        $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Pesanan Anda berhasil dibatalkan.');
    }
}
