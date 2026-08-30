@extends('layouts.auth')

@section('content')
    <div class="min-h-screen w-full grid grid-cols-1 lg:grid-cols-12 bg-white">
        <div class="hidden lg:flex lg:col-span-6 xl:col-span-6 relative bg-stone-900 flex-col justify-between p-10 xl:p-12 overflow-hidden">
            <img src="{{ asset('images/galery/toko-mruyung.webp') }}" alt="Toko Roti Mruyung"
                class="absolute inset-0 w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-t from-stone-950/95 via-stone-900/50 to-stone-950/70"></div>

            <div class="relative z-10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                    @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                        <img class="h-11 w-auto object-contain rounded-md shadow-sm"
                            src="{{ asset('storage/' . $globalSettings['store_logo']->value) }}"
                            alt="{{ $globalSettings['store_name']->value ?? 'Logo Toko' }}">
                    @else
                        <div class="h-10 w-10 rounded-md bg-amber-500 flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25c-1.5 0-1.5-.75-1.5-1.5V8.25A2.25 2.25 0 014.5 6h15a2.25 2.25 0 012.25 2.25v11.25c0 .828-.672 1.5-1.5 1.5H13.5z" />
                            </svg>
                        </div>
                    @endif
                    <span class="text-white font-bold text-lg font-serif tracking-wide group-hover:text-amber-300 transition-colors">
                        {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}
                    </span>
                </a>
            </div>

            <div class="relative z-10 text-white space-y-4">
                <h2 class="text-2xl xl:text-3xl font-bold font-serif leading-tight text-white">
                    Kehangatan Roti Autentik di Setiap Gigitan
                </h2>
                <p class="text-sm text-stone-300 font-light leading-relaxed max-w-md">
                    Resep turun-temurun dengan bahan pilihan terbaik, dipanggang segar setiap hari untuk menemani setiap momen berharga Anda.
                </p>
                <div class="pt-3 flex items-center gap-4 text-xs text-stone-400 border-t border-white/10">
                    <span>Freshly Baked</span>
                    <span>Artisan Bakery</span>
                    <span>Cafe & Resto</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-6 xl:col-span-6 flex flex-col justify-between p-6 sm:p-10 lg:p-12 xl:p-16 bg-[#FAF8F5] min-h-screen">
            <div class="flex justify-between items-center mb-6">
                <div class="lg:hidden">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                        @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                            <img class="h-9 w-auto object-contain"
                                src="{{ asset('storage/' . $globalSettings['store_logo']->value) }}"
                                alt="Logo">
                        @endif
                        <span class="text-gray-900 font-bold font-serif text-sm">
                            {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}
                        </span>
                    </a>
                </div>
            </div>

            <div class="w-full max-w-md mx-auto my-auto py-6">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 font-serif">Selamat Datang</h1>
                    <p class="mt-2 text-sm text-stone-500">Silakan masuk untuk mengakses akun Anda di {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1.5">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="username" name="username" type="text" required
                                placeholder="Masukkan username Anda"
                                value="{{ old('username') }}"
                                class="w-full pl-10 pr-3.5 py-2.5 bg-white border border-stone-300 rounded-md text-sm text-gray-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-600 transition-all duration-200 shadow-xs @error('username') border-red-500 bg-red-50/30 @enderror">
                        </div>
                        @error('username')
                            <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div x-data="{ showPassword: false }">
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-stone-600">Password</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" name="password" :type="showPassword ? 'text' : 'password'" required
                                placeholder="Masukan Password"
                                class="w-full pl-10 pr-10 py-2.5 bg-white border border-stone-300 rounded-md text-sm text-gray-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-600 transition-all duration-200 shadow-xs @error('password') border-red-500 bg-red-50/30 @enderror">
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-stone-400 hover:text-stone-600 focus:outline-none"
                                aria-label="Toggle password visibility">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label for="remember" class="flex items-center gap-2 cursor-pointer select-none">
                            <input id="remember" name="remember" type="checkbox"
                                class="w-4 h-4 text-brown-500 border-stone-300 rounded focus:ring-brown-400 focus:ring-offset-0 transition">
                            <span class="text-xs text-stone-600 font-medium">Ingat saya</span>
                        </label>
                        <!-- <div class="text-sm">
                            <a href="{{ route('password.request') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500">Lupa Password?</a>
                        </div> -->
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-2.5 px-4 bg-brown-500 hover:bg-brown-600 text-white font-semibold text-sm rounded-md shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                            <span>Masuk</span>
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 text-center">
                    <p class="text-sm text-stone-500">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-semibold text-brown-500 hover:text-brown-600 ml-1 transition-colors">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </div>

            <div class="text-center text-xs text-stone-400 pt-6">
                &copy; {{ date('Y') }} {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}. All rights reserved.
            </div>
        </div>
    </div>
@endsection
