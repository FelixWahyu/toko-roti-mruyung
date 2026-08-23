@extends('layouts.app')

@section('title', 'Tentang Kami')
@section('meta_description', 'Mengenal perjalanan Toko Roti Mruyung Banyumas sejak 2022, resep legendaris, keramahan 27+ karyawan, serta fasilitas cafe dan guest house.')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 lg:items-center">
                <div>
                    <h2 class="text-base font-semibold text-brown-500 tracking-wider uppercase">Tentang Kami</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                        Roti Mruyung
                    </p>
                    <p class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                        Guesthouse & Cafe Banyumas
                    </p>
                    <div class="mt-6 text-lg text-gray-500 space-y-4">
                        <p>
                            Didirikan di jantung Banyumas pada tahun 2022, Roti Mruyung Guesthouse & Cafe, adalah Bangunan
                            jaman belanda yang di alih fungsikan sebagai restaurant yang di lengkapi dengan bakery, cafe &
                            Guesthouse yang memiliki 10 kamar dengan nuansa China-Belanda. Kami berada di Komplek Kota Lama
                            Banyumas. Yang juga menyediakan oleh-oleh khas banyumas dengan menjual produk-produk UMKM
                            seperti
                            makanan-makanan ringan
                            & batik.
                        </p>
                        <p>
                            Apa yang dimulai sebagai toko roti kecil kini telah berkembang menjadi sebuah ruang hangat yang
                            menyatukan aroma roti segar, kenikmatan kopi, dan kenyamanan sebuah rumah singgah. Setiap sudut
                            tempat ini menyimpan cerita, setiap resep adalah perjalanan rasa, dan setiap tamu adalah bagian
                            dari keluarga besar kami.
                        </p>
                    </div>
                    <div class="mt-8 grid grid-cols-2 gap-4 sm:gap-6">
                        <div class="px-4 py-3 rounded-sm bg-gradient-to-br from-brown-50 to-brown-50/40 border border-brown-200/80 shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-baseline gap-1.5">
                                    <span class="text-3xl sm:text-4xl font-extrabold text-brown-600 font-serif">4+</span>
                                    <span class="text-base sm:text-lg font-bold text-gray-900">Tahun</span>
                                </div>
                                <div class="w-8 h-8 rounded-md bg-brown-100 text-brown-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-1.5 text-sm text-gray-500">Menjaga resep legendaris sejak 2022 di Banyumas</p>
                        </div>

                        <div class="px-4 py-3 rounded-sm bg-gradient-to-br from-brown-50 to-brown-50/40 border border-brown-200/80 shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-baseline gap-1.5">
                                    <span class="text-3xl sm:text-4xl font-extrabold text-brown-600 font-serif">27</span>
                                    <span class="text-base sm:text-lg font-bold text-gray-900">Karyawan</span>
                                </div>
                                <div class="w-8 h-8 rounded-md bg-brown-100 text-brown-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-1.5 text-sm text-gray-500">Siap melayani kebutuhan Anda dengan keramahan tulus</p>
                        </div>
                    </div>
                </div>
                <div class="mt-10 lg:mt-0">
                    <div class="flex items-center space-x-4">
                        <div class="flex flex-col space-y-4 flex-shrink-0">
                            <div class="w-48 h-48 overflow-hidden rounded-sm shadow-lg group">
                                <img src="{{ asset('images/galery/toko-mruyung.webp') }}"
                                    alt="Suasana interior Toko Roti Mruyung"
                                    loading="lazy" decoding="async"
                                    class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                            </div>
                            <div class="w-48 h-48 overflow-hidden rounded-sm shadow-lg group">
                                <img src="{{ asset('images/galery/guesthouse-mruyung.webp') }}"
                                    alt="Kamar Guesthouse Mruyung"
                                    loading="lazy" decoding="async"
                                    class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                            </div>
                        </div>
                        <div class="flex-1 w-full h-96 overflow-hidden rounded-sm shadow-lg group">
                            <img class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110"
                                src="{{ asset('images/galery/toko-roti-mruyung-night.webp') }}"
                                alt="Tampilan Toko Roti Mruyung di malam hari"
                                loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Filosofi Kami</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500">Tiga pilar yang menopang setiap hal yang kami
                    lakukan.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div>
                    <div class="mx-auto h-12 w-12 flex items-center justify-center bg-brown-100 rounded-full">
                        <svg class="h-6 w-6 text-brown-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">Kualitas Terbaik</h3>
                    <p class="mt-2 text-base text-gray-500">Kami hanya menggunakan bahan-bahan pilihan, dari tepung lokal
                        hingga biji kopi premium, untuk memastikan setiap gigitan dan seruputan adalah yang terbaik.</p>
                </div>
                <div>
                    <div class="mx-auto h-12 w-12 flex items-center justify-center bg-brown-100 rounded-full">
                        <svg class="h-6 w-6 text-brown-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">Keramahan Khas Banyumas</h3>
                    <p class="mt-2 text-base text-gray-500">Setiap senyuman tulus dan sapaan hangat adalah bagian dari
                        pelayanan kami. Kami ingin Anda merasa diterima dan dihargai.</p>
                </div>
                <div>
                    <div class="mx-auto h-12 w-12 flex items-center justify-center bg-brown-100 rounded-full">
                        <svg class="h-6 w-6 text-brown-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5-1.5-.5M5.25 7.136l-1.5 1.636M16.5 15.75l-1.5-1.636" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">Kenyamanan Holistik</h3>
                    <p class="mt-2 text-base text-gray-500">Baik Anda menginap di guesthouse kami atau sekadar mampir untuk
                        ngopi, kami menciptakan suasana yang tenang, bersih, dan nyaman.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left max-w-3xl mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight font-serif">Intip Suasana & Kreasi Kami</h2>
                <p class="mt-4 text-base sm:text-lg text-gray-500 font-light">
                    Saksikan sekilas kehangatan suasana Toko Roti Mruyung serta dedikasi kami dalam menghadirkan sajian berkualitas terbaik.
                </p>
            </div>

            <div class="max-w-4xl grid grid-cols-1 sm:grid-cols-2 gap-8 lg:gap-10">
                <div class="bg-gradient-to-b from-gray-50 to-white rounded-md p-2 sm:p-3 border border-gray-200/90 hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div class="overflow-hidden rounded-sm bg-black aspect-[9/16] relative shadow-inner">
                        <video class="w-full h-full object-cover" loop playsinline controls preload="metadata">
                            <source src="https://res.cloudinary.com/j9s1puj0/video/upload/v1787382308/review-video-2025.mp4" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                    <div class="pt-5 px-2 pb-2">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 font-serif">Kehangatan Toko & Suasana Klasik</h3>
                        <p class="mt-1.5 text-sm text-gray-500 leading-relaxed">
                            Melihat lebih dekat kenyamanan ruang kafe, bakery, dan atmosfer bernuansa klasik khas Kota Lama Banyumas.
                        </p>
                    </div>
                </div>

                <div class="bg-gradient-to-b from-gray-50 to-white rounded-md p-2 sm:p-3 border border-gray-200/90 hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div class="overflow-hidden rounded-sm bg-black aspect-[9/16] relative shadow-inner">
                        <video class="w-full h-full object-cover" loop playsinline controls preload="metadata">
                            <source src="https://res.cloudinary.com/j9s1puj0/video/upload/v1787382242/video-kue-nanas-2026-08-21.mp4" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                    <div class="pt-5 px-2 pb-2">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 font-serif">Kreasi Spesial Kue Nanas Mruyung</h3>
                        <p class="mt-1.5 text-sm text-gray-500 leading-relaxed">
                            Intip ketelitian dan keahlian baker kami dalam mengolah bahan pilihan hingga menjadi sajian favorit keluarga.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-24">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight font-serif">Galeri Kami</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500 font-light">
                    Sekilas tentang sudut-sudut favorit di tempat kami.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 auto-rows-[160px] sm:auto-rows-[200px] md:auto-rows-[220px] lg:auto-rows-[250px] gap-0 overflow-hidden border-2 border-white">
                <div class="col-span-2 row-span-2 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/toko-roti-mruyung-night.webp') }}"
                        alt="Toko Roti Mruyung Malam Hari"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Mruyung Night</span>
                    </div>
                </div>

                <div class="col-span-1 row-span-1 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/guesthouse-mruyung.webp') }}"
                        alt="Guest House Mruyung"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Guest House</span>
                    </div>
                </div>

                <div class="col-span-1 row-span-1 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/foto-kue-mruyung.webp') }}"
                        alt="Aneka Kue Mruyung"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Aneka Kue</span>
                    </div>
                </div>

                <div class="col-span-2 row-span-1 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/depan-toko-mruyung.webp') }}"
                        alt="Depan Toko Roti Mruyung"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Depan Toko</span>
                    </div>
                </div>

                <div class="col-span-1 row-span-2 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/roti-tawar-coklat.webp') }}"
                        alt="Roti Tawar Coklat"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Roti Tawar</span>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 row-span-1 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/guest-house.webp') }}"
                        alt="Kamar & Area Guest House"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Area Inap</span>
                    </div>
                </div>

                <div class="col-span-1 md:row-span-2 row-span-1 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/cofe-minuman.webp') }}"
                        alt="Minuman & Cafe"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Cafe & Kopi</span>
                    </div>
                </div>

                <div class="col-span-2 row-span-1 group relative overflow-hidden bg-gray-100 border border-white">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        src="{{ asset('images/galery/toko-roti-mruyung.webp') }}"
                        alt="Suasana Toko Roti Mruyung"
                        loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white text-xs sm:text-sm font-semibold px-4 py-1.5 bg-black/50 rounded-full backdrop-blur-sm">Toko Roti</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
