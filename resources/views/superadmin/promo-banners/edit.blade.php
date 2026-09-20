@extends('layouts.superadmin-app')
@section('content')
    <div class="text-xs mb-3 text-gray-500">
        <a href="{{ route('admin.promo-banners.index') }}" class="hover:text-gray-900">Daftar Banner Promo</a>
        <span class="mx-1.5 text-gray-400">/</span>
        <span class="text-gray-800 font-medium">Edit {{ $promoBanner->title }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Edit Banner Promo</h1>
    <div class="bg-white p-6 rounded-sm border border-gray-200">
        <form action="{{ route('admin.promo-banners.update', $promoBanner) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('superadmin.promo-banners._form', [
                'promoBanner' => $promoBanner,
                'submitButtonText' => 'Simpan Perubahan',
            ])
        </form>
    </div>
@endsection
