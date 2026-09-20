@csrf
<div class="space-y-5">
    <div>
        <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Judul / Nama Banner</label>
        <input type="text" name="title" id="title" value="{{ old('title', $promoBanner->title ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            placeholder="Contoh: Promo Diskon Lebaran" required>
        @error('title')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Gambar Banner</label>
        <input type="file" name="image" id="image"
            class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-800 hover:file:bg-gray-200"
            {{ isset($promoBanner) ? '' : 'required' }}>
        <p class="mt-1 text-xs text-gray-400">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB. Rasio portrait 4:5 atau landscape rapi.</p>
        @error('image')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror

        @if (isset($promoBanner) && $promoBanner->image)
            <div class="mt-3">
                <p class="text-xs font-medium text-gray-500">Gambar saat ini:</p>
                <div class="mt-1.5 h-28 w-28 bg-gray-50 border border-gray-200 rounded-sm overflow-hidden flex items-center justify-center">
                    <img src="{{ $promoBanner->image_url }}" alt="{{ $promoBanner->title }}" class="h-full w-full object-cover">
                </div>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label for="link" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Link / URL Tujuan</label>
            <input type="text" name="link" id="link" value="{{ old('link', $promoBanner->link ?? '#') }}"
                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
                placeholder="Contoh: /produk atau https://...">
            <p class="mt-1 text-xs text-gray-400">Gunakan # jika tidak ada link khusus.</p>
            @error('link')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="order" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Urutan Tampilan</label>
            <input type="number" name="order" id="order" value="{{ old('order', $promoBanner->order ?? 0) }}" min="0"
                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
                placeholder="0">
            <p class="mt-1 text-xs text-gray-400">Semakin kecil nilainya, semakin awal tampil di slider.</p>
            @error('order')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="pt-2">
        <label class="inline-flex items-center space-x-2 cursor-pointer select-none">
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $promoBanner->is_active ?? true) ? 'checked' : '' }}
                class="rounded-sm border-gray-300 text-gray-900 focus:ring-gray-900">
            <span class="text-sm font-medium text-gray-800">Aktifkan Banner (Tampilkan di halaman utama)</span>
        </label>
    </div>
</div>

<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.promo-banners.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
