@csrf
<div class="space-y-4">
    <div>
        <label for="bank_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Bank</label>
        <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $storeAccount->bank_name ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('bank_name')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="account_number" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nomor Rekening</label>
        <input type="text" name="account_number" id="account_number"
            value="{{ old('account_number', $storeAccount->account_number ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('account_number')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="account_holder_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Pemilik Rekening</label>
        <input type="text" name="account_holder_name" id="account_holder_name"
            value="{{ old('account_holder_name', $storeAccount->account_holder_name ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('account_holder_name')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.store-accounts.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
