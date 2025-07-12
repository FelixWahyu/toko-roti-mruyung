<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform transition-transform duration-300 ease-in-out md:relative md:translate-x-0">
    <div class="px-4 py-6 text-center">
        <h2 class="text-2xl font-bold">Panel {{ ucfirst(auth()->user()->role) }}</h2>
    </div>
    <nav class="px-2 text-gray-300">
        <!-- Menu Umum (Admin & Owner) -->
        <a href="{{ route('admin.dashboard.index') }}"
            class="flex items-center px-4 py-2 mt-5 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.dashboard.index') ? 'bg-gray-700' : '' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="mx-4">Dashboard</span>
        </a>

        <!-- Menu Khusus Owner -->
        @if (auth()->user()->role == 'owner')
            <a href="{{ route('admin.reports.index') }}"
                class="flex items-center px-4 py-2 mt-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.reports.*') ? 'bg-gray-700' : '' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span class="mx-4">Laporan Penjualan</span>
            </a>
        @endif

        <!-- Menu Operasional (Admin & Owner) -->
        <div x-data="{ open: {{ request()->routeIs('admin.categories.*') || request()->routeIs('admin.units.*') || request()->routeIs('admin.products.*') ? 'true' : 'false' }} }" class="mt-2">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-4 py-2 text-left rounded-md hover:bg-gray-700">
                <div class="flex items-center"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg><span class="mx-4">Master Data</span></div>
                <svg :class="{ 'transform rotate-180': open }" class="w-4 h-4 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" class="pl-8 mt-2 space-y-2">
                <a href="{{ route('admin.categories.index') }}"
                    class="block px-2 py-1 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.categories.*') ? 'text-white' : '' }}">Kategori</a>
                <a href="{{ route('admin.units.index') }}"
                    class="block px-2 py-1 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.units.*') ? 'text-white' : '' }}">Unit</a>
                <a href="{{ route('admin.products.index') }}"
                    class="block px-2 py-1 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.products.*') ? 'text-white' : '' }}">Produk</a>
            </div>
        </div>
        <a href="{{ route('admin.orders.index') }}"
            class="flex items-center px-4 py-2 mt-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.orders.*') ? 'bg-gray-700' : '' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
            <span class="mx-4">Manajemen Pesanan</span>
        </a>

        <!-- Menu Khusus Owner (lanjutan) -->
        @if (auth()->user()->role == 'owner')
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center px-4 py-2 mt-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
                <span class="mx-4">Manajemen Pengguna</span>
            </a>
            <a href="{{ route('admin.store-accounts.index') }}"
                class="flex items-center px-4 py-2 mt-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.store-accounts.*') ? 'bg-gray-700' : '' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                    </path>
                </svg>
                <span class="mx-4">Rekening Toko</span>
            </a>
        @endif

        <a href="{{ route('admin.settings.index') }}"
            class="flex items-center px-4 py-2 mt-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('admin.settings.index') ? 'bg-gray-700' : '' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.096 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="mx-4">Profile Toko</span>
        </a>
    </nav>
</aside>
