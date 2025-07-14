@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Katalog Produk Kami</h2>
            <p class="mt-4 text-base text-gray-500">Temukan roti dan kue favorit Anda di sini. Dibuat dengan cinta setiap
                hari.</p>

            {{-- Nanti di sini kita tambahkan filter & search --}}

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @forelse ($products as $product)
                    <div class="group relative flex flex-col">
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="{{ Storage::url($product->image) }}" alt="[Gambar {{ $product->name }}]"
                                class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </a>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-md text-gray-700">
                                    <a href="{{ route('products.show', $product->slug) }}"> {{-- Nanti ini ke halaman detail produk --}}
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('cart.store', $product) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full bg-indigo-600 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">Oops! Belum ada produk yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            {{-- Navigasi Paginasi --}}
            <div class="mt-10">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
