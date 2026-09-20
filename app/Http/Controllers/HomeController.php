<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\PromoBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::latest()->take(8)->get();

        $categories = Category::all();

        $promoBanners = PromoBanner::where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('landing-page', compact('newProducts', 'categories', 'promoBanners'));
    }
}
