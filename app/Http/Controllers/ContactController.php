<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $settings = Setting::all()->keyBy('key');

        // Hantar e-mel ke alamat admin yang ditetapkan dalam .env
        Mail::to(config('mail.admin_email'))->send(new ContactFormMail($data, $settings));

        return back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim.');
    }
}
