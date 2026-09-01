@extends('layouts.superadmin-app')
@section('content')
    <div class="text-xs mb-3 text-gray-500">
        <a href="{{ route('admin.products.index') }}" class="hover:text-gray-900">Daftar Produk</a>
        <span class="mx-1.5 text-gray-400">/</span>
        <span class="text-gray-800 font-medium">Edit {{ $product->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Edit Produk</h1>
    <div class="bg-white p-6 rounded-sm border border-gray-200">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('superadmin.products._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
