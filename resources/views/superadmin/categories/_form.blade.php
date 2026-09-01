@csrf
<div>
    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Kategori</label>
    <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
        required>
    @error('name')
        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
    @enderror
</div>
<div class="mt-4">
    <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Gambar Kategori</label>
    <input type="file" name="image" id="image"
        class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-800 hover:file:bg-gray-200">
    @error('image')
        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
    @enderror
    @if (isset($category) && $category->image)
        <div class="mt-3">
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                class="h-24 w-24 object-cover rounded-sm border border-gray-200">
        </div>
    @endif
</div>
<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.categories.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
