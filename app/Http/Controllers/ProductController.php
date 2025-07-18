<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Logik penapis yang sama dipindahkan ke kaedah persendirian
        $products = $this->getFilteredProducts($request);

        return view('produks.produk-page', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $request->input('category'),
            'selectedSort' => $request->input('sort_by'),
            'searchTerm' => $request->input('search'),
        ]);
    }

    public function filterProducts(Request $request)
    {
        $products = $this->getFilteredProducts($request);

        // FIX: Tetapkan path paginasi secara eksplisit untuk permintaan AJAX
        // Ini memastikan pautan paginasi sentiasa betul.
        $products->withPath(route('products.index'));

        // Kembalikan hanya partial view
        return view('produks._produk-list', compact('products'))->render();
    }


    // BARU: Kaedah persendirian untuk logik penapis yang boleh diguna semula
    private function getFilteredProducts(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->input('search')}%");
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('sort_by')) {
            $sortBy = $request->input('sort_by');
            if ($sortBy === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($sortBy === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        return $query->latest()->paginate(8)->withQueryString();
    }

    public function show(Product $product)
    {
        // Eager load relasi kategori dan unit
        $product->load(['category', 'unit']);

        return view('produks.show-produk', compact('product'));
    }
}
