<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Panel - Toko Roti Mruyung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Kita akan tambahkan script Chart.js di sini nanti --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <x-superadmin.sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <x-superadmin.header />

            <!-- Konten Utama -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
