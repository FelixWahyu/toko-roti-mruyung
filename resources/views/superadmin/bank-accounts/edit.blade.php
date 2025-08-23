@extends('layouts.superadmin-app')
@section('content')
    <div class="text-sm mb-4">
        <a href="{{ route('admin.store-accounts.index') }}" class="text-gray-500 hover:text-indigo-600">Daftar Rekening</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="text-gray-800 font-semibold">Edit {{ $storeAccount->bank_name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Rekening Toko</h1>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('admin.store-accounts.update', $storeAccount) }}" method="POST">
            @method('PATCH')
            @include('superadmin.bank-accounts._form', [
                'storeAccount' => $storeAccount,
                'submitButtonText' => 'Simpan Perubahan',
            ])
        </form>
    </div>
@endsection
