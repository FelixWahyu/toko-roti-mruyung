@extends('layouts.superadmin-app')
@section('content')
    <div class="text-xs mb-3 text-gray-500">
        <a href="{{ route('admin.dashboard.index') }}" class="hover:text-gray-900">Dashboard</a>
        <span class="mx-1.5 text-gray-400">/</span>
        <span class="text-gray-800 font-medium">{{ auth()->user()->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Profil Saya</h1>
    <div class="bg-white p-6 rounded-sm max-w-2xl border border-gray-200">
        @if (auth()->user()->profile_picture)
            <form action="{{ route('admin.profile.photo.destroy') }}" method="POST" class="flex justify-end mb-4">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="flex items-center space-x-1 text-xs py-1.5 px-3 rounded-sm text-red-600 bg-white border border-gray-200 hover:bg-red-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="size-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    <span>Hapus Foto</span>
                </button>
            </form>
        @endif
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Foto Profil</label>
                    <div class="mt-2 flex items-center space-x-4">
                        @if (auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto Profil"
                                class="h-16 w-16 rounded-sm object-cover border border-gray-200">
                        @else
                            <span class="inline-flex h-16 w-16 rounded-sm overflow-hidden bg-gray-100 items-center justify-center text-gray-400 border border-gray-200">
                                <svg class="h-8 w-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        @endif
                        <input type="file" name="profile_picture" id="profile_picture"
                            class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-800 hover:file:bg-gray-200">
                    </div>
                    @error('profile_picture')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                    @error('name')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username"
                        value="{{ old('username', auth()->user()->username) }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                    @error('username')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                    @error('email')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone_number" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="text" name="phone_number" id="phone_number"
                        value="{{ old('phone_number', auth()->user()->phone_number) }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                    @error('phone_number')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="border-t border-gray-100 pt-4 mt-4">
                    <p class="text-xs text-gray-500">Kosongkan password jika tidak ingin mengubahnya.</p>
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Password Baru</label>
                    <input type="password" name="password" id="password"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                    @error('password')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                </div>
            </div>
            <div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
                <button type="submit"
                    class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
