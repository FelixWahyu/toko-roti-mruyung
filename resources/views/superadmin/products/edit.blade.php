@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Produk</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('superadmin.products._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
