@extends('layouts.superadmin-app')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Zona Pengiriman</h1>
        <a href="{{ route('admin.shipping-zones.create') }}"
            class="inline-flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Tambah Zona</span>
        </a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Kecamatan/Daerah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Biaya
                            Kirim</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse($shippingZones as $zone)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-slate-700">{{ $zone->district }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-500">
                                Rp{{ number_format($zone->cost, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.shipping-zones.edit', $zone) }}"
                                        class="p-2 bg-blue-100 text-blue-600 rounded-md flex items-center hover:bg-blue-200"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.shipping-zones.destroy', $zone) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="showConfirmation(event,'Hapus data?','Anda yakin ingin menghapus data {{ $zone->district }}?', 'Ya, Hapus!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-red-100 text-red-600 rounded-md flex items-center hover:bg-red-200"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-slate-500">Tidak ada data zona pengiriman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $shippingZones->links() }}
        </div>
    </div>
@endsection
