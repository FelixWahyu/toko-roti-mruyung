@csrf
<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
    <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
    @error('name')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="flex justify-end">
    <a href="{{ route('admin.categories.index') }}"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
