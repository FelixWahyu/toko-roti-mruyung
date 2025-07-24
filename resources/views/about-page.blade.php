@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 lg:items-center">
                <div>
                    <h2 class="text-base font-semibold text-brown-500 tracking-wider uppercase">Tentang Kami</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                        Toko Roti Mruyung Guest House & Cafe Banyumas
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
                </div>
                <div class="mt-10 lg:mt-0" aria-hidden="true">
                    <img class="rounded-lg shadow-xl" src="{{ asset('images/galery/toko-mruyung.webp') }}"
                        alt="[Gambar bagian depan Toko Roti Mruyung yang nyaman dan mengundang]">
                </div>
            </div>
        </div>
    </div>

    <!-- Section Filosofi Kami -->
    <div class="bg-gray-50 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Filosofi Kami</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500">Tiga pilar yang menopang setiap hal yang kami
                    lakukan.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Pilar 1 -->
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
                <!-- Pilar 2 -->
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
                <!-- Pilar 3 -->
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

    <!-- Section Galeri -->
    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Intip Suasana Kami</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500">Sekilas tentang sudut-sudut favorit di tempat kami.
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="grid gap-4">
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/toko-roti-mruyung-night.webp') }}"
                            alt="[Gambar secangkir kopi latte art]"></div>
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/guesthouse-mruyung.webp') }}" alt="[Gambar aneka kue warna-warni]">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/foto-kue-mruyung.webp') }}"
                            alt="[Gambar kamar guesthouse yang rapi dan nyaman]"></div>
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/depan-toko-mruyung.webp') }}"
                            alt="[Gambar suasana kafe yang hangat dan ramai]"></div>
                </div>
                <div class="grid gap-4">
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/roti-tawar-coklat.webp') }}"
                            alt="[Gambar roti croissant segar di atas nampan]"></div>
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/guest-house.webp') }}"
                            alt="[Gambar teras luar guesthouse dengan tanaman hijau]"></div>
                </div>
                <div class="grid gap-4">
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/cofe-minuman.webp') }}"
                            alt="[Gambar seorang barista sedang membuat kopi]"></div>
                    <div><img
                            class="h-auto max-w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                            src="{{ asset('images/galery/toko-roti-mruyung.webp') }}"
                            alt="[Gambar roti gandum utuh yang baru dipanggang]"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- section menu --}}
    <section class="bg-white w-full pt-3 pb-16">
        <div class="relative w-full max-w-2xl lg:mx-auto overflow-hidden rounded-lg">
            <div id="slider" class="flex transition-transform duration-500 ease-in-out">
                <img src="/images/image-sliding/foto10.jpg" class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]"
                    alt="Slide 1">
                <img src="/images/image-sliding/foto11.jpg" class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]"
                    alt="Slide 2">
                <img src="/images/image-sliding/foto12.jpg" class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]"
                    alt="Slide 3">
                <img src="/images/image-sliding/foto13.jpg" class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]"
                    alt="Slide 4">
                <img src="/images/image-sliding/foto14.jpg"
                    class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]" alt="Slide 5">
                <img src="/images/image-sliding/foto15.jpg"
                    class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]" alt="Slide 6">
                <img src="/images/image-sliding/foto16.jpg"
                    class="w-full flex-shrink-0 object-cover h-[300px] sm:h-[400px]" alt="Slide 7">
            </div>

            <!-- Tombol navigasi -->
            <button onclick="prevSlide()"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100 z-10">
                &#10094;
            </button>
            <button onclick="nextSlide()"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100 z-10">
                &#10095;
            </button>
        </div>
    </section>

    <script>
        // Pertama, cari elemen slider di halaman
        const slider = document.getElementById("slider");

        // Bungkus semua logika di dalam 'if (slider)'
        // Ini memastikan kode hanya berjalan jika elemen dengan id="slider" ditemukan
        if (slider) {
            let currentIndex = 0;

            function showSlide(index) {
                // Kita tidak perlu mencari elemen slider lagi di sini karena sudah ada di atas
                const maxIndex = slider.children.length - 1;

                if (index < 0) {
                    currentIndex = maxIndex;
                } else if (index > maxIndex) {
                    currentIndex = 0;
                } else {
                    currentIndex = index;
                }

                slider.style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            // Set interval untuk auto-slide hanya jika slider ada
            setInterval(() => {
                nextSlide();
            }, 10000);

            // Pasang fungsi ke window agar bisa diakses dari HTML (untuk tombol panah)
            // hanya jika slider ada
            window.nextSlide = nextSlide;
            window.prevSlide = prevSlide;
        }
    </script>
@endsection
