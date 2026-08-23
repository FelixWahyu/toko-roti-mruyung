@extends('layouts.app')

@section('content')
    <div class="relative bg-stone-900 text-white overflow-hidden py-16 sm:py-24">
        <div class="absolute inset-0 z-0 opacity-25 mix-blend-overlay">
            <img src="{{ asset('images/galery/depan-toko-mruyung.webp') }}" alt="Toko Roti Mruyung" class="w-full h-full object-cover">
        </div>

        <div class="absolute -top-24 -right-24 w-96 h-96 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-amber-700/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white font-serif leading-tight">
                Hubungi Kami, Kami Siap <br class="hidden sm:inline">
                <span class="text-amber-400">Mendengar & Melayani</span> Anda
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-gray-300 font-light leading-relaxed">
                Punya pertanyaan seputar produk roti, reservasi kafe, ketersediaan kamar guesthouse, atau pesanan khusus? Tim kami siap membantu Anda dengan senang hati.
            </p>
        </div>
    </div>

    <div class="bg-gray-50 py-10 relative z-20 -mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-md border border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-4 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">WhatsApp Respon Cepat</h3>
                        <p class="text-sm text-gray-500 mt-1">Konsultasi, pemesanan katering, atau booking kamar instan.</p>
                        <p class="text-md font-semibold text-gray-800 mt-3">+{{ $globalSettings['store_contact']->value ?? '628123456789' }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo%20Roti%20Mruyung,%20saya%20ingin%20bertanya"
                            target="_blank"
                            class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-sm bg-green-50 text-green-700 font-semibold text-sm hover:bg-green-600 hover:text-white transition duration-300">
                            <span>Chat Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-md border border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4 group-hover:bg-amber-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Lokasi & Alamat</h3>
                        <p class="text-sm text-gray-500 mt-1">Komplek Kota Lama Banyumas</p>
                        <p class="text-sm text-gray-700 mt-3 line-clamp-2 leading-relaxed">
                            {{ $globalSettings['store_address']->value ?? 'Jl. Mruyung, Sudagaran, Kec. Banyumas, Kabupaten Banyumas' }}
                        </p>
                    </div>
                    <div class="mt-6">
                        <a href="https://maps.google.com/?q=Roti+Mruyung+Guest+House+%26+Cafe"
                            target="_blank"
                            class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-sm bg-amber-50 text-amber-800 font-semibold text-sm hover:bg-amber-600 hover:text-white transition duration-300">
                            <span>Petunjuk Arah</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-md border border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Jam Operasional</h3>
                        <div class="space-y-1.5 mt-3 text-sm text-gray-600">
                            <div class="flex justify-between items-center py-0.5 border-b border-gray-100">
                                <span>Bakery & Cafe</span>
                                <span class="font-bold text-gray-900">09:00 - 21:00</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5 border-b border-gray-100">
                                <span>Akhir Pekan</span>
                                <span class="font-bold text-gray-900">09:00 - 22:00</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span>Guest House</span>
                                <span class="font-bold text-gray-900">Buka 24 Jam</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="py-2 px-3 bg-gray-50 rounded-sm text-center text-sm text-gray-500 font-medium">
                            Siap Melayani Setiap Hari
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 pb-20 pt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-8 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-800 flex items-center gap-3 shadow-sm">
                    <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-sm">{{ session('success') }}</p>
                        <p class="text-xs text-green-700">Kami akan membalas pesan Anda secepatnya.</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-md border h-full border-gray-100">
                    <div class="mb-8">
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Formulir Pesan</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 font-serif mt-1">Kirimkan Pesan Anda</h2>
                        <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda kembali.</p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                    <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="John Doe"
                                        class="block w-full pl-10 pr-4 py-3 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200">
                                </div>
                                @error('name')
                                    <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="nama@email.com"
                                        class="block w-full pl-10 pr-4 py-3 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200">
                                </div>
                                @error('email')
                                    <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">Subjek Pesan <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                                </div>
                                <input type="text" name="subject" id="subject" required value="{{ old('subject') }}" placeholder="Pertanyaan seputar pemesanan roti..."
                                    class="block w-full pl-10 pr-4 py-3 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200">
                            </div>
                            @error('subject')
                                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">Pesan Anda <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" required placeholder="Tuliskan pesan atau detail pertanyaan Anda di sini..."
                                class="block w-full p-4 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-sm bg-amber-600 hover:bg-amber-500 text-white font-bold text-sm transition-all duration-300 hover:shadow-amber-500/30">
                                <span>Kirim Pesan</span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-gradient-to-br from-stone-900 via-brown-900 to-amber-950 text-white p-8 rounded-md border border-amber-900/40 relative overflow-hidden">
                        <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-amber-500/10 rounded-full blur-2xl pointer-events-none"></div>

                        <span class="text-xs font-bold text-amber-400 uppercase tracking-widest block mb-1">Pemesanan Langsung</span>
                        <h3 class="text-xl font-bold font-serif mb-4">Butuh Pelayanan Cepat?</h3>
                        <p class="text-sm text-gray-300 mb-6 leading-relaxed">
                            Hubungi kanal layanan khusus kami untuk kebutuhan mendesak atau reservasi hari ini:
                        </p>

                        <div class="space-y-3">
                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo%20Roti%20Mruyung,%20saya%20mau%20pesan%20roti"
                                target="_blank"
                                class="flex items-center justify-between p-3.5 rounded-md bg-white/10 hover:bg-white/20 border border-white/10 transition group">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <p class="text-sm font-bold">Pemesanan Bakery & Roti</p>
                                        <p class="text-[13px] text-gray-300">Kue, hampers & oleh-oleh</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>

                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20booking%20kamar%20Guest%20House"
                                target="_blank"
                                class="flex items-center justify-between p-3.5 rounded-md bg-white/10 hover:bg-white/20 border border-white/10 transition group">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <p class="text-sm font-bold">Booking Kamar Guest House</p>
                                        <p class="text-[13px] text-gray-300">Cek ketersediaan kamar</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>

                            <a href="https://wa.me/{{ $globalSettings['store_contact']->value ?? '' }}?text=Halo,%20saya%20mau%20reservasi%20meja%20di%20Cafe"
                                target="_blank"
                                class="flex items-center justify-between p-3.5 rounded-md bg-white/10 hover:bg-white/20 border border-white/10 transition group">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <p class="text-sm font-bold">Reservasi Meja Cafe & Resto</p>
                                        <p class="text-[13px] text-gray-300">Nongkrong & kumpul keluarga</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-md border border-gray-100">
                        <h4 class="text-base font-bold text-gray-900 mb-4">Informasi Kontak Lainnya</h4>
                        <div class="space-y-4 text-sm text-gray-600">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400">Email Resmi</p>
                                    <p class="font-semibold text-gray-800">{{ $globalSettings['store_email']->value ?? 'kontak@tokorotimruyung.com' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400">Telepon / WhatsApp</p>
                                    <p class="font-semibold text-gray-800">+{{ $globalSettings['store_contact']->value ?? '628123456789' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 font-serif mt-1">Kunjungi Toko Roti Mruyung</h2>
                <p class="text-sm text-gray-500 mt-2">Berada di kawasan bersejarah Komplek Kota Lama Banyumas. Akses mudah dan area parkir luas.</p>
            </div>

            <div class="rounded-md overflow-hidden border-2 border-gray-100 relative">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.5693799913684!2d109.2937846!3d-7.512695700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655be837ac6d85%3A0x60a6bc885567f28!2sRoti%20Mruyung%20Guest%20House%20%26%20Cafe!5e0!3m2!1sid!2sid!4v1752346494051!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
