@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen py-12">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md border border-gray-200">
            <h1 class="text-3xl font-bold text-center text-gray-800">
                {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}</h1>
            <h2 class="text-xl font-bold text-center text-gray-800">Registrasi Akun Baru</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" required value="{{ old('username') }}"
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                    @error('username')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-brown-500 rounded-md hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                        Daftar
                    </button>
                </div>
            </form>
            <p class="text-sm text-center text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}"
                    class="font-medium text-brown-500 hover:text-brown-400">Login di sini</a>
            </p>
        </div>
    </div>
@endsection
