@extends('layouts.superadmin-app')
@section('content')
    <div class="text-sm mb-4">
        <a href="{{ route('admin.dashboard.index') }}" class="text-gray-500 hover:text-indigo-600">Dashboard</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="text-gray-800 font-semibold">{{ auth()->user()->name }}</span>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profil Saya</h1>
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl border border-gray-200">
        @if (auth()->user()->profile_picture)
            <form action="{{ route('admin.profile.photo.destroy') }}" method="POST" class="flex justify-end">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="flex items-center text-xs py-2 px-3 rounded-lg text-red-600 bg-red-100 hover:bg-red-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    Hapus Foto</button>
            </form>
        @endif
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                    <div class="mt-2 flex items-center space-x-4">
                        @if (auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto Profil"
                                class="h-16 w-16 rounded-full object-cover">
                        @else
                            <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        @endif
                        <input type="file" name="profile_picture" id="profile_picture"
                            class="text-sm p-1 border rounded-lg text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>
                    @error('profile_picture')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username"
                        value="{{ old('username', auth()->user()->username) }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                    @error('username')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor
                        Telepon</label>
                    <input type="text" name="phone_number" id="phone_number"
                        value="{{ old('phone_number', auth()->user()->phone_number) }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                    @error('phone_number')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="border-t pt-4">
                    <p class="text-sm text-gray-500">Kosongkan password jika tidak ingin mengubahnya.</p>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password
                        Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
