@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Pengguna</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @method('PATCH')
            @include('superadmin.users._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
