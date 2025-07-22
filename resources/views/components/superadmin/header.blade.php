<header class="flex justify-between items-center py-4 px-6 bg-white border-b border-slate-200">
    <!-- Tombol Hamburger -->
    <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 focus:outline-none md:hidden">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Placeholder untuk search atau elemen lain jika perlu -->
    <div class="flex-1"></div>

    <!-- Dropdown Profil -->
    <div x-data="{ dropdownOpen: false }" @click.away="dropdownOpen = false" class="relative">
        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2">
            <div class="h-9 w-9 rounded-full overflow-hidden bg-slate-200">
                @if (Auth::user()->profile_picture)
                    <img class="h-full w-full object-cover" src="{{ Storage::url(Auth::user()->profile_picture) }}"
                        alt="Foto Profil">
                @else
                    <div class="h-full w-full bg-indigo-100 text-indigo-600 flex items-center justify-center">
                        <span class="font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <span class="hidden sm:block font-semibold text-slate-700">{{ Auth::user()->name }}</span>
            <svg class="h-5 w-5 text-slate-400 hidden sm:block" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <div x-show="dropdownOpen" x-transition
            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20"
            style="display: none;">
            <a href="{{ route('admin.profile.index') }}"
                class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-600 hover:text-white">Profil</a>
            <form action="{{ route('logout') }}" method="POST"
                onsubmit="showConfirmation(event, 'Logout?', 'Anda yakin ingin keluar dari akun ini?', 'Ya, Logout')">
                @csrf
                <button type="submit"
                    class="w-full text-left block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-600 hover:text-white">Logout</button>
            </form>
        </div>
    </div>
</header>
