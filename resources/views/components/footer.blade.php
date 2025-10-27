<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">

            <div class="col-span-2 lg:col-span-2">
                <div class="flex items-center space-x-2">
                    @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
                        <img class="h-10 w-auto rounded-sm"
                            src="{{ asset('storage/' . $globalSettings['store_logo']->value) }}" alt="Logo Toko">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 102 102"
                        id="instagram">
                        <defs>
                            <radialGradient id="a" cx="6.601" cy="99.766" r="129.502"
                                gradientUnits="userSpaceOnUse">
                                <stop offset=".09" stop-color="#fa8f21"></stop>
                                <stop offset=".78" stop-color="#d82d7e"></stop>
                            </radialGradient>
                            <radialGradient id="b" cx="70.652" cy="96.49" r="113.963"
                                gradientUnits="userSpaceOnUse">
                                <stop offset=".64" stop-color="#8c3aaa" stop-opacity="0"></stop>
                                <stop offset="1" stop-color="#8c3aaa"></stop>
                            </radialGradient>
                        </defs>
                        <path fill="url(#a)"
                            d="M25.865,101.639A34.341,34.341,0,0,1,14.312,99.5a19.329,19.329,0,0,1-7.154-4.653A19.181,19.181,0,0,1,2.5,87.694,34.341,34.341,0,0,1,.364,76.142C.061,69.584,0,67.617,0,51s.067-18.577.361-25.14A34.534,34.534,0,0,1,2.5,14.312,19.4,19.4,0,0,1,7.154,7.154,19.206,19.206,0,0,1,14.309,2.5,34.341,34.341,0,0,1,25.862.361C32.422.061,34.392,0,51,0s18.577.067,25.14.361A34.534,34.534,0,0,1,87.691,2.5a19.254,19.254,0,0,1,7.154,4.653A19.267,19.267,0,0,1,99.5,14.309a34.341,34.341,0,0,1,2.14,11.553c.3,6.563.361,8.528.361,25.14s-.061,18.577-.361,25.14A34.5,34.5,0,0,1,99.5,87.694,20.6,20.6,0,0,1,87.691,99.5a34.342,34.342,0,0,1-11.553,2.14c-6.557.3-8.528.361-25.14.361s-18.577-.058-25.134-.361">
                        </path>
                        <path fill="url(#b)"
                            d="M25.865,101.639A34.341,34.341,0,0,1,14.312,99.5a19.329,19.329,0,0,1-7.154-4.653A19.181,19.181,0,0,1,2.5,87.694,34.341,34.341,0,0,1,.364,76.142C.061,69.584,0,67.617,0,51s.067-18.577.361-25.14A34.534,34.534,0,0,1,2.5,14.312,19.4,19.4,0,0,1,7.154,7.154,19.206,19.206,0,0,1,14.309,2.5,34.341,34.341,0,0,1,25.862.361C32.422.061,34.392,0,51,0s18.577.067,25.14.361A34.534,34.534,0,0,1,87.691,2.5a19.254,19.254,0,0,1,7.154,4.653A19.267,19.267,0,0,1,99.5,14.309a34.341,34.341,0,0,1,2.14,11.553c.3,6.563.361,8.528.361,25.14s-.061,18.577-.361,25.14A34.5,34.5,0,0,1,99.5,87.694,20.6,20.6,0,0,1,87.691,99.5a34.342,34.342,0,0,1-11.553,2.14c-6.557.3-8.528.361-25.14.361s-18.577-.058-25.134-.361">
                        </path>
                        <path fill="#fff"
                            d="M461.114,477.413a12.631,12.631,0,1,1,12.629,12.632,12.631,12.631,0,0,1-12.629-12.632m-6.829,0a19.458,19.458,0,1,0,19.458-19.458,19.457,19.457,0,0,0-19.458,19.458m35.139-20.229a4.547,4.547,0,1,0,4.549-4.545h0a4.549,4.549,0,0,0-4.547,4.545m-30.99,51.074a20.943,20.943,0,0,1-7.037-1.3,12.547,12.547,0,0,1-7.193-7.19,20.923,20.923,0,0,1-1.3-7.037c-.184-3.994-.22-5.194-.22-15.313s.04-11.316.22-15.314a21.082,21.082,0,0,1,1.3-7.037,12.54,12.54,0,0,1,7.193-7.193,20.924,20.924,0,0,1,7.037-1.3c3.994-.184,5.194-.22,15.309-.22s11.316.039,15.314.221a21.082,21.082,0,0,1,7.037,1.3,12.541,12.541,0,0,1,7.193,7.193,20.926,20.926,0,0,1,1.3,7.037c.184,4,.22,5.194.22,15.314s-.037,11.316-.22,15.314a21.023,21.023,0,0,1-1.3,7.037,12.547,12.547,0,0,1-7.193,7.19,20.925,20.925,0,0,1-7.037,1.3c-3.994.184-5.194.22-15.314.22s-11.316-.037-15.309-.22m-.314-68.509a27.786,27.786,0,0,0-9.2,1.76,19.373,19.373,0,0,0-11.083,11.083,27.794,27.794,0,0,0-1.76,9.2c-.187,4.04-.229,5.332-.229,15.623s.043,11.582.229,15.623a27.793,27.793,0,0,0,1.76,9.2,19.374,19.374,0,0,0,11.083,11.083,27.813,27.813,0,0,0,9.2,1.76c4.042.184,5.332.229,15.623.229s11.582-.043,15.623-.229a27.8,27.8,0,0,0,9.2-1.76,19.374,19.374,0,0,0,11.083-11.083,27.716,27.716,0,0,0,1.76-9.2c.184-4.043.226-5.332.226-15.623s-.043-11.582-.226-15.623a27.786,27.786,0,0,0-1.76-9.2,19.379,19.379,0,0,0-11.08-11.083,27.748,27.748,0,0,0-9.2-1.76c-4.041-.185-5.332-.229-15.621-.229s-11.583.043-15.626.229"
                            transform="translate(-422.637 -426.196)"></path>
                    </svg>
                </a>
                <a href="https://facebook.com/roti.mruyung.banyumas" target="_blank" rel="noopener noreferrer"
                    class="text-blue-500 hover:text-blue-600">
                    <span class="sr-only">Facebook</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 1024 1024"
                        id="facebook">
                        <path fill="#1877f2"
                            d="M1024,512C1024,229.23016,794.76978,0,512,0S0,229.23016,0,512c0,255.554,187.231,467.37012,432,505.77777V660H302V512H432V399.2C432,270.87982,508.43854,200,625.38922,200,681.40765,200,740,210,740,210V336H675.43713C611.83508,336,592,375.46667,592,415.95728V512H734L711.3,660H592v357.77777C836.769,979.37012,1024,767.554,1024,512Z">
                        </path>
                        <path fill="#fff"
                            d="M711.3,660,734,512H592V415.95728C592,375.46667,611.83508,336,675.43713,336H740V210s-58.59235-10-114.61078-10C508.43854,200,432,270.87982,432,399.2V512H302V660H432v357.77777a517.39619,517.39619,0,0,0,160,0V660Z">
                        </path>
                    </svg>
                </a>
                <a href="https://tiktok.com/@roti_mruyung_banyumas" target="_blank" rel="noopener noreferrer"
                    class="text-gray-300 hover:text-white">
                    <span class="sr-only">TikTok</span>
                    <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.25V349.4a162.6 162.6 0 1 1 -185-188.3v89.9A74.6 74.6 0 1 0 224 427.5V0h88a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                    </svg>
                </a>
                <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}" target="_blank"
                    rel="noopener noreferrer" class="text-green-500 hover:text-green-600">
                    <span class="sr-only">WhatsApp</span>
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="30" height="30"
                        id="whatsapp" x="0" y="0" version="1.1" viewBox="0 0 100 100">
                        <g id="Graphics-_x2F_-App-Icons-_x2F_-WhatsApp">
                            <g id="Icon_6_">
                                <linearGradient id="Background_13_" x1="50.723" x2="50.723" y1="627.233"
                                    y2="625.746" gradientTransform="matrix(60 0 0 -60 -2993 37639)"
                                    gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#62FA7F"></stop>
                                    <stop offset=".686" stop-color="#22CC40"></stop>
                                    <stop offset="1" stop-color="#05B723"></stop>
                                </linearGradient>
                                <path id="Background_7_" fill="url(#Background_13_)"
                                    d="M28.4 5H26c-2 .1-4.6.2-5.7.5-1.8.4-3.5.9-4.9 1.6-1.6.8-3.1 1.9-4.4 3.2-1.3 1.3-2.3 2.7-3.2 4.4-.7 1.4-1.3 3.1-1.6 4.8-.2 1.2-.4 3.8-.5 5.8V74c.1 2 .2 4.6.5 5.7.4 1.8.9 3.5 1.6 4.9.8 1.6 1.9 3.1 3.2 4.4 1.3 1.3 2.7 2.3 4.4 3.2 1.4.7 3.1 1.3 4.8 1.6 1.2.2 3.8.4 5.8.5h48.7c2-.1 4.6-.2 5.7-.5 1.8-.4 3.5-.9 4.9-1.6 1.6-.8 3.1-1.9 4.4-3.2 1.3-1.3 2.3-2.7 3.2-4.4.7-1.4 1.3-3.1 1.6-4.8.2-1.2.4-3.8.5-5.8V25.3c-.1-2-.2-4.6-.5-5.7-.4-1.8-.9-3.5-1.6-4.9-.8-1.6-1.9-3.1-3.2-4.4C88.4 9 87 8 85.3 7.1c-1.4-.7-3.1-1.3-4.8-1.6-1.2-.2-3.8-.4-5.8-.5H28.4z"
                                    style="fill:url(#Background_13_)"></path>
                                <path id="WhatsApp-Icon" fill="#FFF"
                                    d="M66.6 54.4c-.8-.4-4.8-2.3-5.5-2.6-.7-.3-1.3-.4-1.8.4s-2.1 2.6-2.5 3.1c-.5.5-.9.6-1.7.2-.8-.4-3.4-1.2-6.5-3.9-2.4-2.1-4-4.7-4.5-5.5-.5-.8 0-1.2.4-1.6.4-.4.8-.9 1.2-1.4.4-.5.5-.8.8-1.3.3-.5.1-1-.1-1.4-.2-.4-1.8-4.3-2.5-5.9-.7-1.5-1.3-1.3-1.8-1.4h-1.5c-.5 0-1.4.2-2.1 1-.7.8-2.8 2.7-2.8 6.6 0 3.9 2.9 7.6 3.3 8.2.4.5 5.7 8.5 13.7 11.9 1.9.8 3.4 1.3 4.6 1.7 1.9.6 3.7.5 5.1.3 1.5-.2 4.8-1.9 5.4-3.7.7-1.8.7-3.4.5-3.7-.4-.4-.9-.6-1.7-1M51.3 75c-4.8 0-9.4-1.3-13.5-3.7l-1-.6-10 2.6 2.7-9.7-.6-1c-2.6-4.2-4-9-4-14 0-14.5 11.9-26.3 26.5-26.3C58.3 22.3 65 25 70 30c5 5 7.7 11.6 7.7 18.6C77.7 63.1 65.8 75 51.3 75m22.5-48.8c-6-6-14-9.3-22.5-9.3-17.5 0-31.8 14.2-31.8 31.7 0 5.6 1.5 11 4.2 15.8l-4.5 16.4L36 76.4c4.6 2.5 9.9 3.9 15.2 3.9C68.7 80.3 83 66.1 83 48.6c.1-8.4-3.2-16.4-9.2-22.4"
                                    style="fill:#fff"></path>
                            </g>
                        </g>
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
