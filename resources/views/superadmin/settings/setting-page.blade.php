@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Website</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="store_name" class="block text-sm font-medium text-gray-700">Nama Toko</label>
                    <input type="text" name="store_name" id="store_name"
                        value="{{ old('store_name', $settings['store_name']->value ?? '') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="store_address" class="block text-sm font-medium text-gray-700">Alamat Toko</label>
                    <textarea name="store_address" id="store_address" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('store_address', $settings['store_address']->value ?? '') }}</textarea>
                </div>
                <div>
                    <label for="store_contact" class="block text-sm font-medium text-gray-700">Kontak Toko
                        (Telepon/WA)</label>
                    <input type="text" name="store_contact" id="store_contact"
                        value="{{ old('store_contact', $settings['store_contact']->value ?? '') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                {{-- Form untuk upload logo bisa ditambahkan di sini --}}
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection
