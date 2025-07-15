<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        $accounts = BankAccount::latest()->paginate(5);
        return view('superadmin.bank-accounts.bank-page', compact('accounts'));
    }

    public function create()
    {
        return view('superadmin.bank-accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
        ]);
        BankAccount::create($request->all());
        return redirect()->route('admin.store-accounts.index')->with('success', 'Rekening berhasil ditambahkan.');
    }

    public function edit(BankAccount $storeAccount)
    {
        return view('superadmin.bank-accounts.edit', compact('storeAccount'));
    }

    public function update(Request $request, BankAccount $storeAccount)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
        ]);
        $storeAccount->update($request->all());
        return redirect()->route('admin.store-accounts.index')->with('success', 'Rekening berhasil diperbarui.');
    }

    public function destroy(BankAccount $storeAccount)
    {
        $storeAccount->delete();
        return back()->with('success', 'Rekening berhasil dihapus.');
    }
}
