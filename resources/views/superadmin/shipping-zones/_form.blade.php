@csrf
<div class="space-y-4">
    <div>
        <label for="district" class="block text-sm font-medium text-slate-700">Nama Daerah</label>
        <input type="text" name="district" id="district" value="{{ old('district', $shippingZone->district ?? '') }}"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('district')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="cost" class="block text-sm font-medium text-slate-700">Biaya Kirim (Rp)</label>
        <input type="number" name="cost" id="cost" value="{{ old('cost', $shippingZone->cost ?? '') }}"
            class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required placeholder="Contoh: 10000">
        @error('cost')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="flex justify-end mt-6 pt-6 border-t border-slate-200">
    <a href="{{ route('admin.shipping-zones.index') }}"
        class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded-lg shadow-sm mr-2">Batal</a>
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
