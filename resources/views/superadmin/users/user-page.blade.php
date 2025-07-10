@extends('layouts.superadmin-app')
@section('content')
    @if (auth()->user()->role == 'superadmin')
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Pengguna</h1>
            <a href="{{ route('admin.users.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Pengguna
            </a>
        </div>
    @else
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Pengguna</h1>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    @if (auth()->user()->role == 'superadmin')
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full capitalize
                                @if ($user->role == 'superadmin') bg-red-200 text-red-800 @endif
                                @if ($user->role == 'owner') bg-yellow-200 text-yellow-800 @endif
                                @if ($user->role == 'pelanggan') bg-green-200 text-green-800 @endif
                            ">{{ $user->role }}</span>
                        </td>
                        @if (auth()->user()->role == 'superadmin')
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                @if (auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        class="inline-block ml-4"
                                        onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
