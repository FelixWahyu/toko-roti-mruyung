@extends('layouts.superadmin-app')
@section('content')
    <div class="text-sm mb-4">
        <a href="{{ route('admin.categories.index') }}" class="text-gray-500 hover:text-indigo-600">Daftar Kategori</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="text-gray-800 font-semibold">Edit {{ $category->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Kategori</h1>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('superadmin.categories._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
