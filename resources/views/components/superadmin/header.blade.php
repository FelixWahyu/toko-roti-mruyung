<header class="flex justify-between items-center py-3.5 px-6 bg-white border-b border-gray-200">
    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-gray-900 focus:outline-none md:hidden">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>

    <div class="flex-1"></div>

    <div x-data="{ dropdownOpen: false }" @click.away="dropdownOpen = false" class="relative">
        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2.5 p-1 rounded-sm hover:bg-gray-50 transition">
            <div class="h-8 w-8 rounded-sm overflow-hidden bg-gray-100 border border-gray-200">
                @if (Auth::user()->profile_picture)
                    <img class="h-full w-full object-cover" src="{{ Storage::url(Auth::user()->profile_picture) }}"
                        alt="Foto Profil">
                @else
                    <div class="h-full w-full bg-gray-900 text-white flex items-center justify-center">
                        <span class="font-bold text-xs">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <span class="hidden sm:block font-medium text-sm text-gray-800">{{ Auth::user()->name }}</span>
            <svg class="h-4 w-4 text-gray-400 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div x-show="dropdownOpen" x-transition
            class="absolute right-0 mt-2 w-48 bg-white rounded-sm border border-gray-200 py-1 z-20"
            style="display: none;">
            <a href="{{ route('admin.profile.index') }}"
                class="block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-gray-900 hover:text-white transition">Profil</a>
            <form action="{{ route('logout') }}" method="POST"
                onsubmit="showConfirmation(event, 'Logout?', 'Anda yakin ingin keluar dari akun ini?', 'Logout')">
                @csrf
                <button type="submit"
                    class="w-full text-left block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-gray-900 hover:text-white transition">Logout</button>
            </form>
        </div>
    </div>
</header>
