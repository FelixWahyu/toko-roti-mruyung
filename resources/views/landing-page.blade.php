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

    <div class="bg-white py-16 lg:py-24 relative z-10 -mt-4 lg:-mt-8 rounded-t-3xl shadow-inner">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-base font-semibold text-amber-600 tracking-wide uppercase">Layanan & Fasilitas Kami</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Satu Tempat, Tiga Pengalaman
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Kami menghadirkan kualitas terbaik dalam setiap layanan untuk kepuasan Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div
                    class="flex flex-col bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border border-gray-100">
                    <div class="h-56 w-full relative overflow-hidden group">
                        <img src="{{ asset('images/galery/toko-roti-mruyung-night.webp') }}" alt="Toko Roti"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute top-4 right-4 bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                            Legendary
                        </div>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Bakery & Roti</h3>
                            <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                Nikmati aneka roti manis, kue, dan pastry yang dibuat segar setiap hari dengan resep
                                legendaris. Cocok untuk oleh-oleh atau camilan harian.
                            </p>
                        </div>
                        <div class="mt-6 flex items-center gap-3">
                            <a href="{{ route('products.index') }}"
                                class="flex-1 bg-amber-50 text-amber-700 hover:bg-amber-100 border border-amber-200 py-2 rounded-lg text-center text-sm font-semibold transition">
                                Katalog Menu
                            </a>
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo%20Roti%20Mruyung,%20saya%20mau%20pesan%20roti"
                                target="_blank"
                                class="flex-1 bg-amber-600 text-white hover:bg-amber-700 py-2 rounded-lg text-center text-sm font-semibold transition shadow-md">
                                Pesan WA
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-col bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border border-gray-100">
                    <div class="h-56 w-full relative overflow-hidden group">
                        <img src="{{ asset('images/guest-house/tempat-tidur.webp') }}" alt="Guest House"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                            24 Jam
                        </div>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Guest House</h3>
                            <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                Penginapan nyaman serasa di rumah sendiri dengan fasilitas lengkap (AC, Wifi, Parkir).
                                Lokasi strategis dan suasana tenang untuk istirahat Anda.
                            </p>
                        </div>
                        <div class="mt-6 flex items-center gap-3">
                            <a href="{{ route('guesthouse.index') }}"
                                class="flex-1 bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-200 py-2 rounded-lg text-center text-sm font-semibold transition">
                                Cek Fasilitas
                            </a>
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20booking%20kamar%20Guest%20House"
                                target="_blank"
                                class="flex-1 bg-blue-600 text-white hover:bg-blue-700 py-2 rounded-lg text-center text-sm font-semibold transition shadow-md">
                                Booking
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-col bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border border-gray-100">
                    <div class="h-56 w-full relative overflow-hidden group">
                        <img src="{{ asset('images/galery/cofe-minuman.webp') }}" alt="Cafe & Resto"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute top-4 right-4 bg-brown-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                            Cozy
                        </div>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Cafe & Resto</h3>
                            <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                Tempat nongkrong asik dengan pilihan kopi terbaik dan makanan lezat. Suasana cozy, cocok
                                untuk kerja (WFC) atau kumpul bareng teman.
                            </p>
                        </div>
                        <div class="mt-6 flex items-center gap-3">
                            <a href="{{ route('cafe.index') }}"
                                class="flex-1 bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-200 py-2 rounded-lg text-center text-sm font-semibold transition">
                                Lihat Menu
                            </a>
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20reservasi%20meja%20di%20Cafe"
                                target="_blank"
                                class="flex-1 bg-brown-600 text-white hover:bg-brown-700 py-2 rounded-lg text-center text-sm font-semibold transition shadow-md">
                                Reservasi
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-white pb-16 pt-4">
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

    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-amber-600 font-semibold tracking-wider uppercase text-sm">Our Collections</span>
                <h2 class="mt-2 text-4xl font-extrabold text-gray-900 font-serif sm:text-5xl">
                    Jelajahi Dunia Rasa Kami
                </h2>
                <p class="mt-4 text-xl text-gray-500 font-light">
                    Dari kehangatan oven roti hingga aroma kopi terbaik, temukan favorit Anda di sini.
                </p>
            </div>

            <div class="mb-20">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                            </svg>
                            Bakery & Pastry
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">Kelezaatan hangat langsung dari oven.</p>
                    </div>
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-amber-50 text-amber-700 font-medium hover:bg-amber-100 rounded-full transition">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->id]) }}"
                            class="group relative block h-64 sm:h-80 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://placehold.co/400x400/e2e8f0/333?text=' . urlencode($category->name) }}"
                                alt="{{ $category->name }}"
                                class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                            </div>

                            <div class="absolute bottom-0 left-0 p-6 w-full">
                                <h3
                                    class="text-xl font-bold text-white tracking-wide font-serif group-hover:text-amber-300 transition-colors">
                                    {{ $category->name }}
                                </h3>
                                <div class="h-0.5 w-12 bg-amber-500 mt-2 transition-all duration-300 group-hover:w-full">
                                </div>
                                <p
                                    class="mt-2 text-sm text-gray-300 opacity-0 transform translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 delay-75">
                                    Jelajahi Produk &rarr;
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="relative py-8">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-3 bg-white text-lg font-medium text-gray-500 italic">
                        &mdash; Cafe & Resto Experience &mdash;
                    </span>
                </div>
            </div>

            <div class="mt-12">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3" />
                            </svg>
                            Cafe & Resto
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">Teman nongkrong dan bersantai terbaik.</p>
                    </div>
                    <a href="{{ route('cafe.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-amber-50 text-amber-700 rounded-full text-sm font-medium hover:bg-amber-100 transition">
                        Lihat Menu
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <a href="{{ route('cafe.index') }}"
                        class="group relative block h-64 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('images/menus/kopi-mruyung.jpeg') }}" alt="Coffee"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <span
                                class="text-xs font-bold text-amber-400 uppercase tracking-widest mb-1 block">Minuman</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-amber-200 transition-colors">Coffee
                            </h3>
                            <p class="text-xs text-gray-300 mt-1 line-clamp-1">Jelajahi Menu</p>
                        </div>
                    </a>

                    <a href="{{ route('cafe.index') }}"
                        class="group relative block h-64 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                            alt="Non Coffee"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <span
                                class="text-xs font-bold text-amber-400 uppercase tracking-widest mb-1 block">Minuman</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-amber-200 transition-colors">
                                Non-Coffee</h3>
                            <p class="text-xs text-gray-300 mt-1 line-clamp-1">Jelajahi Menu</p>
                        </div>
                    </a>

                    <a href="{{ route('cafe.index') }}"
                        class="group relative block h-64 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('images/menus/paket-nasi-uduk-ayam.jpeg') }}" alt="Food"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <span
                                class="text-xs font-bold text-amber-400 uppercase tracking-widest mb-1 block">Makanan</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-amber-200 transition-colors">Main
                                Course</h3>
                            <p class="text-xs text-gray-300 mt-1 line-clamp-1">Jelajahi Menu</p>
                        </div>
                    </a>

                    <a href="{{ route('cafe.index') }}"
                        class="group relative block h-64 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('images/galery/roti-tawar-coklat.webp') }}" alt="Snack"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <span
                                class="text-xs font-bold text-amber-400 uppercase tracking-widest mb-1 block">Snack</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-amber-200 transition-colors">Light
                                Bites
                            </h3>
                            <p class="text-xs text-gray-300 mt-1 line-clamp-1">Jelajahi Menu</p>
                        </div>
                    </a>
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
