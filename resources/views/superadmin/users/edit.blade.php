@extends('layouts.superadmin-app')
@section('content')
    <div class="text-xs mb-3 text-gray-500">
        <a href="{{ route('admin.users.index') }}" class="hover:text-gray-900">Daftar Pengguna</a>
        <span class="mx-1.5 text-gray-400">/</span>
        <span class="text-gray-800 font-medium">Edit {{ $user->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Edit Pengguna</h1>
    <div class="bg-white p-6 rounded-sm border border-gray-200">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @method('PATCH')
            @include('superadmin.users._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
