<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($globalSettings['store_logo']) && $globalSettings['store_logo']->value)
        <link rel="icon" href="{{ Storage::url($globalSettings['store_logo']->value) }}" type="image/png">
    @endif
    <title>{{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts & Styles (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-800 pt-16">

    {{-- Memanggil komponen Navbar --}}
    <x-navbar />

    {{-- Konten utama halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Sederhana --}}
    <x-footer></x-footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        @endif
    </script>

    <script>
        function showConfirmation(event, title, text, confirmButtonText) {
            // Hentikan borang daripada dihantar serta-merta
            event.preventDefault();

            // Dapatkan elemen borang yang mencetuskan acara ini
            let form = event.target;

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                width: '400px', // Saiz pop-up yang lebih kecil
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#64748b',
                confirmButtonText: confirmButtonText,
                cancelButtonText: 'Batal'
            }).then((result) => {
                // Jika pengguna mengklik butang pengesahan
                if (result.isConfirmed) {
                    // Hantar borang secara manual
                    form.submit();
                }
            });
        }
    </script>

</body>

</html>
