@extends('layouts.app')

@section('content')
    <script>
        function checkoutForm() {
            return {
                subtotal: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }},
                shippingZones: @json($shippingZones),
                minPurchaseFreeShipping: {{ (float) ($settings['min_purchase_free_shipping']->value ?? 0) }},
                freeShippingDistricts: '{{ $settings['free_shipping_districts']->value ?? '' }}'.split(',').map(d => d
                    .trim()),

                selectedZoneId: '{{ auth()->user()->shipping_zone_id ?? '' }}',
                shippingMethod: 'Kurir Toko',
                paymentMethod: 'Transfer Bank',
                shippingCost: 0,
                grandTotal: 0,
                // isShippingSet: false,

                init() {
                    this.grandTotal = this.subtotal;
                    this.calculateShipping();
                    this.$watch('selectedZoneId', () => this.calculateShipping());
                    this.$watch('shippingMethod', () => this.calculateShipping());
                },

                calculateShipping() {
                    this.isShippingSet = true;

                    if (this.shippingMethod === 'Ambil di Toko') {
                        this.shippingCost = 0;
                        this.updateGrandTotal();
                        return;
                    }
                    if (!this.selectedZoneId) {
                        this.shippingCost = 0;
                        this.isShippingSet = false;
                        this.updateGrandTotal();
                        return;
                    }
                    const zone = this.shippingZones.find(z => z.id == this.selectedZoneId);
                    if (!zone) return;

                    const isEligibleForFreeShipping = this.minPurchaseFreeShipping > 0 && this.subtotal >= this
                        .minPurchaseFreeShipping;
                    const isInFreeShippingArea = this.freeShippingDistricts.includes(zone.district);

                    this.shippingCost = (isEligibleForFreeShipping && isInFreeShippingArea) ? 0 : parseFloat(zone.cost);
                    this.updateGrandTotal();
                },
                updateGrandTotal() {
                    this.grandTotal = this.subtotal + this.shippingCost;
                },
                formatCurrency(value) {
                    return new Intl.NumberFormat('id-ID').format(value);
                }
            }
        }
    </script>

    <div class="bg-gray-50" x-data="checkoutForm()">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Checkout</h1>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-8">
                    <!-- Kolom Kiri: Detail & Pilihan -->
                    <div class="lg:col-span-3 space-y-6">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Alamat Pengiriman</h3>
                            <div class="mb-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Penerima</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                    required
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                                @error('name')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor
                                    Telepon</label>
                                <input type="text" id="phone_number" name="phone_number"
                                    value="{{ auth()->user()->phone_number }}" required
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">
                                @error('phone_number')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="shipping_zone" class="block text-sm font-medium text-gray-700">Kecamatan
                                    Pengiriman</label>
                                <select x-model="selectedZoneId" id="shipping_zone" name="shipping_zone_id" required
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih Kecamatan --</option>
                                    @foreach ($shippingZones as $zone)
                                        <option value="{{ $zone->id }}">{{ $zone->district }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="shipping_address" class="block text-sm font-medium text-gray-700">Alamat Lengkap
                                    Pengiriman</label>
                                <textarea id="shipping_address" name="shipping_address" rows="4" required
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-brown-400 focus:border-brown-400">{{ auth()->user()->address }}</textarea>
                                @error('shipping_address')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Metode Pengiriman</h3>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': shippingMethod === 'Kurir Toko' }">
                                    <input type="radio" name="shipping_method" value="Kurir Toko" x-model="shippingMethod"
                                        class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">Kurir Toko</span>
                                </label>
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': shippingMethod === 'Ambil di Toko' }">
                                    <input type="radio" name="shipping_method" value="Ambil di Toko"
                                        x-model="shippingMethod" class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">Ambil di Toko (Gratis)</span>
                                </label>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Metode Pembayaran</h3>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': paymentMethod === 'Transfer Bank' }">
                                    <input type="radio" name="payment_method" value="Transfer Bank"
                                        x-model="paymentMethod" class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">Transfer Bank</span>
                                </label>
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': paymentMethod === 'QRIS' }">
                                    <input type="radio" name="payment_method" value="QRIS" x-model="paymentMethod"
                                        class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">QRIS</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Kolom Kanan: Ringkasan Pesanan -->
                    <div class="lg:col-span-3">
                        <div class="bg-white p-6 rounded-lg shadow-md sticky top-28 border border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>
                            <ul class="divide-y divide-gray-200">
                                @foreach ($cartItems as $item)
                                    <li class="py-4 flex justify-between items-center">
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $item->product->name }}</p>
                                            <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                        </div>
                                        <p class="font-medium text-gray-900">
                                            Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                                <div class="flex justify-between text-sm text-gray-600">
                                    <p>Subtotal</p>
                                    <p>Rp<span x-text="formatCurrency(subtotal)"></span></p>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600">
                                    <p>Ongkos Kirim</p>
                                    <p>
                                        <template x-if="!isShippingSet">
                                            <span>Rp0</span>
                                        </template>
                                        <template x-if="isShippingSet">
                                            <span>
                                                <span x-show="shippingCost > 0">Rp</span>
                                                <span
                                                    x-text="shippingCost > 0 ? formatCurrency(shippingCost) : 'Gratis'"></span>
                                            </span>
                                        </template>
                                    </p>
                                </div>
                                <div class="flex justify-between text-lg font-bold text-gray-900">
                                    <p>Grand Total</p>
                                    <p>Rp<span x-text="formatCurrency(grandTotal)"></span></p>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="w-full flex justify-center py-3 px-4 border rounded-md shadow-sm text-base font-medium text-white bg-brown-500 hover:bg-brown-600">
                                    Buat Pesanan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
