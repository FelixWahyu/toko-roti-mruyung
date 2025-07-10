<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <div class="flex items-center">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen"
                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                <span class="font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </button>
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                style="display: none;"></div>
            <div x-show="dropdownOpen"
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
