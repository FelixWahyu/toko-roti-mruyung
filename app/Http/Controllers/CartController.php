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

    public function store(Request $request, Product $product)
    {
        if ($product->stock < 1) {
            return back()->with('error', 'Stok produk telah habis.');
        }

        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();

        if ($cartItem) {
            if ($cartItem->quantity + 1 > $product->stock) {
                return back()->with('error', 'Stok tidak mencukupi.');
            }
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function updateQuantity(Request $request, Cart $item)
    {
        if ($item->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $request->validate(['quantity' => 'required|integer']);
        $newQuantity = $request->input('quantity');
        $product = $item->product;

        if ($newQuantity > $product->stock) {
            return response()->json([
                'success' => false,
                'message' => "Stok tidak mencukupi. Tersedia {$product->stock}.",
                'allowedQuantity' => $product->stock,
                'newSubtotal' => $product->price * $item->quantity,
            ], 422);
        }

        if ($newQuantity <= 0) {
            $item->delete();
            return response()->json(['success' => true, 'message' => 'Item dihapus.']);
        } else {
            $item->update(['quantity' => $newQuantity]);
            return response()->json([
                'success' => true,
                'message' => 'Kuantitas diperbarui.',
                'newQuantity' => $item->quantity,
                'newSubtotal' => $item->product->price * $item->quantity
            ]);
        }
    }

    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            return back()->with('error', 'Aksi tidak diizinkan.');
        }

        $cart->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
