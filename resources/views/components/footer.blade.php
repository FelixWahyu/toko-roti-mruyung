<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">

            <!-- Kolom 1: Logo dan Deskripsi -->
            <div class="col-span-2 lg:col-span-2">
                <div class="flex items-center space-x-2">
                    @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                        <img class="h-10 w-auto" src="{{ Storage::url($globalSettings['store_logo']->value) }}"
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

            <!-- Kolom 2: Produk -->
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-300">Produk</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Roti Tawar</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Roti Manis</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Kue Kering</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Kue Basah</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Perusahaan -->
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-300">Perusahaan</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Tentang Kami</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Kontak</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Karir</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Bantuan -->
            <div>
                <h3 class="text-sm font-semibold tracking-wider uppercase text-gray-300">Bantuan</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Cara Pesan</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-sm text-gray-400 hover:text-white">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>

        <!-- Bagian Bawah Footer: Copyright dan Media Sosial -->
        <div class="mt-8 pt-8 border-t border-gray-700 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                <!-- Ikon Instagram -->
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.067-.06-1.407-.06-4.123v-.08c0-2.643.012-2.987.06-4.043.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.341 2.52c.636-.247 1.363-.416 2.427-.465C9.793 2.013 10.133 2 12.75 2h.09zM12 6.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zm0 8.468a3.333 3.333 0 110-6.666 3.333 3.333 0 010 6.666zm5.338-9.87a1.2 1.2 0 100 2.4 1.2 1.2 0 000-2.4z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <!-- Ikon Facebook -->
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <!-- Ikon WhatsApp -->
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">WhatsApp</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.38 1.25 4.82l-1.34 4.89 5.02-1.32c1.39.72 2.96 1.14 4.59 1.14h.01c5.46 0 9.91-4.45 9.91-9.91s-4.45-9.91-9.91-9.91zM17.47 15.96c-.22-.11-.76-.38-1.04-.51s-.49-.2-.69.2c-.2.4-.66.83-.81 1s-.29.19-.54.06c-.25-.12-1.07-.39-2.04-1.26-.75-.68-1.26-1.52-1.41-1.77-.15-.25-.02-.38.1-.51.11-.11.25-.29.37-.43s.16-.2.25-.33.03-.25-.03-.36c-.06-.11-.54-1.29-.74-1.77-.2-.48-.4-.41-.55-.42-.14-.01-.3-.01-.46-.01s-.39.06-.6.3c-.2.25-.79.76-.79 1.85s.81 2.15.93 2.3c.11.15 1.58 2.41 3.83 3.39.54.23.96.36 1.29.47.54.16 1.03.14 1.41.09.43-.06 1.29-.53 1.47-1.03s.19-.94.13-1.03c-.06-.1-.22-.16-.46-.28z" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-center text-sm text-gray-400 md:mt-0 md:order-1">
                &copy; {{ date('Y') }} {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}. Hak Cipta
                Dilindungi.
            </p>
        </div>
    </div>
</footer>
