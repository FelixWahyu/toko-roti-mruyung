<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        {{-- Tombol Hamburger untuk memunculkan sidebar di mobile --}}
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        {{-- FIX: Logika dropdown diperbaiki di sini --}}
        {{-- @click.away ditambahkan ke div utama dropdown --}}
        <div x-data="{ dropdownOpen: false }" @click.away="dropdownOpen = false" class="relative">
            <button @click="dropdownOpen = !dropdownOpen"
                class="relative flex items-center h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none bg-indigo-100 text-indigo-600 justify-center">
                @if (Auth::user()->profile_picture)
                    <img class="h-full w-full object-cover" src="{{ Storage::url(Auth::user()->profile_picture) }}"
                        alt="Foto Profil">
                @else
                    <div class="h-full w-full bg-indigo-100 text-indigo-600 flex items-center justify-center">
                        <span class="font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                @endif
            </button>

            <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20"
                style="display: none;">
                <a href="{{ route('admin.profile.index') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
