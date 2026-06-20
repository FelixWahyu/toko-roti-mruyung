<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        $menuSlides = [
            ['image' => asset('images/image-sliding/foto10.jpg'), 'link' => '#', 'alt' => 'Promo Diskon Lebaran'],
            ['image' => asset('images/image-sliding/foto11.jpg'), 'link' => '#', 'alt' => 'Promo Gratis Ongkir'],
            ['image' => asset('images/image-sliding/foto12.jpg'), 'link' => '#', 'alt' => 'Promo Beli 1 Gratis 1'],
            ['image' => asset('images/image-sliding/foto13.jpg'), 'link' => '#', 'alt' => 'Promo Potongan Harga']
        ];

        return view("cafe-page", compact('menuSlides'));
    }
}
