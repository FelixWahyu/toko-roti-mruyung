@extends('layouts.app')

@section('content')
    <div class="bg-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-sm mb-6">
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-indigo-600">Produk</a>
                <span class="mx-2 text-gray-400">></span>
                <span class="text-gray-800 font-semibold">{{ $product->name }}</span>
            </div>

            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div x-data="{ mainImage: '{{ asset('storage/' . $product->image) }}' }">
                        <div class="h-80 md:h-full rounded-lg bg-gray-100 mb-4 relative overflow-hidden shadow-sm">
                            <img class="w-full h-full object-cover transition-transform duration-300 ease-in-out"
                                :src="mainImage" alt="Gambar Utama Produk">

                            @if ($product->created_at->diffInDays(now()) <= 5)
                                <div
                                    class="absolute top-3 left-3 bg-indigo-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg shadow-md">
                                    BARU
                                </div>
                            @endif
                        </div>
                        {{-- Tambah imej kecil di sini jika anda mempunyai galeri --}}
                        {{-- <div class="flex -mx-2 mb-4">
                            <div class="flex-1 px-2">
                                <button @click="mainImage = 'URL_GAMBAR_1'"
                                    class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center overflow-hidden">
                                    <img src="URL_GAMBAR_1" alt="Thumbnail 1" class="h-full w-full object-cover">
                                </button>
                            </div>
                            <div class="flex-1 px-2">
                                <button @click="mainImage = 'URL_GAMBAR_2'"
                                    class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center overflow-hidden">
                                    <img src="URL_GAMBAR_2" alt="Thumbnail 2" class="h-full w-full object-cover">
                                </button>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="md:flex-1 px-4">
                    <span
                        class="inline-block bg-brown-100 text-brown-600 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">{{ $product->category->name }}</span>
                    <h2 class="text-3xl font-bold text-gray-800 my-2">{{ $product->name }}</h2>

                    <div class="flex items-baseline mb-4">
                        <span
                            class="text-gray-900 font-bold text-3xl">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-gray-500 text-base ml-2">/ {{ $product->unit->name }}</span>
                    </div>

                    <div class="mb-6">
                        <span class="font-bold text-gray-700">Tersedia:</span>
                        @if ($product->stock > 0)
                            <span class="text-green-600 font-semibold ml-2">{{ $product->stock }}</span>
                        @else
                            <span class="text-red-600 font-semibold ml-2">Stok Habis</span>
                        @endif
                    </div>

                    <div class="prose max-w-none text-gray-600 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Deskripsi Produk</h3>
                        <p class="mt-4">{{ $product->description }}</p>
                    </div>

                    @if ($product->stock > 0)
                        <form action="{{ route('cart.store', $product) }}" method="POST" class="mt-24">
                            @csrf
                            <button type="submit"
                                class="w-full bg-brown-500 border border-transparent rounded-lg py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400 transition-colors">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Tambah ke Keranjang</span>
                            </button>
                        </form>
                    @else
                        <div
                            class="w-full bg-gray-400 border border-transparent rounded-lg py-3 px-8 flex items-center justify-center text-base font-medium text-white cursor-not-allowed">
                            Stok Habis
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
