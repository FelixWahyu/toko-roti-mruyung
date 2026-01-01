@extends('layouts.app')

@section('content')
    <div class="relative bg-gray-900 h-[80vh] flex items-center justify-center overflow-hidden">
        <div class="bg-black/30 absolute z-10 inset-0"></div>
        <div class="absolute inset-0">
            <img src="{{ asset('images/guest-house/kasur-pribadi.webp') }}" alt="Roti Mruyung Guest House"
                class="w-full h-full object-cover">
        </div>

        <div class="relative z-20 text-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight drop-shadow-lg">
                Roti Mruyung Guest House
            </h1>
            <p class="mt-4 text-xl text-gray-200 max-w-2xl mx-auto font-light">
                Kenyamanan istirahat seperti di rumah sendiri dengan fasilitas lengkap di lokasi strategis Banyumas.
            </p>
            <div class="mt-8">
                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20ingin%20booking%20kamar%20Guest%20House"
                    target="_blank"
                    class="inline-block bg-amber-600 border border-transparent rounded-full py-3 px-8 text-base font-bold text-white hover:bg-amber-700 md:text-lg transition shadow-xl hover:scale-105 transform duration-200">
                    Cek Ketersediaan Kamar
                </a>
            </div>
        </div>
    </div>

    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-base font-semibold text-amber-600 uppercase tracking-wide">Fasilitas Unggulan</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">Mengapa Menginap di Sini?</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 border border-gray-100">
                    <div
                        class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Kamar Luas & Bersih</h3>
                    <p class="mt-2 text-gray-500 text-sm">Kebersihan adalah prioritas utama kami untuk kenyamanan istirahat
                        Anda.</p>
                </div>
                <div
                    class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 border border-gray-100">
                    <div
                        class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Free Wi-Fi Kencang</h3>
                    <p class="mt-2 text-gray-500 text-sm">Tetap terhubung dengan internet kecepatan tinggi di setiap sudut.
                    </p>
                </div>
                <div
                    class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 border border-gray-100">
                    <div
                        class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Full AC</h3>
                    <p class="mt-2 text-gray-500 text-sm">Fasilitas pendingin ruangan di setiap kamar.</p>
                </div>
                <div
                    class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 border border-gray-100">
                    <div
                        class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Parkir Aman 24 Jam</h3>
                    <p class="mt-2 text-gray-500 text-sm">Area parkir luas dan terpantau aman.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="relative bg-white pb-16">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-center">

            <div class="relative sm:py-16 lg:py-0 px-4 sm:px-6 lg:px-0 order-2 lg:order-1">
                <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Fasilitas Tersedia Kamar
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Nikmati tidur berkualitas di kamar kami yang didesain modern minimalis. Cocok untuk pelancong bisnis
                        maupun keluarga kecil.
                    </p>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900">Detail Ruangan:</h3>
                        <ul class="mt-4 space-y-3">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Queen Size Bed (Springbed Nyaman)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Kamar Mandi Dalam (Shower & Toilet Duduk)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Lemari Pakaian & Meja Kerja Kecil</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-gray-600">Air Mineral Gratis & Perlengkapan Mandi</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-10 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Harga Spesial</p>

                                <p class="text-3xl font-bold text-amber-600">
                                    Rp 150.000
                                    <span class="text-base font-normal text-gray-500">/malam</span>
                                </p>
                            </div>

                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20apakah%20ada%20kamar%20tersedia%20untuk%20menginap"
                                target="_blank"
                                class="bg-gray-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition shadow-lg transform hover:-translate-y-0.5">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative order-1 lg:order-2 px-4 sm:px-6 lg:px-0 py-12 lg:py-0">
                <div class="swiper room-gallery rounded-2xl shadow-2xl overflow-hidden border-4 border-white">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide h-[300px] sm:h-[400px]">
                            <img src="{{ asset('images/guest-house/tempat-tidur-2.webp') }}"
                                class="w-full h-full object-cover" alt="Kamar Tidur Utama">
                        </div>
                        <div class="swiper-slide h-[300px] sm:h-[400px]">
                            <img src="{{ asset('images/guest-house/kamar-mandi.webp') }}"
                                class="w-full h-full object-cover" alt="Kamar Mandi Bersih">
                        </div>
                        <div class="swiper-slide h-[300px] sm:h-[400px]">
                            <img src="{{ asset('images/guest-house/latar-depan-tempat.webp') }}"
                                class="w-full h-full object-cover" alt="Halaman Depan">
                        </div>
                        <div class="swiper-slide h-[300px] sm:h-[400px]">
                            <img src="{{ asset('images/guest-house/tempat-tidur.webp') }}"
                                class="w-full h-full object-cover" alt="Kasur Nyaman">
                        </div>
                        <div class="swiper-slide h-[300px] sm:h-[400px]">
                            <img src="{{ asset('images/guest-house/loby-resepsionis.webp') }}"
                                class="w-full h-full object-cover" alt="Kasur Nyaman">
                        </div>
                        <div class="swiper-slide h-[300px] sm:h-[400px]">
                            <img src="{{ asset('images/guest-house/mushola-belakang.webp') }}"
                                class="w-full h-full object-cover" alt="Kasur Nyaman">
                        </div>
                    </div>

                    <div class="swiper-button-next text-white drop-shadow-md"></div>
                    <div class="swiper-button-prev text-white drop-shadow-md"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <p class="text-center text-sm text-gray-500 mt-3 italic">
                    *Geser gambar untuk melihat sisi lain ruangan
                </p>
            </div>

        </div>
    </div>

    <div class="bg-amber-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Informasi Penting</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-base font-bold text-gray-900">Waktu Check-in/out</h4>
                        <p class="mt-1 text-sm text-gray-600">Check-in: 14.00 WIB<br>Check-out: 12.00 WIB</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-base font-bold text-gray-900">Lokasi Strategis</h4>
                        <p class="mt-1 text-sm text-gray-600">Dekat dengan pusat kota Banyumas.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-base font-bold text-gray-900">Pembayaran Mudah</h4>
                        <p class="mt-1 text-sm text-gray-600">Transfer Bank, E-Wallet, atau Tunai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative bg-amber-900">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-amber-900"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Siap untuk Menginap?
                </h2>
                <p class="mt-4 text-lg text-gray-300">
                    Hubungi kami sekarang untuk mendapatkan penawaran terbaik. Kamar terbatas!
                </p>
                <div class="mt-8 flex justify-center gap-4">
                    <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20tertarik%20menginap%20di%20Guest%20House"
                        target="_blank"
                        class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-semibold rounded-md bg-[#25D366] text-white hover:bg-[#20ba5a]">
                        Chat WhatsApp
                    </a>
                    <a href="https://maps.google.com/?q=Toko+Roti+Mruyung" target="_blank"
                        class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-semibold rounded-md text-gray-800 bg-white hover:bg-gray-100">
                        Lihat Lokasi di Peta
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roomSwiper = new Swiper('.room-gallery', {
                loop: true,
                slidesPerView: 1,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>

    <style>
        .room-gallery .swiper-button-next,
        .room-gallery .swiper-button-prev {
            color: #ffffff;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .room-gallery .swiper-pagination-bullet-active {
            background-color: #d97706;
        }
    </style>
@endsection
