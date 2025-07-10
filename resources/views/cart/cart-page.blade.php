@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Keranjang Belanja Anda</h1>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($cartItems->count() > 0)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <ul role="list" class="divide-y divide-gray-200">
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                            @php $total += $item->product->price * $item->quantity; @endphp
                            <li class="p-4 sm:p-6">
                                <div class="flex items-center sm:items-start">
                                    <div
                                        class="flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24 rounded-md overflow-hidden bg-gray-200">
                                        {{-- FIX: Menggunakan Storage::url() untuk mendapatkan URL publik --}}
                                        <img src="{{ Storage::url($item->product->image) }}"
                                            alt="[Gambar {{ $item->product->name }}]"
                                            class="w-full h-full object-cover object-center">
                                    </div>
                                    <div class="ml-4 flex-1 flex flex-col">
                                        <div>
                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                <h3><a href="#">{{ $item->product->name }}</a></h3>
                                                <p class="ml-4">
                                                    Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Rp{{ number_format($item->product->price, 0, ',', '.') }} / item</p>
                                        </div>
                                        <div class="flex-1 flex items-end justify-between text-sm mt-4">
                                            <!-- Form Update Kuantitas -->
                                            <form action="{{ route('cart.update', $item) }}" method="POST"
                                                class="flex items-center">
                                                @csrf
                                                @method('PATCH')
                                                <label for="quantity-{{ $item->id }}"
                                                    class="mr-2 text-gray-500">Qty:</label>
                                                <input type="number" id="quantity-{{ $item->id }}" name="quantity"
                                                    value="{{ $item->quantity }}" min="1"
                                                    class="w-16 border-gray-300 rounded-md text-center">
                                                <button type="submit"
                                                    class="ml-2 text-indigo-600 hover:text-indigo-500 font-medium">Update</button>
                                            </form>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-600 hover:text-red-500">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Total Belanja -->
                    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Subtotal</p>
                            <p>Rp{{ number_format($total, 0, ',', '.') }}</p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Ongkos kirim akan dihitung saat checkout.</p>
                        <div class="mt-6">
                            <a href="{{ route('checkout.index') }}"
                                class="w-full flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">
                                Lanjut ke Checkout
                            </a>
                        </div>
                        <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                            <p>atau <a href="{{ route('products.index') }}"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"> Lanjut Belanja<span
                                        aria-hidden="true"> &rarr;</span></a></p>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-medium text-gray-900">Keranjang Anda masih kosong.</h2>
                    <p class="mt-2 text-gray-500">Yuk, cari produk favoritmu!</p>
                    <div class="mt-6">
                        <a href="{{ route('products.index') }}"
                            class="text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md px-6 py-3">
                            Mulai Belanja
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
