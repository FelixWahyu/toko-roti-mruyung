<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
    @forelse ($products as $product)
        <div class="group relative flex flex-col rounded-md p-1 border border-gray-300 hover:shadow-md">
            <a href="{{ route('products.show', $product->slug) }}"
                class="w-full min-h-64 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-64 lg:aspect-none">
                <img src="{{ asset('storage/' . $product->image) }}" alt="[Gambar {{ $product->name }}]"
                    class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                @if ($product->created_at->diffInDays(now()) <= 7)
                    <div
                        class="absolute top-3 left-3 bg-indigo-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg shadow-md">
                        BARU
                    </div>
                @endif
            </a>
            <div class="mt-4">
                <div class="ml-3">
                    <h3 class="text-lg font-bold text-gray-900">
                        <a href="{{ route('products.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <a class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</a>
                </div>
                <div class="mt-3 flex items-center justify-between">
                    <!-- <div>
                        @if ($product->stock > 0)
                            <span class="font-medium text-sm text-gray-800">Tersedia: {{ $product->stock }}</span>
                        @else
                            <span class="font-medium text-sm text-gray-500">Stok Habis</span>
                        @endif
                    </div> -->
                    <div class="flex">
                        <div class="ml-3">
                            <span
                                class="text-amber-700 font-semibold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <!-- <span class="text-gray-500 text-sm">/{{ $product->unit->name }}</span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                @if ($product->stock > 0)
                    <!-- <form action="{{ route('cart.store', $product) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-brown-500 border border-transparent rounded-md gap-2 py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span>Beli di Shopee</span>
                        </button>
                    </form> -->
                    <a href="{{ route('products.show', $product->slug) }}" target="_blank" rel="noopener noreferrer"
                        class="w-full bg-brown-500 border border-transparent rounded-md gap-2 py-1.5 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-brown-600 focus:outline-none">
                        <span>Detail</span>
                    </a>
                @else
                    <div
                        class="w-full bg-gray-400 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white cursor-not-allowed">
                        Stok Habis
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500 text-lg">Produk yang anda cari tidak ditemukan!</p>
            <a href="{{ route('products.index') }}"
                class="mt-4 inline-block text-brown-500 hover:text-brown-600 font-semibold">Lihat semua produk</a>
        </div>
    @endforelse
</div>

<div class="mt-10">
    {{ $products->links() }}
</div>
