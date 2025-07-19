<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingZone;

class ShippingZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data zona pengiriman, urutkan dari yang terbaru, dan gunakan paginasi
        $shippingZones = ShippingZone::latest()->paginate(10);

        // Hantar data ke view index
        return view('superadmin.shipping-zones.shipping-page', compact('shippingZones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Hanya paparkan borang untuk mencipta data baru
        return view('superadmin.shipping-zones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari borang
        $request->validate([
            'district' => 'required|string|max:255|unique:shipping_zones', // Pastikan nama kecamatan unik
            'cost' => 'required|numeric|min:0',
        ]);

        // Cipta rekod baru di dalam pangkalan data
        ShippingZone::create($request->all());

        // Arahkan kembali ke halaman index dengan mesej kejayaan
        return redirect()->route('admin.shipping-zones.index')->with('success', 'Zona pengiriman baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingZone $shippingZone)
    {
        // Hantar data zona yang dipilih ke borang edit
        return view('superadmin.shipping-zones.edit', compact('shippingZone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingZone $shippingZone)
    {
        // Validasi input dari borang edit
        $request->validate([
            'district' => 'required|string|max:255|unique:shipping_zones,district,' . $shippingZone->id, // Pastikan unik, kecuali untuk rekod ini sendiri
            'cost' => 'required|numeric|min:0',
        ]);

        // Kemas kini rekod sedia ada
        $shippingZone->update($request->all());

        // Arahkan kembali ke halaman index dengan mesej kejayaan
        return redirect()->route('admin.shipping-zones.index')->with('success', 'Zona pengiriman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingZone $shippingZone)
    {
        // Hapus rekod dari pangkalan data
        $shippingZone->delete();

        // Arahkan kembali ke halaman sebelumnya dengan mesej kejayaan
        return back()->with('success', 'Zona pengiriman berhasil dihapus.');
    }
}
