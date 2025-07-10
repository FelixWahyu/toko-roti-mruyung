@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profil Saya</h1>
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="border-t pt-4">
                    <p class="text-sm text-gray-500">Kosongkan password jika tidak ingin mengubahnya.</p>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password
                        Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
