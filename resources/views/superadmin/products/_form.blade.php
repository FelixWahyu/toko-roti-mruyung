<!-- Quill Rich Text Editor Assets & Style -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<style>
    .ql-toolbar.ql-snow {
        border-color: #d1d5db !important;
        border-top-left-radius: 0.125rem;
        border-top-right-radius: 0.125rem;
        background-color: #f9fafb;
    }
    .ql-container.ql-snow {
        border-color: #d1d5db !important;
        border-bottom-left-radius: 0.125rem;
        border-bottom-right-radius: 0.125rem;
        font-family: inherit;
        font-size: 0.875rem;
        height: auto !important;
        position: relative;
    }
    .ql-editor {
        min-height: 160px;
        font-size: 0.875rem;
        line-height: 1.5;
    }
</style>

@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <div class="md:col-span-2">
        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required>
        @error('name')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="category_id" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Kategori</label>
        <select name="category_id" id="category_id"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="unit_id" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Unit (Satuan)</label>
        <select name="unit_id" id="unit_id"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}"
                    {{ isset($product) && $product->unit_id == $unit->id ? 'selected' : '' }}>
                    {{ $unit->name }}
                </option>
            @endforeach
        </select>
        @error('unit_id')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Harga (Rp)</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required>
        @error('price')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="stock" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Stok</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required>
        @error('stock')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="shopee_link" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Link Shopee (Opsional)</label>
        <input type="url" name="shopee_link" id="shopee_link" value="{{ old('shopee_link', $product->shopee_link ?? '') }}"
            placeholder="https://shopee.co.id/..."
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
        <p class="text-xs text-gray-500 mt-1">Kosongkan jika produk tidak dijual di Shopee. Jika diisi, tombol 'Beli di Shopee' akan tampil di halaman produk.</p>
        @error('shopee_link')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Deskripsi Produk</label>
        <div class="block w-full">
            <div id="quill-editor" class="bg-white">
                {!! old('description', $product->description ?? '') !!}
            </div>
        </div>
        <input type="hidden" name="description" id="description" value="{{ old('description', $product->description ?? '') }}">
        @error('description')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Gambar Produk</label>
        <input type="file" name="image" id="image"
            class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-800 hover:file:bg-gray-200">
        @error('image')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
        @if (isset($product) && $product->image)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="h-28 w-28 object-cover rounded-sm border border-gray-200">
            </div>
        @endif
    </div>
</div>
<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.products.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    function initQuillEditor() {
        const editorElem = document.getElementById('quill-editor');
        if (!editorElem || editorElem.dataset.quillInitialized === 'true') return;
        editorElem.dataset.quillInitialized = 'true';

        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Tulis deskripsi produk lengkap di sini...',
            modules: {
                toolbar: [
                    [{ 'header': [2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['clean']
                ]
            }
        });

        const hiddenInput = document.getElementById('description');

        quill.on('text-change', function() {
            if (quill.getText().trim().length === 0 && quill.root.innerHTML === '<p><br></p>') {
                hiddenInput.value = '';
            } else {
                hiddenInput.value = quill.root.innerHTML;
            }
        });

        const form = hiddenInput ? hiddenInput.closest('form') : null;
        if (form) {
            form.addEventListener('submit', function() {
                if (quill.getText().trim().length === 0 && quill.root.innerHTML === '<p><br></p>') {
                    hiddenInput.value = '';
                } else {
                    hiddenInput.value = quill.root.innerHTML;
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initQuillEditor);
    } else {
        initQuillEditor();
    }
</script>
