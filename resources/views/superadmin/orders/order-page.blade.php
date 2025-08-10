@extends('layouts.superadmin-app')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manajemen Pesanan</h1>
    <div class="mb-4">
        <form action="{{ route('admin.orders.index') }}" method="GET" id="search-form">
            <div class="relative">
                <input type="text" name="search" id="search-input" placeholder="Cari pesanan..."
                    class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg shadow-sm lg:w-72 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ request('search') }}">
                <div class="absolute top-0 left-0 inline-flex items-center justify-center h-full w-10 text-slate-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </form>
    </div>
    <div id="order-data-container">
        @include('superadmin.orders._table-orders', ['orders' => $orders])
    </div>

    <script>
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const form = document.getElementById('search-form');
            const container = document.getElementById('order-data-container');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
            });

            const handleSearch = (event) => {
                const query = event.target.value;
                const url = `{{ route('admin.orders.index') }}?search=${query}`;

                container.style.opacity = '0.5';

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        container.innerHTML = html;
                        container.style.opacity = '1';
                        window.history.pushState({
                            path: url
                        }, '', url);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        container.style.opacity = '1';
                    });
            };

            searchInput.addEventListener('keyup', debounce(handleSearch, 300));
        });
    </script>
@endsection
