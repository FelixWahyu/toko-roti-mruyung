@extends('layouts.superadmin-app')
@section('content')
    <div class="text-sm mb-4">
        <a href="{{ route('admin.units.index') }}" class="text-gray-500 hover:text-indigo-600">Daftar Kategori</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="text-gray-800 font-semibold">Edit {{ $unit->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Unit</h1>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('admin.units.update', $unit) }}" method="POST">
            @method('PATCH')
            @include('superadmin.units._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
