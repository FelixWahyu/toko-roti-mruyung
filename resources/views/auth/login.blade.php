@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md border border-gray-200">
            <h1 class="text-3xl font-bold text-center text-gray-800">
                {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}</h1>
            <h2 class="text-xl font-bold text-center text-gray-800">Login</h2>

            {{-- Menampilkan pesan error jika login gagal --}}
            {{-- @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    {{ session('error') }}
                </div>
            @endif --}}

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" required
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400"
                        value="{{ old('username') }}">
                    @error('username')
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
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-brown-500 rounded-md hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                        Login
                    </button>
                </div>
            </form>
            <p class="text-sm text-center text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}"
                    class="font-medium text-brown-500 hover:text-brown-400">Daftar di sini</a>
            </p>
        </div>
    </div>
@endsection
