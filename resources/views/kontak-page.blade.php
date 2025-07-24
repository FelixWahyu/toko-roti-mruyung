@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-brown-500 tracking-wider uppercase">Hubungi Kami</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                    Kami Senang Mendengar dari Anda
                </p>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500">
                    Punya pertanyaan, kritik atau saran, Jangan ragu untuk menghubungi kami
                    melalui detail di bawah atau isi formulir kontak.
                </p>
            </div>
        </div>
    </div>

    <!-- Section Form dan Info Kontak -->
    <div class="bg-gray-50 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Kolom Kiri: Form Kontak -->
                <div class="lg:col-span-2 bg-white p-8 rounded-lg shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                                @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                                @error('email')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subjek</label>
                            <input type="text" name="subject" id="subject" required value="{{ old('subject') }}"
                                class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                            @error('subject')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan Anda</label>
                            <textarea id="message" name="message" rows="5" required
                                class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full sm:w-auto shadow-md inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brown-500 hover:bg-brown-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-400">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Kolom Kanan: Info Kontak & Jam Buka -->
                <div class="space-y-8">
                    <div class="bg-white border border-gray-200 p-8 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Detail Kontak</h3>
                        <div class="space-y-4 text-gray-600">
                            <div class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-brown-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="ml-3">
                                    {{ $globalSettings['store_address']->value ?? 'Toko Roti Mruyung' }}
                                </p>
                            </div>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-6 w-6 text-brown-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 6.75z" />
                                </svg>
                                <p class="ml-3">
                                    +{{ $globalSettings['store_contact']->value ?? 'Toko Roti Mruyung' }}</p>
                            </div>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-6 w-6 text-brown-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                                <p class="ml-3">
                                    {{ $globalSettings['store_email']->value ?? 'kontak@tokorotimruyung.com' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Jam Buka</h3>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex justify-between"><span>Senin - Jumat</span> <span class="font-semibold">09:00 -
                                    21:00</span></div>
                            <div class="flex justify-between"><span>Sabtu - Minggu</span> <span class="font-semibold">09:00
                                    -
                                    22:00</span></div>
                            <p class="text-sm text-gray-500 pt-2">*Guesthouse buka 24 jam untuk tamu yang menginap.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Section Peta -->
    <div class="w-full">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.5693799913684!2d109.2937846!3d-7.512695700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655be837ac6d85%3A0x60a6bc885567f28!2sRoti%20Mruyung%20Guest%20House%20%26%20Cafe!5e0!3m2!1sid!2sid!4v1752346494051!5m2!1sid!2sid"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
