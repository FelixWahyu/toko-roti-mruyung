<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">

            <div class="col-span-2 lg:col-span-2">
                <div class="flex items-center space-x-2">
                    @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                        <img class="h-10 w-auto rounded-sm" src="{{ Storage::url($globalSettings['store_logo']->value) }}"
                            alt="Logo Toko">
                    @else
                        <svg class="h-8 w-8 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25pc-1.5 0-1.5-.75-1.5-1.5V8.25A2.25 2.25 0 014.5 6h15a2.25 2.25 0 012.25 2.25v11.25c0 .828-.672 1.5-1.5 1.5H13.5z" />
                        </svg>
                    @endif
                    <span class="font-bold text-xl">
                        {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}
                    </span>
                </div>
                <p class="mt-4 text-gray-400 text-sm max-w-xs">
                    Menyajikan roti dan kue berkualitas premium yang dibuat setiap hari dengan bahan-bahan terbaik dan
                    penuh cinta.
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-300">Produk</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ route('products.index') }}"
                            class="text-sm text-gray-400 hover:text-white">Breads</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-sm text-gray-400 hover:text-white">Cakes</a>
                    </li>
                    <li><a href="{{ route('products.index') }}"
                            class="text-sm text-gray-400 hover:text-white">Pastry</a></li>
                    <li><a href="{{ route('products.index') }}"
                            class="text-sm text-gray-400 hover:text-white">Muffin</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-300">Toko</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ route('about') }}" class="text-sm text-gray-400 hover:text-white">Tentang Kami</a>
                    </li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-white">Kontak</a></li>
                    <li><a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-white">Cara Pesan</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-300">Bantuan</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-gray-700 md:flex md:items-center md:justify-between">
            <div class="flex justify-center space-x-6 md:order-2">
                <a href="https://instagram.com/rotimruyungbanyumas" target="_blank" rel="noopener noreferrer"
                    class="text-gray-400 hover:text-white">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.067-.06-1.407-.06-4.123v-.08c0-2.643.012-2.987.06-4.043.049 1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.341 2.52c.636-.247 1.363-.416 2.427-.465C9.793 2.013 10.133 2 12.75 2h.09zM12 6.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zm0 8.468a3.333 3.333 0 110-6.666 3.333 3.333 0 010 6.666zm5.338-9.87a1.2 1.2 0 100 2.4 1.2 1.2 0 000-2.4z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://facebook.com/roti.mruyung.banyumas" target="_blank" rel="noopener noreferrer"
                    class="text-gray-400 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://tiktok.com/@roti_mruyung_banyumas" target="_blank" rel="noopener noreferrer"
                    class="text-gray-400 hover:text-white">
                    <span class="sr-only">TikTok</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.25V349.4a162.6 162.6 0 1 1 -185-188.3v89.9A74.6 74.6 0 1 0 224 427.5V0h88a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                    </svg>
                </a>
                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}" target="_blank"
                    rel="noopener noreferrer" class="text-gray-400 hover:text-white">
                    <span class="sr-only">WhatsApp</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.976 8.974 0 1.582.413 3.126 1.198 4.488L3 21l4.629-1.223a8.948 8.948 0 0 0 4.424 1.192h.001c4.947 0 8.975-4.027 8.975-8.974 0-2.38-1.006-4.646-2.62-6.362zM12.053 19.91c-1.413 0-2.79-.365-4.024-1.041l-.287-.17-2.985.784.798-2.924-.187-.297A7.153 7.153 0 0 1 5.08 11.974c0-3.963 3.223-7.187 7.188-7.187a7.145 7.145 0 0 1 5.088 2.105 7.142 7.142 0 0 1 2.104 5.088c-.001 3.963-3.224 7.187-7.188 7.187zm4.25-6.168c-.22-.11-.944-.465-1.09-.515s-.252-.075-.357.075c-.104.15-.412.515-.506.62s-.187.113-.346.038c-.16-.075-1.062-.39-2.02-1.245s-1.438-1.925-1.58-2.25c-.142-.325-.015-.488.09-.613s.22-.255.33-.438a.992.992 0 0 0 .15-.255c.05-.15.025-.288-.012-.363s-.356-.855-.487-1.17c-.13-.315-.262-.262-.356-.262s-.252-.013-.357-.013c-.104 0-.277.038-.425.188s-.587.575-.587 1.4c0 .825.6 1.625.687 1.75s1.287 2.063 3.112 2.875c.438.187.787.3.963.375a1.88 1.88 0 0 0 1.062.037c.313-.05.944-.387 1.075-.762s.13-.7.09-.762c-.04-.063-.15-.113-.375-.225z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-center text-sm text-gray-400 md:mt-0 md:order-1">
                Created by Felix Wahyu S. &copy; {{ date('Y') }}
                {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}. Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>
