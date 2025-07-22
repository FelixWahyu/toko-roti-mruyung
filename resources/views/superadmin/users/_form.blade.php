@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username ?? '') }}"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
        @error('username')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm" required>
        @error('email')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="role" class="block text-sm font-medium text-gray-700">Role (Hak Akses)</label>
        <select name="role" id="role" class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm"
            required>
            <option value="pelanggan" {{ old('role', $user->role ?? '') == 'pelanggan' ? 'selected' : '' }}>Pelanggan
            </option>
            <option value="superadmin" {{ old('role', $user->role ?? '') == 'superadmin' ? 'selected' : '' }}>Super
                Admin
            </option>
            <option value="owner" {{ old('role', $user->role ?? '') == 'owner' ? 'selected' : '' }}>Owner</option>
        </select>
        @error('role')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <p class="text-sm text-gray-500">Kosongkan password jika tidak ingin mengubahnya.</p>
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
        @error('password')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
    </div>
</div>
<div class="flex justify-end mt-6">
    <a href="{{ route('admin.users.index') }}"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg shadow-sm mr-2">Batal</a>
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
