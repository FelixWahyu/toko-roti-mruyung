@csrf
<div class="space-y-4">
    <div>
        <label for="bank_name" class="block text-sm font-medium text-gray-700">Nama Bank</label>
        <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $storeAccount->bank_name ?? '') }}"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
        @error('bank_name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="account_number" class="block text-sm font-medium text-gray-700">Nomor Rekening</label>
        <input type="text" name="account_number" id="account_number"
            value="{{ old('account_number', $storeAccount->account_number ?? '') }}"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
        @error('account_number')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="account_holder_name" class="block text-sm font-medium text-gray-700">Nama Pemilik Rekening</label>
        <input type="text" name="account_holder_name" id="account_holder_name"
            value="{{ old('account_holder_name', $storeAccount->account_holder_name ?? '') }}"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
        @error('account_holder_name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="flex justify-end mt-6">
    <a href="{{ route('admin.store-accounts.index') }}"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg shadow-sm mr-2">Batal</a>
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
