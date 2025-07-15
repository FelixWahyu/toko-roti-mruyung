<nav x-data="{ open: false }" class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Nama Toko -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    {{-- Ganti dengan logo Anda jika ada --}}
                    @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                        <img class="h-10 w-auto" src="{{ Storage::url($globalSettings['store_logo']->value) }}"
                            alt="Logo Toko">
                    @else
                        <svg class="h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25pc-1.5 0-1.5-.75-1.5-1.5V8.25A2.25 2.25 0 014.5 6h15a2.25 2.25 0 012.25 2.25v11.25c0 .828-.672 1.5-1.5 1.5H13.5z" />
                        </svg>
                    @endif
                    <span
                        class="font-bold text-xl text-gray-800">{{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}</span>
                </a>
            </div>

            <!-- Navigasi Utama (Desktop) -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}"
                    class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-600 font-bold' : 'text-gray-600' }} hover:text-indigo-600">Beranda</a>
                <a href="{{ route('about') }}"
                    class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-600 font-bold' : 'text-gray-600' }} hover:text-indigo-600">Tentang
                    Kami</a>
                <a href="{{ route('products.index') }}"
                    class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('products.index') ? 'text-indigo-600 font-bold' : 'text-gray-600' }} hover:text-indigo-600">Produk</a>
                <a href="{{ route('contact') }}"
                    class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? 'text-indigo-600 font-bold' : 'text-gray-600' }} hover:text-indigo-600">Kontak</a>
            </div>

            <!-- Tombol Auth & User (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Ikon Keranjang -->
                <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    @if (isset($cartItemCount) && $cartItemCount > 0)
                        <span
                            class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                            {{ $cartItemCount }}
                        </span>
                    @endif
                </a>
                <div class="h-6 border-l border-gray-300"></div>
                @guest
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium {{ request()->routeIs('login') ? 'px-4 py-2 text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700' : 'text-gray-600 hover:text-indigo-600' }}">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-sm font-medium {{ request()->routeIs('register') ? 'px-4 py-2 text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700' : 'text-gray-600 hover:text-indigo-600' }}">
                        Daftar
                    </a>
                @else
                    <!-- Dropdown Pengguna -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2">
                            <div class="h-8 w-8 rounded-full overflow-hidden bg-gray-200">
                                @if (Auth::user()->profile_picture)
                                    <img class="h-full w-full object-cover"
                                        src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="Foto Profil">
                                @else
                                    <svg class="h-full w-full text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                @endif
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <a href="{{ route('profile.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                            <a href="{{ route('profile.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pesanan Saya</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Tombol Hamburger (Mobile) -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div :class="{ 'block': open, 'hidden': !open }" class="md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}"
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('home') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300' }}">Beranda</a>
            <a href="{{ route('about') }}"
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('about') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300' }}">Tentang
                Kami</a>
            <a href="{{ route('products.index') }}"
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('products.index') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300' }}">Produk</a>
            <a href="{{ route('contact') }}"
                class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('contact') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300' }}">Kontak</a>
        </div>
        <!-- Opsi Auth Mobile -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            @guest
                <div class="flex items-center px-4">
                    <a href="{{ route('login') }}"
                        class="w-full text-center px-4 py-2 text-base font-medium {{ request()->routeIs('login') ? 'text-white bg-indigo-600 rounded-md mx-4 hover:bg-indigo-700' : 'text-gray-600 hover:text-indigo-600' }}">Login</a>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('register') }}"
                        class="block px-4 py-2 text-base font-medium text-center {{ request()->routeIs('register') ? 'text-white bg-indigo-600 rounded-md mx-4 hover:bg-indigo-700' : 'text-gray-600 hover:text-indigo-600' }}">
                        Daftar
                    </a>
                </div>
            @else
                <div class="flex items-center px-4">
                    <div>
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.index') }}"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Profil
                        Saya</a>
                    <a href="{{ route('profile.index') }}"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Pesanan
                        Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>
