@extends('layouts.app')

@section('content')
    <div class="bg-white py-8">
        <div class="mb-6 ml-6 md:ml-12">
            <a href="{{ route('products.index') }}"
                class="font-medium bg-gray-100 text-gray-600 hover:text-gray-500 hover:bg-gray-50 px-4 py-1 rounded-md"><span
                    aria-hidden="true">
                    &larr;</span> Kembali</a>
        </div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row py-3 md:py-3 shadow-md rounded-md border border-gray-200">
                <!-- Kolom Gambar Produk -->
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-200">
                        <img class="w-full rounded-lg h-full object-cover" src="{{ Storage::url($product->image) }}"
                            alt="[Gambar {{ $product->name }}]">
                    </div>
                </div>

                <!-- Kolom Detail Produk -->
                <div class="md:flex-1 mt-4 px-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 text-sm mb-4">
                        Kategori: <a href="#"
                            class="text-brown-500 hover:underline">{{ $product->category->name }}</a>
                    </p>

                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700">Harga:</span>
                            <span
                                class="text-gray-900 font-bold text-2xl">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="text-gray-500 text-sm">/ {{ $product->unit->name }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <span class="font-bold text-gray-700">Ketersediaan Stok:</span>
                        @if ($product->stock > 0)
                            <span class="text-green-600 font-semibold">{{ $product->stock }}</span>
                        @else
                            <span class="text-red-600 font-semibold">Stok Habis</span>
                        @endif
                    </div>

                    <div class="prose max-w-none text-gray-600 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Deskripsi Produk</h3>
                        <p class="mt-4">{{ $product->description }}</p>
                    </div>

                    @if ($product->stock > 0)
                        <form action="{{ route('cart.store', $product) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-[80%] mx-auto bg-brown-500 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                    </path>
                                </svg><span> ke Keranjang</span>
                            </button>
                        </form>
                    @else
                        <div
                            class="w-full bg-gray-400 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white cursor-not-allowed">
                            Stok Habis
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
