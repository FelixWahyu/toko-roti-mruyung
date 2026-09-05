<div class="bg-white rounded-sm overflow-x-auto border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Telepon</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Role</th>
                <th class="px-5 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($users as $user)
                <tr class="hover:bg-gray-50/70 transition-colors">
                    <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-5 py-3 whitespace-nowrap text-gray-600">{{ $user->email }}</td>
                    <td class="px-5 py-3 whitespace-nowrap text-gray-600">{{ $user->phone_number }}</td>
                    <td class="px-5 py-3 whitespace-nowrap">
                        <span
                            class="px-2 py-0.5 text-xs font-semibold rounded-sm capitalize
                                @if ($user->role == 'owner') bg-red-100 text-red-800 @endif
                                @if ($user->role == 'admin') bg-gray-200 text-gray-800 @endif
                                @if ($user->role == 'pelanggan') bg-emerald-100 text-emerald-800 @endif
                            ">{{ $user->role }}</span>
                    </td>
                    <td class="px-5 py-3 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-1.5">
                            @php
                                $canEdit = auth()->user()->role === 'owner' || (auth()->user()->role === 'admin' && $user->role !== 'owner');
                                $canDelete = (auth()->user()->role === 'owner' || (auth()->user()->role === 'admin' && $user->role !== 'owner')) && auth()->id() !== $user->id;
                            @endphp

                            @if ($canEdit)
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="px-2.5 py-1.5 flex items-center space-x-1 bg-gray-100 text-gray-800 rounded-sm hover:bg-gray-200 text-xs font-medium transition"
                                    title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="size-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    <span>Edit</span>
                                </a>
                            @endif

                            @if ($canDelete)
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="showConfirmation(event,'Hapus data?','Anda yakin ingin menghapus data {{ $user->name }}?', 'Ya, Hapus!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-2.5 py-1.5 bg-white border border-gray-200 text-red-600 rounded-sm flex items-center space-x-1 hover:bg-red-50 text-xs font-medium transition"
                                        title="Hapus">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            @endif

                            @if (!$canEdit && !$canDelete)
                                <span class="text-xs text-gray-400 italic">Tidak ada aksi</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-6 text-center text-xs text-gray-500">Tidak ada data pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $users->links() }}
</div>
