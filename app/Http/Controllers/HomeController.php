<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::latest()->take(8)->get();

        $categories = Category::all();

        $promoSlides = [
            ['image' => asset('images/promo/promo1.jpg'), 'link' => '#', 'alt' => 'Promo Diskon Lebaran'],
            ['image' => asset('images/promo/promo2.jpg'), 'link' => '#', 'alt' => 'Promo Gratis Ongkir'],
            ['image' => asset('images/promo/promo3.jpg'), 'link' => '#', 'alt' => 'Promo Beli 1 Gratis 1'],
            ['image' => asset('images/promo/promo4.jpg'), 'link' => '#', 'alt' => 'Promo Potongan Harga']
        ];

        return view('landing-page', compact('newProducts', 'categories', 'promoSlides'));
    }
}
