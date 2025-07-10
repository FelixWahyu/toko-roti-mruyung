@extends('layouts.superadmin-app')
@section('content')
    @if (auth()->user()->role == 'superadmin')
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Produk</h1>
            <a href="{{ route('admin.products.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Produk
            </a>
        </div>
    @else
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Produk</h1>
    @endif
    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                    @if (auth()->user()->role == 'superadmin')
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($products as $product)
                    <tr>
                        <td class="px-6 py-4">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                class="h-12 w-12 object-cover rounded-md">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock }} {{ $product->unit->name }}</td>
                        @if (auth()->user()->role == 'superadmin')
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="inline-block ml-4"
                                    onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
