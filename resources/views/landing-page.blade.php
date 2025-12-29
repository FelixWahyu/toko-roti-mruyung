@extends('layouts.app')

@section('content')
    <div class="relative bg-gray-50 overflow-hidden h-[600px] lg:h-[100vh]">
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-black/20 z-10"></div>

            <video id="heroVideo" class="w-full h-full object-cover" muted loop autoplay playsinline
                poster="{{ asset('images/hero-background.webp') }}">
                {{-- <source src="{{ asset('videos/review-video-2025.mp4') }}" type="video/mp4"> --}}
                <img src="{{ asset('images/hero-background.webp') }}" alt="Roti Mruyung Hero"
                    class="w-full h-full object-cover">
            </video>
        </div>

        <div class="absolute inset-x-0 bottom-0 h-3/4 bg-gradient-to-t from-black via-black/50 to-transparent z-20"></div>

        <div class="relative z-30 max-w-7xl mx-auto h-full flex items-center px-4 sm:px-6 lg:px-8 pb-12 lg:pb-0">
            <div class="max-w-2xl">
                <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                    <span class="block drop-shadow-md">Kelezatan roti legendaris</span>
                    <span class="block text-amber-400 mt-2">Dilengkapi penginapan dan Kafe terbaik</span>
                </h1>

                <p class="mt-4 text-base text-gray-200 sm:mt-5 sm:text-lg md:mt-5 md:text-xl max-w-lg drop-shadow-sm">
                    Bukan sekadar tempat menginap, tapi sebuah pengalaman. Tidur nyenyak, nikmati kopi terbaik di kafe kami,
                    dan intip rahasia dapur pabrik roti legendaris kami.
                </p>

                <div class="mt-8 sm:mt-10 sm:flex sm:justify-start gap-4">
                    <div class="rounded-md shadow">
                        <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}" target="_blank"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-full text-white bg-amber-600 hover:bg-amber-500 md:py-4 md:text-lg md:px-10 transition duration-300 shadow-lg hover:shadow-amber-500/50">
                            Hubungi Kami
                        </a>
                    </div>

                    <div class="mt-3 sm:mt-0">
                        <a href="{{ route('about') }}"
                            class="w-full flex items-center justify-center px-8 py-3 border-2 border-white text-base font-bold rounded-full text-white hover:bg-white hover:text-gray-900 md:py-4 md:text-lg md:px-10 transition duration-300 backdrop-blur-sm">
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Cara Pesan Mudah</h2>
                <p class="mt-4 text-lg text-gray-500">Hanya dengan beberapa langkah mudah, pesanan Anda siap diantar.</p>
            </div>

            <div class="mt-16 flex flex-col md:flex-row items-center justify-center gap-y-12 gap-x-8">
                <div class="text-center max-w-xs">
                    <div
                        class="mx-auto h-16 w-16 flex items-center justify-center bg-brown-100 rounded-full text-brown-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">1. Pilih Produk & Checkout</h3>
                    <p class="mt-2 text-base text-gray-500">Jelajahi katalog kami, masukkan produk favorit ke keranjang,
                        dan
                        lanjutkan ke halaman checkout.</p>
                </div>

                <div class="hidden md:block text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>

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
                        Anda, lalu selesaikan transaksi serta upload bukti pembayaran.</p>
                </div>

                <div class="hidden md:block text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>

                <div class="text-center max-w-xs">
                    <div
                        class="mx-auto h-16 w-16 flex items-center justify-center bg-brown-100 rounded-full text-brown-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">3. Pesanan Diantar</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Pesanan Anda akan diproses oleh tim kami dan dapat diantar langsung ke tempat Anda.
                        Saat ini layanan pengiriman <span class="font-semibold text-brown-600">
                            hanya tersedia di wilayah area Kecamatan Banyumas</span>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Jelajahi Kategori Kami</h2>
                <p class="mt-4 text-lg text-gray-500">Temukan kelezatan yang sesuai dengan selera Anda.</p>
            </div>
            <div class="mt-12 grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" class="group block relative">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://placehold.co/400x400/e2e8f0/333?text=' . urlencode($category->name) }}"
                                alt="{{ $category->name }}"
                                class="w-full h-full object-cover object-center transform transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center rounded-lg">
                            <h3 class="text-white text-lg font-bold tracking-wider uppercase">{{ $category->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <div class="swiper promo-banner-slider rounded-lg overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($promoSlides as $slide)
                            <div class="swiper-slide bg-gray-100">
                                <a href="{{ $slide['link'] }}">
                                    <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}"
                                        class="w-full h-full max-h-[450px] object-contain">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Produk Baru Kami</h2>
                <p class="mt-4 text-lg text-gray-500">Berikut adalah produk roti terbaru yang kami buat sendiri langsung
                    dari oven.</p>
            </div>

            <div class="relative mt-12">
                <div class="swiper promo-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($newProducts as $product)
                            <div class="swiper-slide h-auto p-1 rounded-lg">
                                <div
                                    class="group relative flex flex-col bg-white rounded-lg shadow-md overflow-hidden h-full border border-gray-300">
                                    <div class="aspect-w-1 aspect-h-1 bg-gray-200 overflow-hidden relative">
                                        <img src="{{ asset('storage/' . $product->image ?? $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-cover object-center group-hover:opacity-75 transition-opacity">
                                        @if ($product->created_at->diffInDays(now()) <= 7)
                                            <div
                                                class="absolute top-2 left-2 bg-indigo-500 text-white text-xs font-bold px-2.5 py-1 rounded-full shadow-md">
                                                BARU
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-3 flex flex-col flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                <span class="absolute inset-0 z-10"></span>
                                                {{ Str::limit($product->name, 30) }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                        <div class="flex-1 flex items-end mt-2">
                                            <span
                                                class="text-brown-500 font-bold text-md">Rp{{ number_format($product->price, 0, ',', '.') }}</span><span
                                                class="text-gray-500 text-md">/{{ $product->unit->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div
                    class="promo-prev absolute top-1/2 left-1 transform -translate-y-1/2 z-10 p-2 bg-white/50 rounded-full shadow-lg cursor-pointer hover:bg-white">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                <div
                    class="promo-next absolute top-1/2 right-1 transform -translate-y-1/2 z-10 p-2 bg-white/50 rounded-full shadow-lg cursor-pointer hover:bg-white">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('heroVideo');

            const delayTime = 5000;

            if (video) {
                setTimeout(() => {
                    video.play().then(() => {
                        console.log("Video mulai berputar otomatis.");
                    }).catch((error) => {
                        console.log("Autoplay dicegah oleh browser:", error);
                    });
                }, delayTime);
            }

            const promoBannerSwiper = new Swiper('.promo-banner-slider', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
            const swiper = new Swiper('.promo-slider', {
                loop: true,
                slidesPerView: 2.2,
                spaceBetween: 12,
                centeredSlides: true,
                autoplay: {
                    delay: 10000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.promo-next',
                    prevEl: '.promo-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                        centeredSlides: false,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 24,
                        centeredSlides: false,
                    },
                },
            });
        });
    </script>
@endsection
