@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Rekening Baru</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.store-accounts.store') }}" method="POST">
            @include('superadmin.bank-accounts._form', ['submitButtonText' => 'Tambah Rekening'])
        </form>
    </div>
@endsection
