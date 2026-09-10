@extends('layouts.app')

@section('title', $product->name)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($product->description ?? 'Beli ' . $product->name . ' lezat dan berkualitas di Toko Roti Mruyung Banyumas.'), 155))
@section('og_image', asset('storage/' . $product->image))
@section('og_type', 'product')

@section('content')
    <div class="bg-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-sm mb-6">
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-amber-600">Produk</a>
                <span class="mx-2 text-gray-400">></span>
                <span class="text-gray-800 font-semibold">{{ $product->name }}</span>
            </div>

            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div x-data="{ mainImage: '{{ asset('storage/' . $product->image) }}' }">
                        <div class="h-80 md:h-full rounded-lg bg-gray-100 mb-4 relative overflow-hidden shadow-sm">
                            <img class="w-full h-full object-cover transition-transform duration-300 ease-in-out"
                                :src="mainImage" alt="{{ $product->name }}"
                                fetchpriority="high">

                            @if ($product->created_at->diffInDays(now()) <= 5)
                                <div
                                    class="absolute top-3 left-3 bg-amber-600 text-white text-xs font-bold px-2.5 py-1 rounded-lg shadow-md">
                                    BARU
                                </div>
                            @endif
                        </div>
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
                            class="text-amber-600 font-bold text-3xl">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <!-- <span class="text-gray-500 text-base ml-2">/ {{ $product->unit->name }}</span> -->
                    </div>

                    <div class="mb-6">
                        <span class="font-bold text-gray-700">Stok Siap</span>
                        @if ($product->stock > 0)
                            <span class="text-amber-600 font-semibold ml-2">{{ $product->stock }}</span>
                        @else
                            <span class="text-red-600 font-semibold ml-2">Stok Habis</span>
                        @endif
                    </div>

                    <div class="prose max-w-none text-gray-800 mb-12">
                        <h3 class="text-lg font-semibold text-gray-800 border-t pt-2">Deskripsi Produk</h3>
                        <div class="product-description mt-4 text-gray-700 leading-relaxed text-sm sm:text-base">
                            {!! $product->description !!}
                        </div>
                    </div>

                    @php
                        $waPhone = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $globalSettings['store_contact']->value ?? ''));
                        $waText = urlencode("Halo Toko Roti Mruyung, saya mau pesan produk " . $product->name . "\n" . url()->current());
                    @endphp

                    @if ($product->stock > 0)
                        <!-- <form action="{{ route('cart.store', $product) }}" method="POST" class="mt-24">
                            @csrf
                            <button type="submit"
                                class="w-full bg-brown-500 border border-transparent rounded-lg py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400 transition-colors">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Tambah ke Keranjang</span>
                            </button>
                        </form> -->
                        <div class="text-base text-gray-900 font-semibold mb-1">Pemesanan dapat melalui :</div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank" rel="noopener noreferrer"
                                class="flex-1 bg-[#25D366] hover:bg-[#20ba5a] text-white border border-transparent rounded-md py-2.5 px-6 flex items-center justify-center gap-2 text-base font-semibold shadow-sm transition-all duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                                <span>Pesan WhatsApp</span>
                            </a>
                            @if ($product->shopee_link)
                                <a href="{{ $product->shopee_link }}" target="_blank" rel="noopener noreferrer"
                                    class="flex-1 bg-brown-500 border border-transparent rounded-md py-2.5 px-6 flex items-center justify-center gap-2 text-base font-semibold text-white hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span>Beli di Shopee</span>
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank" rel="noopener noreferrer"
                                class="flex-1 bg-[#25D366] hover:bg-[#20ba5a] text-white border border-transparent rounded-md py-2.5 px-6 flex items-center justify-center gap-2 text-base font-semibold shadow-sm transition-all duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                                <span>Tanya via WhatsApp</span>
                            </a>
                            <div
                                class="flex-1 bg-gray-400 border border-transparent rounded-md py-2.5 px-6 flex items-center justify-center text-base font-semibold text-white cursor-not-allowed">
                                Stok Habis
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-description p { margin-bottom: 0.75rem; }
        .product-description p:last-child { margin-bottom: 0; }
        .product-description strong, .product-description b { font-weight: 700; color: #1f2937; }
        .product-description em, .product-description i { font-style: italic; }
        .product-description u { text-decoration: underline; }
        .product-description s, .product-description strike { text-decoration: line-through; }
        .product-description ul { list-style-type: disc; padding-left: 1.25rem; margin-bottom: 0.75rem; }
        .product-description ol { list-style-type: decimal; padding-left: 1.25rem; margin-bottom: 0.75rem; }
        .product-description li { margin-bottom: 0.25rem; }
        .product-description h2 { font-size: 1.25rem; font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; color: #111827; }
        .product-description h3 { font-size: 1.1rem; font-weight: 600; margin-top: 0.75rem; margin-bottom: 0.5rem; color: #1f2937; }
    </style>
@endsection
