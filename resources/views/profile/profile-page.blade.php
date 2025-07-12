@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 px-4 sm:px-0">Akun Saya</h1>

            <div x-data="{ tab: 'history' }" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Navigasi Tab -->
                <div class="md:col-span-1">
                    <div class="bg-white p-4 rounded-lg shadow">
                        <ul>
                            <li>
                                <a @click.prevent="tab = 'history'" href="#"
                                    class="flex items-center px-4 py-2 text-gray-700 rounded-md"
                                    :class="{ 'bg-indigo-100 text-indigo-700': tab === 'history' }">
                                    Riwayat Pesanan
                                </a>
                            </li>
                            <li>
                                <a @click.prevent="tab = 'profile'" href="#"
                                    class="flex items-center px-4 py-2 text-gray-700 rounded-md"
                                    :class="{ 'bg-indigo-100 text-indigo-700': tab === 'profile' }">
                                    Edit Profil
                                </a>
                            </li>
                            <li>
                                <a @click.prevent="tab = 'password'" href="#"
                                    class="flex items-center px-4 py-2 text-gray-700 rounded-md"
                                    :class="{ 'bg-indigo-100 text-indigo-700': tab === 'password' }">
                                    Ganti Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Konten Tab -->
                <div class="md:col-span-2">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tab Riwayat Pesanan -->
                    <div x-show="tab === 'history'" class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Riwayat Pesanan Anda</h2>
                        <div class="space-y-4">
                            @forelse($orders as $order)
                                <div class="border rounded-lg p-4">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="font-semibold text-indigo-600">{{ $order->order_code }}</p>
                                            <p class="text-sm text-gray-500">{{ $order->created_at->format('d F Y') }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold">Rp{{ number_format($order->grand_total, 0, ',', '.') }}</p>
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full capitalize
                                            @if ($order->status == 'pending') bg-yellow-200 text-yellow-800 @endif
                                            @if ($order->status == 'paid' || $order->status == 'processing') bg-blue-200 text-blue-800 @endif
                                            @if ($order->status == 'shipped' || $order->status == 'completed') bg-green-200 text-green-800 @endif
                                            @if ($order->status == 'cancelled') bg-red-200 text-red-800 @endif
                                        ">{{ $order->status }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">Anda belum memiliki riwayat pesanan.</p>
                            @endforelse
                        </div>
                        <div class="mt-6">
                            {{ $orders->links() }}
                        </div>
                    </div>

                    <!-- Tab Edit Profil -->
                    <div x-show="tab === 'profile'" class="bg-white p-6 rounded-lg shadow" style="display: none;">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Informasi Profil</h2>
                        <form action="{{ route('profile.update.details') }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor
                                    Telepon</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('phone_number')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="address" id="address" rows="3"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">{{ old('address', $user->address) }}</textarea>
                                @error('address')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>

                    <!-- Tab Ganti Password -->
                    <div x-show="tab === 'password'" class="bg-white p-6 rounded-lg shadow" style="display: none;">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Ubah Password Anda</h2>
                        <form action="{{ route('profile.update.password') }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat
                                    Ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('current_password')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
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
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Ubah Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
