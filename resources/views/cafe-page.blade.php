@extends('layouts.app')

@section('content')
    <div class="relative bg-gray-900 h-[80vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/galery/toko-mruyung.webp') }}" alt="Suasana Cafe Roti Mruyung"
                class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-transparent to-black/30"></div>
        </div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight drop-shadow-xl mb-6">
                Tempat Nongkrong & <br /> Kuliner Terbaik
            </h1>
            <p class="mt-4 text-xl text-gray-200 font-light mb-8">
                Rasakan kenikmatan kopi pilihan dan hidangan lezat dalam suasana yang hangat dan nyaman.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#daftar-menu-lengkap"
                    class="inline-block bg-amber-600 border border-transparent rounded-full py-3 px-8 text-base font-bold text-white hover:bg-amber-700 transition shadow-lg hover:scale-105 transform duration-200">
                    Lihat Daftar Menu
                </a>
                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20reservasi%20meja"
                    target="_blank"
                    class="inline-block bg-white/10 backdrop-blur-md border border-white rounded-full py-3 px-8 text-base font-bold text-white hover:bg-white hover:text-gray-900 transition shadow-lg">
                    Reservasi Meja
                </a>
            </div>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-base font-semibold text-amber-600 uppercase tracking-wide">Rekomendasi Untuk Anda</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">Best Seller dari Kami</p>
                </div>
                <div class="flex gap-2">
                    <button
                        class="menu-prev bg-white p-3 rounded-full shadow hover:bg-amber-500 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button
                        class="menu-next bg-white p-3 rounded-full shadow hover:bg-amber-500 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="swiper menu-slider overflow-hidden">
                <div class="swiper-wrapper py-4 items-stretch">
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="h-48 w-full overflow-hidden relative flex-shrink-0">
                                <img src="{{ asset('images/menus/menu-bakmi.webp') }}" alt="Hazelnut Latte"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute top-2 right-2 bg-amber-500 text-white text-xs font-bold px-2 py-1 rounded">
                                    BEST SELLER</div>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900 min-h-[3.5rem] line-clamp-2">Hazelnut Latte Cream
                                </h3>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">Kopi susu dengan syrup hazelnut premium.
                                </p>

                                <div class="mt-auto pt-4 flex justify-between items-center border-t border-gray-100 mt-4">
                                    <span class="text-amber-600 font-bold text-lg">Rp 28.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="h-48 w-full overflow-hidden relative flex-shrink-0">
                                <img src="{{ asset('images/menus/menu-bakaran.webp') }}" alt="Burger"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900 min-h-[3.5rem] line-clamp-2">Beef Burger Supreme
                                </h3>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">Patty daging sapi asli 150gr dengan keju
                                    lumer dan saus spesial.</p>
                                <div class="mt-auto pt-4 flex justify-between items-center border-t border-gray-100 mt-4">
                                    <span class="text-amber-600 font-bold text-lg">Rp 45.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="h-48 w-full overflow-hidden relative flex-shrink-0">
                                <img src="{{ asset('images/menus/menu-nasi-goreng.jpeg') }}" alt="Mojito"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900 min-h-[3.5rem] line-clamp-2">Mojito Strawberry
                                </h3>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">Minuman segar dengan soda dan mint.</p>
                                <div class="mt-auto pt-4 flex justify-between items-center border-t border-gray-100 mt-4">
                                    <span class="text-amber-600 font-bold text-lg">Rp 22.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="h-48 w-full overflow-hidden relative flex-shrink-0">
                                <img src="{{ asset('images/menus/iga-bakar.webp') }}" alt="Steak"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900 min-h-[3.5rem] line-clamp-2">Steak Sirloin
                                    Meltique</h3>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">Daging meltique super empuk dengan
                                    kentang.</p>
                                <div class="mt-auto pt-4 flex justify-between items-center border-t border-gray-100 mt-4">
                                    <span class="text-amber-600 font-bold text-lg">Rp 85.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="h-48 w-full overflow-hidden relative flex-shrink-0">
                                <img src="{{ asset('images/menus/menu-ayam-goreng.webp') }}" alt="Steak"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900 min-h-[3.5rem] line-clamp-2">Steak Sirloin
                                    Meltique</h3>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">Daging meltique super empuk dengan
                                    kentang.</p>
                                <div class="mt-auto pt-4 flex justify-between items-center border-t border-gray-100 mt-4">
                                    <span class="text-amber-600 font-bold text-lg">Rp 85.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="h-48 w-full overflow-hidden relative flex-shrink-0">
                                <img src="{{ asset('images/menus/menu-chiken-katsu.webp') }}" alt="Steak"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900 min-h-[3.5rem] line-clamp-2">Steak Sirloin
                                    Meltique</h3>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">Daging meltique super empuk dengan
                                    kentang.</p>
                                <div class="mt-auto pt-4 flex justify-between items-center border-t border-gray-100 mt-4">
                                    <span class="text-amber-600 font-bold text-lg">Rp 85.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="daftar-menu-lengkap" class="py-16 bg-white scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Daftar Menu Lengkap</h2>
                <p class="mt-2 text-gray-500">Temukan minuman dan makanan favorit Anda di sini</p>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">
                <div class="flex flex-wrap justify-center gap-2" id="category-filters">
                    <button onclick="filterMenu('all')"
                        class="filter-btn active px-4 py-2 rounded-full text-sm font-semibold bg-gray-900 text-white transition">Semua</button>
                    <button onclick="filterMenu('coffee')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition">Coffee</button>
                    <button onclick="filterMenu('non-coffee')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition">Non-Coffee</button>
                    <button onclick="filterMenu('food')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition">Makanan</button>
                    <button onclick="filterMenu('snack')"
                        class="filter-btn px-4 py-2 rounded-full text-sm font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition">Snack</button>
                </div>

                <div class="relative w-full md:w-64">
                    <input type="text" id="menu-search" onkeyup="searchMenu()" placeholder="Cari menu..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <div id="menu-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="menu-item coffee bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/kopi-mruyung.webp') }}" alt="Cappucino"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Creamy Milk Coffee</h4>
                            <p class="text-xs text-gray-500 mt-1">Kopi dengan milk yang tebal dan creamy.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 15.000</span>
                        </div>
                    </div>
                </div>

                <div
                    class="menu-item food bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/menu-nasi-goreng.jpeg') }}" alt="Nasi Goreng"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Nasi Goreng Magelangan</h4>
                            <p class="text-xs text-gray-500 mt-1">Lengkap dengan telur mata sapi, acar dan kerupuk.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 24.000</span>
                        </div>
                    </div>
                </div>

                <div
                    class="menu-item snack bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/ayam-tepung-pedas-2.webp') }}" alt="Ice Lychee Tea"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Udang Tepung</h4>
                            <p class="text-xs text-gray-500 mt-1">Udang tepung rasa gurih dan renyah dimulut.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 35.000</span>
                        </div>
                    </div>
                </div>

                <div
                    class="menu-item food bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/iga-bakar.webp') }}" alt="French Fries"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Iga Bakar</h4>
                            <p class="text-xs text-gray-500 mt-1">Daging meltique super empuk dengan kentang dan toping
                                lengkap.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 57.000</span>
                        </div>
                    </div>
                </div>
                <div
                    class="menu-item food bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/menu-ayam-asam-pedas.webp') }}" alt="French Fries"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Krengsengan</h4>
                            <p class="text-xs text-gray-500 mt-1">Krengsengan toping ayam melimpah dan kuah nyemek.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 20.000</span>
                        </div>
                    </div>
                </div>
                <div
                    class="menu-item food bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/menu-ayam-goreng.webp') }}" alt="French Fries"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Paket Nasi Ayam Goreng</h4>
                            <p class="text-xs text-gray-500 mt-1">Paket nasi ayam goreng dengan komplit dengan sambal.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 22.000</span>
                        </div>
                    </div>
                </div>
                <div
                    class="menu-item food bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/menu-ayam-kecap.webp') }}" alt="French Fries"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Ayam Saus Tiram</h4>
                            <p class="text-xs text-gray-500 mt-1">Paket ayam saus tiram rasa asam manis dan gurih.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 18.000</span>
                        </div>
                    </div>
                </div>
                <div
                    class="menu-item snack bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/menu-hamburger.webp') }}" alt="French Fries"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Beef Burger</h4>
                            <p class="text-xs text-gray-500 mt-1">Hamburger dengan daging sapi yang tebal dan sayuran.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 17.500</span>
                        </div>
                    </div>
                </div>
                <div
                    class="menu-item snack bg-white rounded-xl border border-gray-200 p-4 flex gap-4 hover:shadow-md transition">
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="{{ asset('images/menus/menu-roti-bakar.jpeg') }}" alt="French Fries"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div>
                            <h4 class="font-bold text-gray-900">Loaf with Smoke Beef & Melted Cheese</h4>
                            <p class="text-xs text-gray-500 mt-1">Roti dengan toping keju yang meleleh dan daging sapi
                                asap.</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-amber-600 font-bold">Rp 25.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="no-menu-found" class="hidden text-center py-10">
                <p class="text-gray-500 text-lg">Menu tidak ditemukan.</p>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <div class="swiper promo-banner-slider rounded-lg overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($menuSlides as $slide)
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

    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-amber-900 rounded-3xl overflow-hidden shadow-2xl relative">
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-amber-800 rounded-full opacity-50"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 bg-amber-800 rounded-full opacity-50"></div>

                <div class="relative z-10 flex flex-col lg:flex-row">

                    <div class="lg:w-1/2 relative h-64 lg:h-auto">
                        <div class="swiper cafe-ambiance-slider h-full w-full">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/galery/toko-mruyung.webp') }}" alt="Interior Cafe"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/galery/cofe-minuman.webp') }}" alt="Outdoor Cafe"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/galery/toko-roti-mruyung.webp') }}" alt="Barista"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="lg:w-1/2 p-8 md:p-12 text-white">
                        <h2 class="text-3xl font-extrabold mb-4">Fasilitas & Suasana</h2>
                        <p class="text-amber-100 text-lg mb-8">
                            Kami merancang tempat ini agar Anda betah berlama-lama. Dukungan fasilitas lengkap untuk
                            produktivitas maupun relaksasi.
                        </p>

                        <div class="grid grid-cols-2 gap-6">
                            <div
                                class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                                <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                    </path>
                                </svg>
                                <span class="font-medium">Free WiFi</span>
                            </div>
                            <div
                                class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                                <svg class="w-8 h-8 text-amber-300 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span class="font-medium">Stopkontak</span>
                            </div>
                            <div
                                class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                                <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span class="font-medium">Toilet Bersih</span>
                            </div>
                            <div
                                class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                                <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                <span class="font-medium">Indoor & Outdoor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Lapar atau Haus? Segera pesan sekarang</h2>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-medium rounded-full text-white bg-gray-900 hover:bg-gray-800 md:py-4 md:text-lg md:px-10 shadow-lg">
                    Lihat Produk Lainnya
                </a>
                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20order%20makanan"
                    target="_blank"
                    class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-medium rounded-full bg-[#25D366] text-white hover:bg-[#20ba5a] md:py-4 md:text-lg md:px-10 shadow-lg">
                    Order via WhatsApp
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuSwiper = new Swiper('.menu-slider', {
                slidesPerView: 1.2,
                spaceBetween: 16,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: '.menu-next',
                    prevEl: '.menu-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 24,
                    },
                },
            });

            const ambianceSwiper = new Swiper('.cafe-ambiance-slider', {
                loop: true,
                effect: 'fade',
                autoplay: {
                    delay: 4000
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
            });

            const promoBannerSwiper = new Swiper('.promo-banner-slider', {
                loop: true,
                effect: 'fade',
                autoplay: {
                    delay: 10000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });

        function filterMenu(category) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                if (btn.innerText.toLowerCase() === category && category !== 'all') {
                    // Style handle in JS for simplicity or use CSS class toggle
                }
                btn.classList.remove('bg-gray-900', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-600');
            });

            const activeBtn = Array.from(buttons).find(b =>
                (category === 'all' && b.innerText === 'Semua') ||
                b.innerText.toLowerCase().replace(' ', '-') === category
            );

            if (activeBtn) {
                activeBtn.classList.remove('bg-gray-100', 'text-gray-600');
                activeBtn.classList.add('bg-gray-900', 'text-white');
            }

            const items = document.querySelectorAll('.menu-item');
            let hasVisible = false;

            items.forEach(item => {
                if (category === 'all' || item.classList.contains(category)) {
                    item.style.display = 'flex';
                    hasVisible = true;
                } else {
                    item.style.display = 'none';
                }
            });

            searchMenu();
        }

        function searchMenu() {
            const input = document.getElementById('menu-search').value.toLowerCase();
            const items = document.querySelectorAll('.menu-item');
            let hasVisible = false;

            const activeBtn = document.querySelector('.filter-btn.bg-gray-900');
            let currentCategory = 'all';
            if (activeBtn.innerText !== 'Semua') {
                currentCategory = activeBtn.innerText.toLowerCase().replace(' ', '-');
            }

            items.forEach(item => {
                const title = item.querySelector('h4').innerText.toLowerCase();
                const desc = item.querySelector('p').innerText.toLowerCase();

                const matchesCategory = (currentCategory === 'all' || item.classList.contains(currentCategory));
                const matchesSearch = (title.includes(input) || desc.includes(input));

                if (matchesCategory && matchesSearch) {
                    item.style.display = 'flex';
                    hasVisible = true;
                } else {
                    item.style.display = 'none';
                }
            });

            const notFoundMsg = document.getElementById('no-menu-found');
            if (!hasVisible) {
                notFoundMsg.classList.remove('hidden');
            } else {
                notFoundMsg.classList.add('hidden');
            }
        }
    </script>
@endsection
