<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil semua setting dan ubah menjadi format yang mudah diakses di view
        $settings = Setting::all()->keyBy('key');
        return view('superadmin.settings.setting-page', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'store_address' => 'nullable|string',
            'store_contact' => 'nullable|string|max:50',
            // Validasi untuk logo bisa ditambahkan jika perlu
        ]);

        $settings = $request->except('_token');

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
