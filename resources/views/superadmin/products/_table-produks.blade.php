<div class="bg-white rounded-sm overflow-x-auto border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Gambar</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Kategori</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Harga</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Stok</th>
                <th class="px-5 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($products as $product)
                <tr class="hover:bg-gray-50/70 transition-colors">
                    <td class="px-5 py-3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="h-10 w-10 object-cover rounded-sm border border-gray-200">
                    </td>
                    <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">
                        <div class="flex items-center space-x-2">
                            <span>{{ $product->name }}</span>
                            @if ($product->shopee_link)
                                <a href="{{ $product->shopee_link }}" target="_blank" rel="noopener noreferrer"
                                    title="Buka Link Shopee" class="text-orange-500 hover:text-orange-600 transition inline-flex items-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </td>
                    <td class="px-5 py-3 whitespace-nowrap text-gray-600">{{ $product->category->name }}</td>
                    <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-5 py-3 whitespace-nowrap text-gray-600">{{ $product->stock }} {{ $product->unit->name }}</td>
                    <td class="px-5 py-3 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-1.5">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="px-2.5 py-1.5 flex items-center space-x-1 bg-gray-100 text-gray-800 rounded-sm hover:bg-gray-200 text-xs font-medium transition"
                                title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                class="inline-block"
                                onsubmit="showConfirmation(event,'Hapus data?','Anda yakin ingin menghapus data {{ $product->name }}?', 'Hapus')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2.5 py-1.5 bg-white border border-gray-200 text-red-600 rounded-sm flex items-center space-x-1 hover:bg-red-50 text-xs font-medium transition"
                                    title="Hapus">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-6 text-center text-xs text-gray-500">Tidak ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $products->links() }}
</div>
