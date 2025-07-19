<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('superadmin.settings.setting-page', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'store_address' => 'nullable|string',
            'store_contact' => 'nullable|string|max:50',
            'store_email' => 'nullable|string|email|max:255',
            'store_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'min_purchase_free_shipping' => 'nullable|numeric|min:0',
            'free_shipping_districts' => 'nullable|string',
        ]);

        $settingsData = $request->except('_token', 'store_logo');

        // Simpan atau perbarui pengaturan berbasis teks
        foreach ($settingsData as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Tangani upload logo jika ada file baru
        if ($request->hasFile('store_logo')) {
            // Hapus logo lama jika ada
            $oldLogoPath = Setting::where('key', 'store_logo')->first()->value ?? null;
            if ($oldLogoPath) {
                Storage::disk('public')->delete($oldLogoPath);
            }

            // Simpan logo baru dan dapatkan path-nya
            $path = $request->file('store_logo')->store('settings', 'public');

            // Simpan path logo baru ke database
            Setting::updateOrCreate(['key' => 'store_logo'], ['value' => $path]);
        }

        return back()->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
