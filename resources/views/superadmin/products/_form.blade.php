@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="name" class="block text-sm font-medium text-slate-700">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required>
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="category_id" class="block text-sm font-medium text-slate-700">Kategori</label>
        <select name="category_id" id="category_id"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
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
        <label for="unit_id" class="block text-sm font-medium text-slate-700">Unit (Satuan)</label>
        <select name="unit_id" id="unit_id"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required>
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
        <label for="price" class="block text-sm font-medium text-slate-700">Harga</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required>
        @error('price')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="stock" class="block text-sm font-medium text-slate-700">Stok</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required>
        @error('stock')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="description" class="block text-sm font-medium text-slate-700">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="image" class="block text-sm font-medium text-slate-700">Gambar Produk</label>
        <input type="file" name="image" id="image"
            class="mt-1 block w-full p-1 border text-sm text-slate-500 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @error('image')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
        @if (isset($product) && $product->image)
            <div class="mt-4">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                    class="h-32 w-32 object-cover rounded-lg">
            </div>
        @endif
    </div>
</div>
<div class="flex justify-end mt-6 pt-6 border-t border-slate-200">
    <a href="{{ route('admin.products.index') }}"
        class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded-lg shadow-sm mr-2">Batal</a>
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
