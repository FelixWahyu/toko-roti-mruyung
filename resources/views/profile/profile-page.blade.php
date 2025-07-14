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
                    <!-- Tab Riwayat Pesanan -->
                    <div x-show="tab === 'history'" class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Riwayat Pesanan Anda</h2>
                        <div class="space-y-4">
                            @forelse($orders as $order)
                                <a href="{{ route('order.detail', $order) }}"
                                    class="block border rounded-lg p-4 hover:bg-gray-50 transition-colors duration-200">
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
                                    @if ($order->status == 'pending' && !$order->payment_proof)
                                        <div class="mt-4 border-t pt-4">
                                            <a href="{{ route('order.payment', $order) }}"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                Upload Bukti Bayar &rarr;
                                            </a>
                                        </div>
                                    @endif
                                    @if (in_array($order->status, ['pending', 'paid']))
                                        <form action="{{ route('order.cancel', $order) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin membatalkan pesanan ini?');"
                                            class="mt-4">
                                            @csrf
                                            <button type="submit"
                                                class="text-sm font-medium text-red-600 hover:text-red-500">
                                                Batalkan Pesanan
                                            </button>
                                        </form>
                                    @endif
                                </a>
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
                        <form action="{{ route('profile.update.details') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-4">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                                <div class="mt-2 flex items-center space-x-4">
                                    @if (auth()->user()->profile_picture)
                                        <img src="{{ Storage::url(auth()->user()->profile_picture) }}" alt="Foto Profil"
                                            class="h-16 w-16 rounded-full object-cover">
                                    @else
                                        <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100">
                                            <svg class="h-full w-full text-gray-300" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </span>
                                    @endif
                                    <input type="file" name="profile_picture" id="profile_picture"
                                        class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                </div>
                                @error('profile_picture')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="username" id="username"
                                    value="{{ old('username', $user->username) }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('username')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('email')
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
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Password
                                    Saat
                                    Ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                @error('current_password')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password
                                    Baru</label>
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
