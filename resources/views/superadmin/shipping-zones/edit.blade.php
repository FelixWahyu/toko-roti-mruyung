@extends('layouts.superadmin-app')
@section('content')
    <div class="text-sm mb-4">
        <a href="{{ route('admin.shipping-zones.index') }}" class="text-gray-500 hover:text-indigo-600">Daftar Zona
            Pengiriman</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="text-gray-800 font-semibold">Edit {{ $shippingZone->district }}</span>
    </div>
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Zona Pengiriman</h1>
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <form action="{{ route('admin.shipping-zones.update', $shippingZone) }}" method="POST">
            @method('PATCH')
            @include('superadmin.shipping-zones._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
