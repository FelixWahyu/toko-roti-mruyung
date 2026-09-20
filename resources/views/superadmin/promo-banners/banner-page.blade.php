@extends('layouts.superadmin-app')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Banner Promo</h1>
        <a href="{{ route('admin.promo-banners.create') }}"
            class="inline-flex items-center space-x-2 bg-gray-900 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-sm text-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Tambah Banner</span>
        </a>
    </div>

    <div class="bg-white rounded-sm overflow-x-auto border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-16">Urutan</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-24">Gambar</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Judul</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Link / URL</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($banners as $banner)
                    <tr class="hover:bg-gray-50/70 transition-colors">
                        <td class="px-5 py-3 whitespace-nowrap font-mono text-xs font-semibold text-gray-700">{{ $banner->order }}</td>
                        <td class="px-5 py-3 whitespace-nowrap">
                            <div class="h-14 w-20 overflow-hidden bg-gray-50 border border-gray-200 rounded-sm flex items-center justify-center">
                                <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"
                                    class="h-full w-full object-cover">
                            </div>
                        </td>
                        <td class="px-5 py-3 whitespace-nowrap font-medium text-gray-900">{{ $banner->title }}</td>
                        <td class="px-5 py-3 whitespace-nowrap text-gray-600 font-mono text-xs">
                            <a href="{{ $banner->link }}" target="_blank" class="hover:underline hover:text-gray-900 flex items-center gap-1">
                                <span>{{ Str::limit($banner->link, 35) }}</span>
                                @if ($banner->link !== '#')
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                @endif
                            </a>
                        </td>
                        <td class="px-5 py-3 whitespace-nowrap">
                            @if ($banner->is_active)
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-sm bg-emerald-100 text-emerald-800">Aktif</span>
                            @else
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-sm bg-gray-100 text-gray-600">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-1.5">
                                <a href="{{ route('admin.promo-banners.edit', $banner) }}"
                                    class="px-2.5 py-1.5 flex items-center space-x-1 bg-gray-100 text-gray-800 rounded-sm hover:bg-gray-200 text-xs font-medium transition"
                                    title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="size-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.promo-banners.destroy', $banner) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="showConfirmation(event,'Hapus data?','Anda yakin ingin menghapus banner promo {{ $banner->title }}?', 'Ya, Hapus!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-2.5 py-1.5 bg-white border border-gray-200 text-red-600 rounded-sm flex items-center space-x-1 hover:bg-red-50 text-xs font-medium transition"
                                        title="Hapus">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-xs text-gray-500">Tidak ada data banner promo.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $banners->links() }}
    </div>
@endsection
