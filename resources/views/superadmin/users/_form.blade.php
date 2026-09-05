@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <div>
        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('name')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('username')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Alamat Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none" required>
        @error('email')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="role" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Role (Hak Akses)</label>
        <select name="role" id="role" class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none"
            required>
            <option value="pelanggan" {{ old('role', $user->role ?? '') == 'pelanggan' ? 'selected' : '' }}>
                Pelanggan
            </option>
            <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
            @if (auth()->user()->role === 'owner')
                <option value="owner" {{ old('role', $user->role ?? '') == 'owner' ? 'selected' : '' }}>Owner</option>
            @endif
        </select>
        @error('role')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <p class="text-xs text-gray-500">Kosongkan password jika tidak ingin mengubahnya.</p>
    </div>
    <div>
        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
        @error('password')
            <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-sm text-sm text-gray-900 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 focus:outline-none">
    </div>
</div>
<div class="flex justify-end mt-6 pt-5 border-t border-gray-200">
    <a href="{{ route('admin.users.index') }}"
        class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-semibold py-2 px-4 rounded-sm text-sm mr-2 transition">Batal</a>
    <button type="submit"
        class="bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>
