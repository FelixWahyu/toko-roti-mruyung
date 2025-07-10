<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->paginate(8);
        return view('superadmin.units.unit-page', compact('units'));
    }

    public function create()
    {
        return view('superadmin.units.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:units']);
        Unit::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.units.index')->with('success', 'Unit berhasil ditambahkan.');
    }

    public function edit(Unit $unit)
    {
        return view('superadmin.units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate(['name' => 'required|string|max:255|unique:units,name,' . $unit->id]);
        $unit->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.units.index')->with('success', 'Unit berhasil diperbarui.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return back()->with('success', 'Unit berhasil dihapus.');
    }
}
