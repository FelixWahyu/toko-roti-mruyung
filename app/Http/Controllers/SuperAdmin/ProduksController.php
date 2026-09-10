<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ProduksController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with(['category', 'unit']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")->orWhereHas('category', function ($queryCategory) use ($search) {
                    $queryCategory->where('name', 'like', "%{$search}%");
                });
            });
        }

        $products = $query->latest()->paginate(8)->withQueryString();

        if ($request->ajax()) {
            return view('superadmin.products._table-produks', compact('products'))->render();
        }

        return view('superadmin.products.product-page', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('superadmin.products.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'shopee_link' => 'nullable|url|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products-image', 'public');
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $this->sanitizeDescription($request->description),
            'shopee_link' => $request->shopee_link,
            'image' => $imagePath,
        ]);

        Cache::forget('products_page_1');

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('superadmin.products.edit', compact('product', 'categories', 'units'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'shopee_link' => 'nullable|url|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products-image', 'public');
            $data['image'] = $imagePath;
        }

        $data['description'] = $this->sanitizeDescription($request->description);
        $data['slug'] = Str::slug($request->name);
        $product->update($data);

        Cache::forget('products_page_1');

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        Cache::forget('products_page_1');

        return back()->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Membersihkan dan mengamankan input HTML dari Rich Text Editor untuk mencegah serangan XSS.
     */
    private function sanitizeDescription(?string $content): ?string
    {
        if (empty($content)) {
            return null;
        }

        // Hanya izinkan tag format teks yang aman
        $allowedTags = ['p', 'strong', 'b', 'em', 'i', 'u', 's', 'strike', 'ul', 'ol', 'li', 'h2', 'h3', 'h4', 'br', 'span', 'blockquote'];
        $cleaned = strip_tags($content, $allowedTags);

        // Hapus atribut event handler berbahaya (seperti onclick, onerror, onload, onmouseover, dll.)
        $cleaned = preg_replace('/\s+on[a-zA-Z]+\s*=\s*(["\'])(.*?)\1/i', '', $cleaned);
        $cleaned = preg_replace('/\s+on[a-zA-Z]+\s*=[^\s>]+/i', '', $cleaned);

        // Hapus protokol pseudo javascript:
        $cleaned = preg_replace('/javascript\s*:/i', '', $cleaned);

        $cleaned = trim($cleaned);

        // Jika setelah dibersihkan tidak ada teks tersisa (hanya tag kosong seperti <p><br></p>), set null
        if (trim(strip_tags($cleaned)) === '') {
            return null;
        }

        return $cleaned;
    }
}
