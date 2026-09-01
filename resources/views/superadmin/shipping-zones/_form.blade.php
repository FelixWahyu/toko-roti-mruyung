@csrf
<div class="space-y-4">
    <div>
        <label for="district" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Daerah</label>
        <input type="text" name="district" id="district" value="{{ old('district', $shippingZone->district ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('district')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="cost" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Biaya Kirim (Rp)</label>
        <input type="number" name="cost" id="cost" value="{{ old('cost', $shippingZone->cost ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required placeholder="Contoh: 10000">
        @error('cost')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.shipping-zones.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
