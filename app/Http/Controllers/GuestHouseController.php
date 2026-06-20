<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestHouseController extends Controller
{
    public function index()
    {
        return view("guest-house-page");
    }
}
