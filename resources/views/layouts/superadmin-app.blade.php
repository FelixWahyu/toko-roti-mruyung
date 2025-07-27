<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @if (auth()->user()->role == 'owner')
            Owner Panel - {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}
        @else
            Super Admin Panel - {{ $globalSettings['store_name']->value ?? 'Toko Roti Mruyung' }}
        @endif
    </title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Kita akan tambahkan script Chart.js di sini nanti --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 antialiased font-sans">
    <div x-data="{ sidebarOpen: false }" @keydown.escape.window="sidebarOpen = false" class="flex">

        <!-- Sidebar -->
        <x-superadmin.sidebar />

        <!-- Overlay untuk mobile saat sidebar terbuka -->
        <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-black bg-opacity-50 transition-opacity md:hidden"
            @click="sidebarOpen = false"></div>

        <div class="flex-1 flex flex-col overflow-hidden h-screen">
            <!-- Header -->
            {{-- Kita lewatkan state sidebarOpen ke header --}}
            <x-superadmin.header />

            <!-- Konten Utama -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="mx-auto px-4 py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

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
                title: 'Terjadi Kesalahan',
                text: '{{ session('error') }}',
            });
        @endif
    </script>

    <script>
        function showConfirmation(event, title, text, confirmButtonText) {
            event.preventDefault();
            let form = event.target;

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                width: '400px',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#64748b',
                confirmButtonText: confirmButtonText,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</body>

</html>
