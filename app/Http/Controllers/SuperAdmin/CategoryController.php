<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(8);
        return view('superadmin.categories.category-page', compact('categories'));
    }

    public function create()
    {
        return view('superadmin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:categories']);
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('superadmin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255|unique:categories,name,' . $category->id]);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            // Jika ada, kembalikan dengan mesej ralat dan jangan hapus.
            return back()->with('error', 'Kategori ini tidak dapat dihapus karena masih digunakan oleh beberapa produk.');
        }

        $category->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
