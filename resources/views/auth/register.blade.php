@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen py-12">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md border border-gray-200">
            @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                <img class="h-24 w-auto mx-auto rounded-sm" src="{{ Storage::url($globalSettings['store_logo']->value) }}"
                    alt="Logo Toko">
            @else
                <svg class="h-16 w-16 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25pc-1.5 0-1.5-.75-1.5-1.5V8.25A2.25 2.25 0 014.5 6h15a2.25 2.25 0 012.25 2.25v11.25c0 .828-.672 1.5-1.5 1.5H13.5z" />
                </svg>
            @endif
            <h2 class="text-xl font-bold mt-2 text-center text-gray-800">Registrasi Akun Baru</h2>
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
                <div x-data="{ showPassword: false }">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative mt-1">
                        <input id="password" name="password" :type="showPassword ? 'text' : 'password'" required
                            class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
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
