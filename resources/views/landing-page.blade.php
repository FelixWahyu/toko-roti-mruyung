@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Nikmati kelezatan aneka roti legendaris resep otentik, nongkrong santai di cafe bernuansa klasik, dan menginap nyaman di Guest House Toko Roti Mruyung Banyumas.')

@section('content')
    <div class="relative bg-gray-50 overflow-hidden h-[600px] lg:h-[100vh]">
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-black/20 z-10"></div>

            <video id="heroVideo" class="w-full h-full object-cover" muted loop autoplay playsinline
                poster="{{ asset('images/hero-background.webp') }}">
                <img src="{{ asset('images/hero-background.webp') }}" alt="Roti Mruyung Hero"
                    fetchpriority="high"
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
                    <div class="rounded-sm shadow-md">
                        <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}" target="_blank"
                            class="w-full flex items-center justify-center px-4 py-1.5 border border-transparent text-base font-bold rounded-sm text-white bg-amber-600 hover:bg-amber-500 md:py-2 md:text-lg md:px-6 transition duration-300 shadow-lg hover:shadow-amber-500/50">
                            Hubungi Kami
                        </a>
                    </div>

                    <div class="mt-3 sm:mt-0">
                        <a href="{{ route('about') }}"
                            class="w-full flex items-center justify-center px-4 py-1.5 border border-white text-base font-bold rounded-sm text-white hover:bg-white hover:text-gray-900 md:py-2 md:text-lg md:px-6 transition duration-300 backdrop-blur-sm">
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
                    class="flex flex-col bg-white overflow-hidden hover:shadow-md transition duration-300 border border-gray-100">
                    <div class="h-56 w-full relative overflow-hidden group">
                        <img src="{{ asset('images/galery/toko-roti-mruyung-night.webp') }}" alt="Toko Roti"
                            loading="lazy" decoding="async"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Bakery</h3>
                            <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                Nikmati aneka roti manis, kue, dan pastry yang dibuat segar setiap hari dengan resep
                                legendaris. Cocok untuk oleh-oleh atau camilan harian.
                            </p>
                        </div>
                        <div class="mt-6 flex items-center gap-3">
                            <a href="{{ route('products.index') }}"
                                class="flex-1 bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-200 py-2 rounded-sm text-center text-sm font-semibold transition">
                                Katalog Roti
                            </a>
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo%20Roti%20Mruyung,%20saya%20mau%20pesan%20roti"
                                target="_blank"
                                class="flex-1 bg-brown-600 text-white hover:bg-brown-700 py-2 rounded-sm text-center text-sm font-semibold transition">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-col bg-white overflow-hidden hover:shadow-md transition duration-300 border border-gray-100">
                    <div class="h-56 w-full relative overflow-hidden group">
                        <img src="{{ asset('images/guest-house/tempat-tidur.webp') }}" alt="Guest House"
                            loading="lazy" decoding="async"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
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
                                class="flex-1 bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-200 py-2 rounded-sm text-center text-sm font-semibold transition">
                                Cek Fasilitas
                            </a>
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20booking%20kamar%20Guest%20House"
                                target="_blank"
                                class="flex-1 bg-brown-600 text-white hover:bg-brown-700 py-2 rounded-sm text-center text-sm font-semibold transition">
                                Booking
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-col bg-white overflow-hidden hover:shadow-md transition duration-300 border border-gray-100">
                    <div class="h-56 w-full relative overflow-hidden group">
                        <img src="{{ asset('images/galery/cofe-minuman.webp') }}" alt="Cafe & Resto"
                            loading="lazy" decoding="async"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
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
                                class="flex-1 bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-200 py-2 rounded-sm text-center text-sm font-semibold transition">
                                Lihat Menu
                            </a>
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20reservasi%20meja%20di%20Cafe"
                                target="_blank"
                                class="flex-1 bg-brown-600 text-white hover:bg-brown-700 py-2 rounded-sm text-center text-sm font-semibold transition">
                                Reservasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white pb-16 pt-4">
        <h2 class="text-center text-2xl font-bold mb-12">Harga Spesial Untuk Anda</h2>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <div class="swiper promo-banner-slider overflow-hidden pb-12">
                    <div class="swiper-wrapper">
                        @foreach ($promoSlides as $slide)
                            <div class="swiper-slide h-auto">
                                <a href="{{ $slide['link'] }}" class="block w-full aspect-[6/9] overflow-hidden rounded-sm">
                                    <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}"
                                        loading="lazy" decoding="async"
                                        class="w-full h-full object-cover">
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
                <h2 class="mt-2 text-4xl font-extrabold text-gray-900 font-serif sm:text-5xl">
                    Jelajahi Dunia Rasa Kami
                </h2>
                <p class="mt-4 text-xl text-gray-500 font-light">
                    Dari kehangatan oven roti hingga aroma kopi terbaik, temukan favorit Anda di sini.
                </p>
            </div>

            <div class="mb-20">
                <div class="flex md:flex-row flex-col md:items-center md:justify-between mb-8 gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brown-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                            </svg>
                            Bakery & Pastry
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">Kelezaatan hangat langsung dari oven.</p>
                    </div>
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-50 text-gray-700 font-medium hover:bg-gray-100 rounded-sm transition">
                        Lihat Lebih Banyak
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->id]) }}"
                            class="group relative block h-64 sm:h-80 rounded-md overflow-hidden hover:shadow-lg transition-all duration-300">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://placehold.co/400x400/e2e8f0/333?text=' . urlencode($category->name) }}"
                                alt="{{ $category->name }}"
                                loading="lazy" decoding="async"
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
                    <span class="px-3 bg-gray-50 text-lg font-medium text-gray-500 italic">
                        &mdash; Cafe & Resto Experience &mdash;
                    </span>
                </div>
            </div>

            <div class="mb-20 mt-8">
                <div class="flex md:flex-row flex-col md:items-center md:justify-between mb-8 gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brown-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3" />
                            </svg>
                            Cafe & Resto
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">Teman nongkrong dan bersantai terbaik.</p>
                    </div>
                    <a href="{{ route('cafe.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-50 text-gray-700 rounded-sm text-sm font-medium hover:bg-gray-100 transition">
                        Lihat Lebih Banyak
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <a href="{{ route('cafe.index') }}"
                        class="group relative block h-64 rounded-md overflow-hidden hover:shadow-lg transition-all duration-300">
                        <img src="{{ asset('images/menus/kopi-mruyung.webp') }}" alt="Coffee"
                            loading="lazy" decoding="async"
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
                        class="group relative block h-64 rounded-md overflow-hidden hover:shadow-lg transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                            alt="Non Coffee"
                            loading="lazy" decoding="async"
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
                        class="group relative block h-64 rounded-md overflow-hidden hover:shadow-lg transition-all duration-300">
                        <img src="{{ asset('images/menus/paket-nasi-uduk-ayam.jpeg') }}" alt="Food"
                            loading="lazy" decoding="async"
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
                        class="group relative block h-64 rounded-md overflow-hidden hover:shadow-lg transition-all duration-300">
                        <img src="{{ asset('images/galery/roti-tawar-coklat.webp') }}" alt="Snack"
                            loading="lazy" decoding="async"
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

            <div class="relative py-8">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-3 bg-gray-50 text-lg font-medium text-gray-500 italic">
                        &mdash; Guest House Experience &mdash;
                    </span>
                </div>
            </div>

            <div class="mt-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brown-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Roti Mruyung Guest House
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">Penginapan nyaman bernuansa klasik di kawasan Kota Lama Banyumas.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('guesthouse.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-50 text-gray-700 rounded-sm text-sm font-medium hover:bg-gray-100 transition">
                            Lihat Lebih Banyak
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    <div class="lg:col-span-7 bg-white rounded-md overflow-hidden border border-gray-100 flex flex-col group">
                        <div class="relative h-64 sm:h-80 overflow-hidden">
                            <img src="{{ asset('images/guest-house/tempat-tidur.webp') }}" alt="Kamar Roti Mruyung Guest House"
                                loading="lazy" decoding="async"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <span class="text-xs font-semibold text-amber-300 uppercase tracking-wider block">Nuansa Klasik & Nyaman</span>
                                <h4 class="text-xl sm:text-2xl font-bold font-serif">Kamar Tidur Utama (Queen Bed)</h4>
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-6">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Dilengkapi AC, Wi-Fi kencang, springbed empuk, kamar mandi, serta suasana tenang yang menjamin kualitas istirahat Anda selama berada di Banyumas.
                            </p>

                            <div class="flex items-center justify-between pt-2">
                                <div>
                                    <span class="text-xs text-gray-500 block">Harga Spesial</span>
                                    <span class="text-2xl font-bold text-amber-600">Rp 225.000,-<span class="text-xs font-normal text-gray-500"></span></span>
                                </div>
                                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo%20Roti%20Mruyung,%20saya%20mau%20booking%20kamar%20Guest%20House"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold rounded-sm transition duration-300">
                                    <span>Hubungi Kami</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                        <div class="group relative rounded-md overflow-hidden hover:shadow-lg transition-all duration-300 h-44 sm:h-52">
                            <img src="{{ asset('images/guest-house/tempat-tidur-2.webp') }}" alt="Kamar Tamu Nyaman"
                                loading="lazy" decoding="async"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 right-3 text-white">
                                <span class="text-xs font-bold">Kamar Tamu Nyaman</span>
                                <p class="text-[11px] text-gray-300">Interior bersih & tertata rapi</p>
                            </div>
                        </div>

                        <div class="group relative rounded-md overflow-hidden hover:shadow-lg transition-all duration-300 h-44 sm:h-52">
                            <img src="{{ asset('images/guest-house/loby-resepsionis.webp') }}" alt="Lobi & Resepsionis"
                                loading="lazy" decoding="async"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 right-3 text-white">
                                <span class="text-xs font-bold">Lobi & Resepsionis</span>
                                <p class="text-[11px] text-gray-300">Pelayanan ramah 24 jam</p>
                            </div>
                        </div>

                        <div class="group relative rounded-md overflow-hidden hover:shadow-lg transition-all duration-300 h-44 sm:h-52">
                            <img src="{{ asset('images/guest-house/kamar-mandi.webp') }}" alt="Kamar Mandi Bersih"
                                loading="lazy" decoding="async"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 right-3 text-white">
                                <span class="text-xs font-bold">Kamar Mandi Bersih</span>
                                <p class="text-[11px] text-gray-300">Shower & amenities lengkap</p>
                            </div>
                        </div>

                        <div class="group relative rounded-md overflow-hidden hover:shadow-lg transition-all duration-300 h-44 sm:h-52">
                            <img src="{{ asset('images/guest-house/mushola-belakang.webp') }}" alt="Fasilitas Mushola"
                                loading="lazy" decoding="async"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 right-3 text-white">
                                <span class="text-xs font-bold">Fasilitas Mushola</span>
                                <p class="text-[11px] text-gray-300">Tenang & nyaman beribadah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative bg-white py-12 lg:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-md overflow-hidden bg-gradient-to-br from-stone-900 via-brown-900 to-amber-950 text-white shadow-md border border-amber-900/30">
                <div class="absolute inset-0 z-0 opacity-20 mix-blend-overlay">
                    <img src="{{ asset('images/galery/depan-toko-mruyung.webp') }}" alt="Toko Roti Mruyung"
                        loading="lazy" decoding="async"
                        class="w-full h-full object-cover">
                </div>

                <div class="absolute -top-24 -right-24 w-96 h-96 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-amber-700/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 px-6 py-12 sm:px-12 sm:py-16 lg:py-20 lg:px-16">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white font-serif leading-tight">
                                Siap Menikmati Kelezatan <br class="hidden sm:inline">
                                <span class="text-amber-400">Roti Mruyung</span> Hari Ini?
                            </h2>

                            <p class="text-base sm:text-lg text-gray-300 max-w-2xl mx-auto lg:mx-0 font-light leading-relaxed">
                                Pesan roti hangat favorit Anda secara online, nikmati kopi di kafe kami, atau rencanakan liburan tenang di Guest House bernuansa Kota Lama Banyumas.
                            </p>

                            <div class="pt-2 flex flex-wrap justify-center lg:justify-start gap-4 sm:gap-6 text-sm text-gray-200">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-amber-400"></div>
                                    <span>Panggang Segar Setiap Hari</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-amber-400"></div>
                                    <span>Bahan Berkualitas Pilihan</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-amber-400"></div>
                                    <span>Pesan Cepat & Mudah</span>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-5 flex flex-col items-center lg:items-end">
                            <div class="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/15 p-6 sm:p-8 rounded-lg shadow-md space-y-4">
                                <h3 class="text-lg font-bold text-white text-center lg:text-left flex items-center justify-center lg:justify-start gap-2">
                                    <span>Mulai Pesanan Anda</span>
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-300 text-center lg:text-left">
                                    Pilih layanan untuk melihat daftar roti mruyung, cafe dan harga guest house atau langsung order di marketplace kesayangan anda. Hubungi tim kami untuk pemesanan dan reservasi.
                                </p>

                                <div class="space-y-3 pt-2">
                                    <a href="https://shopee.co.id/" target="_blank" rel="noopener noreferrer"
                                        class="w-full flex items-center justify-center gap-2 px-6 py-3 text-white rounded-md bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-stone-950 font-bold text-base transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        <span>Beli di Shopee</span>
                                    </a>

                                    <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo%20Roti%20Mruyung,%20saya%20mau%20pesan%20roti%20/%20reservasi"
                                        target="_blank" rel="noopener noreferrer"
                                        class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-md bg-white/10 hover:bg-white/20 text-white font-semibold text-base border border-white/20 transition-all duration-300 hover:border-amber-400/50">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                        </svg>
                                        <span>Chat via WhatsApp</span>
                                    </a>
                                </div>

                                <div class="pt-2 text-center">
                                    <a href="{{ route('contact') }}" class="text-xs text-amber-300 hover:text-amber-200 underline underline-offset-4 transition">
                                        Lihat Lokasi & Jam Operasional Toko &rarr;
                                    </a>
                                </div>
                        </div>
                    </div>
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
                slidesPerView: 1,
                spaceBetween: 16,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.promo-banner-slider .swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    },
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
