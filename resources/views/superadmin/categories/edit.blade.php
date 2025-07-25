@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Kategori</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @method('PATCH')
            @include('superadmin.categories._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
