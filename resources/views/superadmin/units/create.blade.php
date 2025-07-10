@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Unit Baru</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.units.store') }}" method="POST">
            @include('superadmin.units._form', ['submitButtonText' => 'Tambah Unit'])
        </form>
    </div>
@endsection
