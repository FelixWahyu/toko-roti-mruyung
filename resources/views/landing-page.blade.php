@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Kelezatan Roti Hangat</span>
                            <span class="block text-brown-500">Langsung dari Oven</span>
                        </h1>
                        <p
                            class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Nikmati berbagai pilihan roti dan kue berkualitas premium yang dibuat setiap hari dengan
                            bahan-bahan terbaik. Sempurna untuk menemani momen spesial Anda.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('products.index') }}"
                                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brown-500 hover:bg-brown-600 md:py-4 md:text-lg md:px-10">
                                    Lihat Produk
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('about') }}"
                                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-brown-500 bg-brown-100 hover:bg-brown-200 md:py-4 md:text-lg md:px-10">
                                    Tentang Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                src="{{ asset('images/galery/toko-roti.webp') }}" alt="[Gambar aneka roti di atas meja kayu]">
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Cara Pesan Mudah</h2>
                <p class="mt-4 text-lg text-gray-500">Hanya dengan beberapa langkah mudah, pesanan Anda siap diantar.</p>
            </div>

            {{-- Menggunakan flexbox untuk menyusun langkah dan anak panah --}}
            <div class="mt-16 flex flex-col md:flex-row items-center justify-center gap-y-12 gap-x-8">
                <!-- Langkah 1 -->
                <div class="text-center max-w-xs">
                    <div
                        class="mx-auto h-16 w-16 flex items-center justify-center bg-brown-100 rounded-full text-brown-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">1. Pilih Produk & Checkout</h3>
                    <p class="mt-2 text-base text-gray-500">Jelajahi katalog kami, masukkan produk favorit ke keranjang, dan
                        lanjutkan ke halaman checkout.</p>
                </div>

                <!-- Anak Panah 1 (hanya kelihatan di desktop/tablet) -->
                <div class="hidden md:block text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>

                <!-- Langkah 2 -->
                <div class="text-center max-w-xs">
                    <div
                        class="mx-auto h-16 w-16 flex items-center justify-center bg-brown-100 rounded-full text-brown-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">2. Lakukan Pembayaran</h3>
                    <p class="mt-2 text-base text-gray-500">Pilih metode pengiriman dan pembayaran yang paling sesuai untuk
                        Anda, lalu selesaikan transaksi.</p>
                </div>

                <!-- Anak Panah 2 (hanya kelihatan di desktop/tablet) -->
                <div class="hidden md:block text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>

                <!-- Langkah 3 -->
                <div class="text-center max-w-xs">
                    <div
                        class="mx-auto h-16 w-16 flex items-center justify-center bg-brown-100 rounded-full text-brown-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 16.382V5.618a1 1 0 00-1.447-.894L15 7m-6 3l6-3m0 0l6 3m-6-3v10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">3. Pesanan Diantar</h3>
                    <p class="mt-2 text-base text-gray-500">Tim kami akan segera memproses pesanan Anda. Duduk santai dan
                        tunggu kelezatan tiba di depan pintu Anda.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
