@extends('layouts.superadmin-app')
@section('content')
    <div class="text-xs mb-3 text-gray-500">
        <a href="{{ route('admin.categories.index') }}" class="hover:text-gray-900">Daftar Kategori</a>
        <span class="mx-1.5 text-gray-400">/</span>
        <span class="text-gray-800 font-medium">Edit {{ $category->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Edit Kategori</h1>
    <div class="bg-white p-6 rounded-sm border border-gray-200">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('superadmin.categories._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
