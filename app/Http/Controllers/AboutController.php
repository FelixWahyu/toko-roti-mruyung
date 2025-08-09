<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $newProducts = Product::latest()->take(8)->get();

        return view('about-page', compact('newProducts'));
    }
}
