<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PromoBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoBannerController extends Controller
{
    public function index()
    {
        $banners = PromoBanner::orderBy('order', 'asc')->latest()->paginate(10);
        return view('superadmin.promo-banners.banner-page', compact('banners'));
    }

    public function create()
    {
        return view('superadmin.promo-banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $imagePath = $request->file('image')->store('promo-banners', 'public');

        PromoBanner::create([
            'title' => $request->title,
            'image' => $imagePath,
            'link' => $request->link ?: '#',
            'is_active' => $request->boolean('is_active', true),
            'order' => $request->filled('order') ? (int) $request->order : 0,
        ]);

        return redirect()->route('admin.promo-banners.index')->with('success', 'Banner promo berhasil ditambahkan.');
    }

    public function edit(PromoBanner $promoBanner)
    {
        return view('superadmin.promo-banners.edit', compact('promoBanner'));
    }

    public function update(Request $request, PromoBanner $promoBanner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title' => $request->title,
            'link' => $request->link ?: '#',
            'is_active' => $request->boolean('is_active', false),
            'order' => $request->filled('order') ? (int) $request->order : 0,
        ];

        if ($request->hasFile('image')) {
            if ($promoBanner->image && !str_starts_with($promoBanner->image, 'images/')) {
                Storage::disk('public')->delete($promoBanner->image);
            }
            $data['image'] = $request->file('image')->store('promo-banners', 'public');
        }

        $promoBanner->update($data);

        return redirect()->route('admin.promo-banners.index')->with('success', 'Banner promo berhasil diperbarui.');
    }

    public function destroy(PromoBanner $promoBanner)
    {
        if ($promoBanner->image && !str_starts_with($promoBanner->image, 'images/')) {
            Storage::disk('public')->delete($promoBanner->image);
        }

        $promoBanner->delete();
        return back()->with('success', 'Banner promo berhasil dihapus.');
    }
}
