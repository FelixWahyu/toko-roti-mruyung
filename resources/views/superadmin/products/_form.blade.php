@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="unit_id" class="block text-sm font-medium text-gray-700">Unit (Satuan)</label>
        <select name="unit_id" id="unit_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}"
                    {{ isset($product) && $product->unit_id == $unit->id ? 'selected' : '' }}>
                    {{ $unit->name }}
                </option>
            @endforeach
        </select>
        @error('unit_id')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        @error('price')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        @error('stock')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
        <input type="file" name="image" id="image"
            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @error('image')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
        @if (isset($product) && $product->image_url)
            <div class="mt-4">
                <p class="text-sm text-gray-500">Gambar saat ini:</p>
                <img src="{{ Storage::url($product->image_url) }}" alt="{{ $product->name }}"
                    class="h-32 w-32 object-cover rounded-md">
            </div>
        @endif
    </div>
</div>
<div class="flex justify-end mt-6">
    <a href="{{ route('admin.products.index') }}"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
