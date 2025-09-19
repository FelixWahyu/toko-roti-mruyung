@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="pb-12 text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Katalog Produk Kami</h2>
                <p class="mt-4 text-base text-gray-500">Temukan roti dan kue favorit Anda di sini. Dibuat dengan cinta setiap
                    hari.</p>
                <div
                    class="mt-6 inline-block bg-yellow-50 border border-yellow-200 text-yellow-800 
                text-sm px-4 py-2 rounded-lg shadow-sm">
                    Batas pengiriman setiap hari pukul <b>21:00 WIB</b>.
                    Pesanan setelah itu akan diproses pada hari berikutnya.
                </div>
            </div>

            <div x-data="productFilter()">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-12">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="md:col-span-2">
                            <label for="search" class="block text-sm font-medium text-gray-700">Cari Produk</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="search" x-model.debounce.500ms="search"
                                    class="focus:ring-brown-400 focus:border-brown-400 block w-full pl-10 py-2 border sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Search here...">
                            </div>
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select id="category" x-model="category"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-brown-400 focus:border-brown-400 sm:text-sm rounded-md">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="sort_by" class="block text-sm font-medium text-gray-700">Urutkan</label>
                            <select id="sort_by" x-model="sort"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-brown-400 focus:border-brown-400 sm:text-sm rounded-md">
                                <option value="">Default</option>
                                <option value="price_asc">Harga: Terendah ke Tertinggi</option>
                                <option value="price_desc">Harga: Tertinggi ke Terendah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="relative min-h-[300px]">
                    <div x-show="loading" x-transition
                        class="absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center z-10">
                        <svg class="animate-spin h-8 w-8 text-brown-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>
                    <div id="product-list-container">
                        @include('produks._produk-list', ['products' => $products])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        })
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('product-list-container').innerHTML = html;
                        })
                        .catch(error => {
                            console.error('Error fetching products:', error);
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                }
            }
        }
    </script>
@endsection
