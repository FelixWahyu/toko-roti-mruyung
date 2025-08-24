@csrf
<div>
    <label for="name" class="block text-sm font-medium text-slate-700">Nama Kategori</label>
    <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
        class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        required>
    @error('name')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="mt-4">
    <label for="image" class="block text-sm font-medium text-slate-700">Gambar Kategori</label>
    <input type="file" name="image" id="image"
        class="mt-1 block border p-1 rounded-lg w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
    @error('image')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
    @if (isset($category) && $category->image)
        <div class="mt-4">
            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                class="h-24 w-24 object-cover rounded-lg">
        </div>
    @endif
</div>
<div class="flex justify-end mt-6 pt-6 border-t border-slate-200">
    <a href="{{ route('admin.categories.index') }}"
        class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded-lg shadow-sm mr-2">Batal</a>
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
