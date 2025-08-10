<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingZone;

class ShippingZoneController extends Controller
{
    public function index()
    {
        $shippingZones = ShippingZone::latest()->paginate(10);

        return view('superadmin.shipping-zones.shipping-page', compact('shippingZones'));
    }

    public function create()
    {
        return view('superadmin.shipping-zones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'district' => 'required|string|max:255|unique:shipping_zones', // Pastikan nama kecamatan unik
            'cost' => 'required|numeric|min:0',
        ]);

        ShippingZone::create($request->all());

        return redirect()->route('admin.shipping-zones.index')->with('success', 'Zona pengiriman baru berhasil ditambahkan.');
    }

    public function edit(ShippingZone $shippingZone)
    {
        return view('superadmin.shipping-zones.edit', compact('shippingZone'));
    }

    public function update(Request $request, ShippingZone $shippingZone)
    {
        $request->validate([
            'district' => 'required|string|max:255|unique:shipping_zones,district,' . $shippingZone->id, // Pastikan unik, kecuali untuk rekod ini sendiri
            'cost' => 'required|numeric|min:0',
        ]);

        $shippingZone->update($request->all());

        return redirect()->route('admin.shipping-zones.index')->with('success', 'Zona pengiriman berhasil diperbarui.');
    }

    public function destroy(ShippingZone $shippingZone)
    {
        $shippingZone->delete();

        return back()->with('success', 'Zona pengiriman berhasil dihapus.');
    }
}
