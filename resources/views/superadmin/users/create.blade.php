@extends('layouts.superadmin-app')
@section('content')
    <div class="text-sm mb-4">
        <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-indigo-600">Daftar Pengguna</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="text-gray-800 font-semibold">Tambah Pengguna</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Pengguna Baru</h1>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @include('superadmin.users._form', ['submitButtonText' => 'Tambah Pengguna'])
        </form>
    </div>
@endsection
