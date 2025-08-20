@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profile Toko</h1>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="store_name" class="block text-sm font-medium text-gray-700">Nama Toko</label>
                    <input type="text" name="store_name" id="store_name"
                        value="{{ old('store_name', $settings['store_name']->value ?? '') }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="store_address" class="block text-sm font-medium text-gray-700">Alamat Toko</label>
                    <textarea name="store_address" id="store_address" rows="3"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">{{ old('store_address', $settings['store_address']->value ?? '') }}</textarea>
                </div>
                <div>
                    <label for="store_contact" class="block text-sm font-medium text-gray-700">Kontak Toko
                        (Telepon/WA)</label>
                    <input type="text" name="store_contact" id="store_contact"
                        value="{{ old('store_contact', $settings['store_contact']->value ?? '') }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="store_email" class="block text-sm font-medium text-gray-700">Email Toko</label>
                    <input type="email" name="store_email" id="store_email"
                        value="{{ old('store_email', $settings['store_email']->value ?? '') }}"
                        class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
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
                    <label for="store_logo" class="block text-sm font-medium text-gray-700">Logo Toko</label>
                    <input type="file" name="store_logo" id="store_logo"
                        class="mt-1 block w-full p-1 border text-sm text-gray-500 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah logo. Format: PNG, JPG, JPEG.
                        Maks: 2MB.</p>
                    @error('store_logo')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    @if (isset($settings['store_logo']) && $settings['store_logo']->value)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Logo saat ini:</p>
                            <img src="{{ Storage::url($settings['store_logo']->value) }}" alt="Logo Toko"
                                class="h-16 w-auto bg-gray-100 p-2 rounded-md mt-2">
                        </div>
                    @endif
                </div>
                <div class="border-t pt-6 mt-6">
                    <label for="store_qris_image" class="block text-sm font-medium text-slate-700">Gambar Kode QRIS</label>
                    <input type="file" name="store_qris_image" id="store_qris_image"
                        class="mt-1 block w-full text-sm p-1 border rounded-lg text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar. Format: PNG, JPG.</p>
                    @error('store_qris_image')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    @if (isset($settings['store_qris_image']) && $settings['store_qris_image']->value)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Kode QRIS saat ini:</p>
                            <img src="{{ Storage::url($settings['store_qris_image']->value) }}" alt="Kode QRIS"
                                class="h-40 w-40 object-cover rounded-lg mt-2">
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection
