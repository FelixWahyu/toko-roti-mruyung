@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Pengguna Baru</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @include('superadmin.users._form', ['submitButtonText' => 'Tambah Pengguna'])
        </form>
    </div>
@endsection
