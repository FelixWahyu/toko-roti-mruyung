@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Keranjang Belanja Anda</h1>

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
                                                    class="w-16 p-1 border border-gray-300 rounded-md text-center">
                                                <button type="submit"
                                                    class="ml-2 flex items-center p-1 rounded-md bg-indigo-100 text-indigo-600 hover:bg-indigo-200 font-medium">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                    Update</button>
                                            </form>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST"
                                                onsubmit="showConfirmation(event, 'Hapus Item?', 'Anda yakin ingin menghapus item ini dari keranjang?', 'Ya, Hapus!')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center p-1 rounded-md font-medium bg-red-100 text-red-600 hover:bg-red-200"><svg
                                                        class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Hapus</button>
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
                                class="w-full flex items-center justify-center rounded-md border border-transparent bg-brown-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-brown-600">
                                Lanjut ke Checkout
                            </a>
                        </div>
                        <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                            <p>atau <a href="{{ route('products.index') }}"
                                    class="font-medium text-brown-500 hover:text-brown-400"> Lanjut Belanja<span
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
                            class="text-base font-medium text-white bg-brown-500 hover:bg-brown-600 rounded-md px-6 py-3">
                            Mulai Belanja
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
