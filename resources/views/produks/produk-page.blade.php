@extends('layouts.app')

@section('content')
    <div class="relative bg-gray-900 h-[80vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/galery/toko-roti-mruyung.webp') }}" alt="Artisan Bakery Background"
                class="w-full h-full object-cover opacity-60 transform scale-105 animate-slow-zoom">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-gray-900/40 to-gray-900/90"></div>
        </div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto mt-6">
            <h1
                class="text-4xl md:text-6xl font-extrabold text-white tracking-tight drop-shadow-2xl mb-6 font-serif leading-tight">
                Kelezatan Roti Hangat <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-200 to-amber-500">
                    Langsung dari Oven
                </span>
            </h1>

            <p class="mt-4 text-xl text-gray-300 font-light mb-10 max-w-2xl mx-auto leading-relaxed">
                Nikmati sensasi roti lembut tanpa pengawet yang dipanggang segar setiap pagi.
                Sempurna untuk sarapan keluarga atau teman minum kopi Anda.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#daftar-menu-lengkap"
                    class="group relative inline-flex items-center justify-center px-8 py-3 text-lg font-bold text-white transition-all duration-200 bg-amber-600 font-pj rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 hover:bg-amber-700 shadow-lg hover:shadow-amber-500/50 transform hover:-translate-y-1">
                    Lihat Katalog Roti
                </a>

                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20ingin%20tanya%20tentang%20roti..."
                    target="_blank"
                    class="inline-flex items-center justify-center px-8 py-3 text-lg font-bold text-white transition-all duration-200 bg-white/10 border border-white/30 backdrop-blur-md rounded-full hover:bg-white hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white shadow-lg">
                    Pesan via Whatsapp
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16">
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

    <div class="bg-white py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-center items-center lg:justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 font-serif">Favorit Pelanggan</h2>
                    <p class="mt-2 text-gray-500">Paling banyak dicari minggu ini</p>
                </div>
                <div class="flex gap-3 mt-4 md:mt-0">
                    <button
                        class="promo-prev w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-amber-600 hover:border-amber-600 hover:text-white transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        class="promo-next w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-amber-600 hover:border-amber-600 hover:text-white transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="swiper promo-slider overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($rekomendasiProducts as $product)
                        <div class="swiper-slide h-auto">
                            <div
                                class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-300 transition-all duration-300 h-full flex flex-col overflow-hidden">
                                <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                                    <img src="{{ asset('storage/' . $product->image ?? $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">

                                    <div class="absolute top-3 left-3 flex flex-col gap-2">
                                        @if ($product->created_at->diffInDays(now()) <= 7)
                                            <span
                                                class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">BARU</span>
                                        @endif
                                        <span
                                            class="bg-white/90 backdrop-blur text-gray-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                            {{ $product->category->name }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-5 flex flex-col flex-1">
                                    <h3
                                        class="text-lg font-bold text-gray-900 group-hover:text-amber-600 transition-colors line-clamp-1 mb-1">
                                        <a href="{{ route('products.show', $product->slug) }}">
                                            <span class="absolute inset-0 z-10"></span>
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                                        {{ $product->description ?? 'Roti lembut dengan bahan berkualitas.' }}</p>

                                    <div class="mt-auto flex items-center justify-between">
                                        <div>
                                            <p class="text-xs text-gray-400">Harga</p>
                                            <p class="text-lg font-bold text-amber-600">
                                                Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 min-h-screen py-16" x-data="productFilter()">
        <div id="daftar-menu-lengkap" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl font-bold text-gray-900 font-serif">Katalog Lengkap</h2>
                <p class="mt-3 text-gray-500">Temukan roti favorit Anda melalui fitur pencarian di bawah ini.</p>

                <div
                    class="mt-6 inline-flex items-center gap-2 px-4 py-2 bg-blue-50 border border-blue-100 rounded-full text-blue-700 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Order sebelum <b>20:00 WIB</b> untuk pengiriman hari ini.</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8 mb-10">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">

                    <div class="md:col-span-6">
                        <label for="search"
                            class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cari Produk</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500 group-focus-within:text-amber-500 transition-colors"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="search" x-model.debounce.500ms="search"
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-gray-300 focus:bg-white border focus:border-amber-500 focus:ring-0 rounded-xl transition duration-200 placeholder-gray-500 font-medium"
                                placeholder="Cth: Roti Tawar, Croissant...">
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label for="category"
                            class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
                        <div class="relative">
                            <select id="category" x-model="category"
                                class="block w-full pl-4 pr-10 py-3 bg-gray-50 border-gray-300 focus:bg-white border focus:border-amber-500 focus:ring-0 rounded-xl appearance-none cursor-pointer font-medium transition duration-200">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label for="sort_by"
                            class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Urutkan</label>
                        <div class="relative">
                            <select id="sort_by" x-model="sort"
                                class="block w-full pl-4 pr-10 py-3 bg-gray-50 border-gray-300 focus:bg-white border focus:border-amber-500 focus:ring-0 rounded-xl appearance-none cursor-pointer font-medium transition duration-200">
                                <option value="">Paling Sesuai</option>
                                <option value="price_asc">Harga Terendah</option>
                                <option value="price_desc">Harga Tertinggi</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative min-h-[400px]">
                <div x-show="loading" x-transition.opacity
                    class="absolute inset-0 bg-gray-50 bg-opacity-80 flex flex-col items-center justify-center z-20 backdrop-blur-sm rounded-xl">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-amber-600 mb-4"></div>
                    <p class="text-gray-500 font-medium">Mengambil data roti...</p>
                </div>

                <div id="product-list-container">
                    @include('produks._produk-list', ['products' => $products])
                </div>
            </div>
        </div>
    </div>

    <div class="relative bg-amber-900 py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556910103-1c02745a30bf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                alt="Baker working" class="w-full h-full object-cover opacity-20 mix-blend-overlay">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-900/90 to-amber-900/40"></div>
        </div>

        <div
            class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-8">

            <div class="text-center md:text-left md:max-w-2xl">
                <h2 class="text-3xl md:text-4xl font-bold text-white font-serif mb-4">
                    Butuh Kue untuk Momen Spesial?
                </h2>
                <p class="text-amber-100 text-lg leading-relaxed">
                    Kami menerima pesanan khusus untuk <b>Ulang Tahun, Pernikahan, Hantaran,</b> atau <b>Snack Box</b> acara
                    kantor.
                    Diskusikan ide kue impian Anda bersama tim pastry ahli kami.
                </p>

                <div
                    class="mt-6 flex flex-wrap gap-4 justify-center md:justify-start text-sm font-medium text-amber-200/80">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Fresh Made
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Harga Terbaik
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Tanpa Pengawet
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20ingin%20konsultasi%20pesanan%20kue%20custom"
                    target="_blank"
                    class="inline-flex items-center justify-center px-8 py-4 bg-white text-amber-900 font-bold rounded-full hover:bg-amber-50 transition transform hover:scale-105 shadow-xl border-2 border-white">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    Konsultasi Pesanan
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.promo-slider', {
                loop: true,
                slidesPerView: 1.2,
                spaceBetween: 16,
                centeredSlides: false,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: '.promo-next',
                    prevEl: '.promo-prev'
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2.5,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 24
                    },
                },
            });
        });

        function productFilter() {
            return {
                search: '{{ $searchTerm ?? '' }}',
                category: '{{ $selectedCategory ?? '' }}',
                sort: '{{ $selectedSort ?? '' }}',
                loading: false,

                init() {
                    this.$watch('search', () => this.fetchProducts());
                    this.$watch('category', () => this.fetchProducts());
                    this.$watch('sort', () => this.fetchProducts());
                },

                fetchProducts() {
                    this.loading = true;
                    const params = new URLSearchParams({
                        search: this.search,
                        category: this.category,
                        sort_by: this.sort,
                    });

                    const url = `{{ route('products.filter') }}?${params.toString()}`;
                    history.pushState(null, '', `{{ route('products.index') }}?${params.toString()}`);

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                        })
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('product-list-container').innerHTML = html;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                }
            }
        }
    </script>
@endsection
