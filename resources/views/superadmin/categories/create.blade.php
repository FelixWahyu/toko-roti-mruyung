@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Kategori Baru</h1>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @include('superadmin.categories._form', ['submitButtonText' => 'Tambah Kategori'])
        </form>
    </div>
@endsection
