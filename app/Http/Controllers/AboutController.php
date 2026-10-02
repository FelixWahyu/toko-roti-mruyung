<?php

namespace App\Http\Controllers;

use App\Models\AboutVideo;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutVideos = AboutVideo::where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('about-page', compact('aboutVideos'));
    }
}
