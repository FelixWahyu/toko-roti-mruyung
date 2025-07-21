<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
    @forelse ($products as $product)
        <div class="group relative flex flex-col">
            <a href="{{ route('products.show', $product->slug) }}"
                class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                <img src="{{ Storage::url($product->image) }}" alt="[Gambar {{ $product->name }}]"
                    class="w-full h-full object-center object-cover lg:w-full lg:h-full">
            </a>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="{{ route('products.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <a class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</a>
                </div>
                <p class="text-sm font-medium text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <div class="mt-4">
                <form action="{{ route('cart.store', $product) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full bg-brown-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                            </path>
                        </svg> <span> ke Keranjang</span>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500 text-lg">Oops! Produk yang anda cari tidak ditemui.</p>
            <a href="{{ route('products.index') }}"
                class="mt-4 inline-block text-brown-500 hover:text-brown-600 font-semibold">Lihat semua produk</a>
        </div>
    @endforelse
</div>

{{-- Navigasi Paginasi --}}
<div class="mt-10">
    {{ $products->links() }}
</div>
