@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Produk Baru</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @include('superadmin.products._form', ['submitButtonText' => 'Tambah Produk'])
        </form>
    </div>
@endsection
