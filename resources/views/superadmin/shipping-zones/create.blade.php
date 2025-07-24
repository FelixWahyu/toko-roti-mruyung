@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Zona Pengiriman Baru</h1>
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <form action="{{ route('admin.shipping-zones.store') }}" method="POST">
            @include('superadmin.shipping-zones._form', ['submitButtonText' => 'Tambah Zona'])
        </form>
    </div>
@endsection
