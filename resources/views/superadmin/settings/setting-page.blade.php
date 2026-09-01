@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-900 tracking-tight mb-6">Profil Toko</h1>
    <div class="bg-white p-6 rounded-sm border border-gray-200">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div>
                    <label for="store_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Toko</label>
                    <input type="text" name="store_name" id="store_name"
                        value="{{ old('store_name', $settings['store_name']->value ?? '') }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
                </div>
                <div>
                    <label for="store_address" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Alamat Toko</label>
                    <textarea name="store_address" id="store_address" rows="3"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">{{ old('store_address', $settings['store_address']->value ?? '') }}</textarea>
                </div>
                <div>
                    <label for="store_contact" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Kontak Toko (Telepon/WA)</label>
                    <input type="text" name="store_contact" id="store_contact"
                        value="{{ old('store_contact', $settings['store_contact']->value ?? '') }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                </div>
                <div>
                    <label for="store_email" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Email Toko</label>
                    <input type="email" name="store_email" id="store_email"
                        value="{{ old('store_email', $settings['store_email']->value ?? '') }}"
                        class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
                </div>
                {{-- <div>
                    <label for="min_purchase_free_shipping" class="block text-sm font-medium text-slate-700">Minimal Belanja
                        Gratis Ongkir</label>
                    <input type="number" name="min_purchase_free_shipping" id="min_purchase_free_shipping"
                        value="{{ old('min_purchase_free_shipping', $settings['min_purchase_free_shipping']->value ?? 0) }}"
                        class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm">
                    <p class="mt-1 text-xs text-gray-500">Isi 0 jika tidak ada promo gratis ongkir.</p>
                </div>
                <div>
                    <label for="free_shipping_districts" class="block text-sm font-medium text-slate-700">Wilayah Gratis
                        Ongkir</label>
                    <input type="text" name="free_shipping_districts" id="free_shipping_districts"
                        value="{{ old('free_shipping_districts', $settings['free_shipping_districts']->value ?? '') }}"
                        class="mt-1 block w-full p-1 border border-slate-300 rounded-lg shadow-sm">
                    <p class="mt-1 text-xs text-gray-500">Pisahkan nama kecamatan dengan koma. Contoh: Purwokerto
                        Timur,Sokaraja</p>
                </div> --}}
                <div>
                    <label for="store_logo" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Logo Toko</label>
                    <input type="file" name="store_logo" id="store_logo"
                        class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-800 hover:file:bg-gray-200">
                    <p class="mt-1 text-xs text-gray-400">Kosongkan jika tidak ingin mengubah logo. Format: PNG, JPG, JPEG. Maks: 2MB.</p>
                    @error('store_logo')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror

                    @if (isset($settings['store_logo']) && $settings['store_logo']->value)
                        <div class="mt-3">
                            <p class="text-xs font-medium text-gray-500">Logo saat ini:</p>
                            <img src="{{ asset('storage/' . $settings['store_logo']->value) }}" alt="Logo Toko"
                                class="h-14 w-auto bg-gray-50 p-2 rounded-sm border border-gray-200 mt-1.5 object-contain">
                        </div>
                    @endif
                </div>
                <div class="border-t border-gray-100 pt-5 mt-5">
                    <label for="store_qris_image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Gambar Kode QRIS</label>
                    <input type="file" name="store_qris_image" id="store_qris_image"
                        class="block w-full p-2 border border-gray-300 text-xs text-gray-500 rounded-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-800 hover:file:bg-gray-200">
                    <p class="mt-1 text-xs text-gray-400">Kosongkan jika tidak ingin mengubah gambar. Format: PNG, JPG.</p>
                    @error('store_qris_image')
                        <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                    @enderror

                    @if (isset($settings['store_qris_image']) && $settings['store_qris_image']->value)
                        <div class="mt-3">
                            <p class="text-xs font-medium text-gray-500">Kode QRIS saat ini:</p>
                            <img src="{{ asset('storage/' . $settings['store_qris_image']->value) }}" alt="Kode QRIS"
                                class="h-36 w-36 object-cover rounded-sm border border-gray-200 mt-1.5">
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
                <button type="submit"
                    class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection
