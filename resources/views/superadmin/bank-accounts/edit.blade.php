@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Rekening Toko</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.store-accounts.update', $storeAccount) }}" method="POST">
            @method('PATCH')
            @include('superadmin.bank-accounts._form', [
                'storeAccount' => $storeAccount,
                'submitButtonText' => 'Simpan Perubahan',
            ])
        </form>
    </div>
@endsection
