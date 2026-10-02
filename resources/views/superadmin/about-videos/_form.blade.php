@csrf
<div class="space-y-5">
    <div>
        <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Judul Video</label>
        <input type="text" name="title" id="title" value="{{ old('title', $aboutVideo->title ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            placeholder="Contoh: Kehangatan Toko & Suasana Klasik" required>
        @error('title')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Deskripsi Singkat</label>
        <textarea name="description" id="description" rows="3"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            placeholder="Deskripsi singkat seputar video yang ditampilkan">{{ old('description', $aboutVideo->description ?? '') }}</textarea>
        @error('description')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <div class="p-4 bg-gray-50 border border-gray-200 rounded-sm space-y-4">
        <div class="flex items-center space-x-2 pb-2 border-b border-gray-200">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            <span class="text-xs font-bold uppercase tracking-wider text-gray-800">Media Video</span>
        </div>

        <div>
            <label for="video_file" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Upload File Video (Otomatis ke Cloudinary)</label>
            <input type="file" name="video_file" id="video_file" accept="video/mp4,video/quicktime,video/webm"
                class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-gray-800">
            <p class="mt-1 text-xs text-gray-400">Format: MP4, WEBM, MOV. Maks: 100MB. Rasio portrait 9:16 disarankan.</p>
            @error('video_file')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative flex py-1 items-center">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="flex-shrink mx-4 text-xs font-semibold text-gray-400 uppercase">Atau Gunakan URL Video</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <div>
            <label for="video_url" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">URL Video Langsung (Cloudinary / MP4 URL)</label>
            <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $aboutVideo->video_url ?? '') }}"
                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
                placeholder="https://res.cloudinary.com/.../video.mp4">
            <p class="mt-1 text-xs text-gray-400">Kosongkan jika Anda mengunggah file video baru di atas.</p>
            @error('video_url')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        @if (isset($aboutVideo) && $aboutVideo->video_url)
            <div class="mt-3 pt-3 border-t border-gray-200">
                <p class="text-xs font-medium text-gray-600 mb-2">Video saat ini:</p>
                <div class="w-36 aspect-[9/16] bg-black rounded-sm overflow-hidden border border-gray-300 shadow-sm">
                    <video class="w-full h-full object-cover" controls playsinline preload="metadata">
                        <source src="{{ $aboutVideo->video_url }}" type="video/mp4">
                    </video>
                </div>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label for="order" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Urutan Tampilan</label>
            <input type="number" name="order" id="order" value="{{ old('order', $aboutVideo->order ?? 0) }}" min="0"
                class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
                placeholder="0">
            <p class="mt-1 text-xs text-gray-400">Semakin kecil nilainya, semakin awal tampil di halaman.</p>
            @error('order')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center pt-5">
            <label class="inline-flex items-center space-x-2 cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $aboutVideo->is_active ?? true) ? 'checked' : '' }}
                    class="rounded-sm border-gray-300 text-gray-900 focus:ring-gray-900">
                <span class="text-sm font-medium text-gray-800">Aktifkan Video (Tampilkan di halaman Tentang Kami)</span>
            </label>
        </div>
    </div>
</div>

<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.about-videos.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
