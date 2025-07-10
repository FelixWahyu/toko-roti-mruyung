<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('cart.cart-page', compact('cartItems'));
    }

    /**
     * Menambahkan produk ke keranjang.
     */
    public function store(Request $request, Product $product)
    {
        // Cek apakah stok produk mencukupi
        if ($product->stock < 1) {
            return back()->with('error', 'Stok produk telah habis.');
        }

        // Cari item di keranjang user saat ini
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();

        if ($cartItem) {
            // Jika produk sudah ada di keranjang, tambahkan jumlahnya
            $cartItem->increment('quantity');
        } else {
            // Jika belum ada, buat item keranjang baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Memperbarui jumlah item di keranjang.
     */
    public function update(Request $request, Cart $cart)
    {
        // Pastikan user hanya bisa mengupdate keranjangnya sendiri
        if ($cart->user_id !== Auth::id()) {
            return back()->with('error', 'Aksi tidak diizinkan.');
        }

        $request->validate(['quantity' => 'required|integer|min:1']);

        // Cek ketersediaan stok
        if ($cart->product->stock < $request->quantity) {
            return back()->with('error', 'Stok tidak mencukupi untuk jumlah yang diminta.');
        }

        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    /**
     * Menghapus item dari keranjang.
     */
    public function destroy(Cart $cart)
    {
        // Pastikan user hanya bisa menghapus dari keranjangnya sendiri
        if ($cart->user_id !== Auth::id()) {
            return back()->with('error', 'Aksi tidak diizinkan.');
        }

        $cart->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
