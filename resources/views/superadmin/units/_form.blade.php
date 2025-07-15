@csrf
<div>
    <label for="name" class="block text-sm font-medium text-slate-700">Nama Unit</label>
    <input type="text" name="name" id="name" value="{{ old('name', $unit->name ?? '') }}"
        class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        required>
    @error('name')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="flex justify-end mt-6 pt-6 border-t border-slate-200">
    <a href="{{ route('admin.units.index') }}"
        class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded-lg shadow-sm mr-2">Batal</a>
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
