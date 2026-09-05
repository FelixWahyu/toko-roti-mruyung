@extends('layouts.superadmin-app')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Pengguna</h1>
    </div>

    <div class="items-center justify-between mb-4 lg:flex">
        <a href="{{ route('admin.users.create') }}"
            class="inline-flex items-center space-x-2 bg-gray-900 mb-4 lg:mb-0 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            <span>Tambah Pengguna</span>
        </a>
        <form action="{{ route('admin.users.index') }}" method="GET" id="search-form">
            <div class="relative">
                <input type="text" name="search" id="search-input" placeholder="Cari pengguna..."
                    class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-sm text-sm lg:w-72 focus:outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900"
                    value="{{ request('search') }}">
                <div class="absolute top-0 left-0 inline-flex items-center justify-center h-full w-10 text-gray-400">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </form>
    </div>

    <div id="user-data-container">
        @include('superadmin.users._table-users', ['users' => $users])
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
            const container = document.getElementById('user-data-container');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
            });

            const handleSearch = (event) => {
                const query = event.target.value;
                const url = `{{ route('admin.users.index') }}?search=${query}`;

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
