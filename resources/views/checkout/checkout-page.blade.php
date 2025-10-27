@extends('layouts.app')

@section('content')
    <script>
        function checkoutForm() {
            return {
                subtotal: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }},
                shippingZones: @json($shippingZones),

                selectedZoneId: '{{ auth()->user()->shipping_zone_id ?? '' }}',
                paymentMethod: 'Transfer Bank',
                shippingCost: 0,
                grandTotal: 0,

                init() {
                    this.grandTotal = this.subtotal;
                    this.calculateShipping();
                    this.$watch('selectedZoneId', () => this.calculateShipping());
                },

                calculateShipping() {
                    if (!this.selectedZoneId) {
                        this.shippingCost = 0;
                    } else {
                        const zone = this.shippingZones.find(z => z.id == this.selectedZoneId);
                        if (zone) {
                            this.shippingCost = parseFloat(zone.cost);
                        }
                    }
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

        // function checkoutForm() {
        //     return {
        //         subtotal: {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }},
        //         shippingZones: @json($shippingZones),
        //         minPurchaseFreeShipping: {{ (float) ($settings['min_purchase_free_shipping']->value ?? 0) }},
        //         freeShippingDistricts: '{{ $settings['free_shipping_districts']->value ?? '' }}'.split(',').map(d => d
        //             .trim()),

        //         selectedZoneId: '{{ auth()->user()->shipping_zone_id ?? '' }}',
        //         shippingMethod: 'Kurir Toko',
        //         paymentMethod: 'Transfer Bank',
        //         shippingCost: 0,
        //         grandTotal: 0,

        //         init() {
        //             this.grandTotal = this.subtotal;
        //             this.calculateShipping();
        //             this.$watch('selectedZoneId', () => this.calculateShipping());
        //             this.$watch('shippingMethod', () => this.calculateShipping());
        //         },

        //         calculateShipping() {
        //             this.isShippingSet = true;

        //             if (this.shippingMethod === 'Ambil di Toko') {
        //                 this.shippingCost = 0;
        //                 this.updateGrandTotal();
        //                 return;
        //             }
        //             if (!this.selectedZoneId) {
        //                 this.shippingCost = 0;
        //                 this.isShippingSet = false;
        //                 this.updateGrandTotal();
        //                 return;
        //             }
        //             const zone = this.shippingZones.find(z => z.id == this.selectedZoneId);
        //             if (!zone) return;

        //             const isEligibleForFreeShipping = this.minPurchaseFreeShipping > 0 && this.subtotal >= this
        //                 .minPurchaseFreeShipping;
        //             const isInFreeShippingArea = this.freeShippingDistricts.includes(zone.district);

        //             this.shippingCost = (isEligibleForFreeShipping && isInFreeShippingArea) ? 0 : parseFloat(zone.cost);
        //             this.updateGrandTotal();
        //         },
        //         updateGrandTotal() {
        //             this.grandTotal = this.subtotal + this.shippingCost;
        //         },
        //         formatCurrency(value) {
        //             return new Intl.NumberFormat('id-ID').format(value);
        //         }
        //     }
        // }
    </script>

    <div class="bg-blue-100 py-2">
        <div class="max-w-5xl mx-auto flex gap-4 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576zM320 384C302.3 384 288 398.3 288 416C288 433.7 302.3 448 320 448C337.7 448 352 433.7 352 416C352 398.3 337.7 384 320 384zM320 192C301.8 192 287.3 207.5 288.6 225.7L296 329.7C296.9 342.3 307.4 352 319.9 352C332.5 352 342.9 342.3 343.8 329.7L351.2 225.7C352.5 207.5 338.1 192 319.8 192z" />
            </svg>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">Area Layanan Pengiriman</h3>
                <p class="text-gray-700">
                    Saat ini kami hanya melayani pengiriman di wilayah <span class="font-semibold">Kecamatan
                        Banyumas</span>
                </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-50" x-data="checkoutForm()">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Checkout</h1>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <input type="hidden" name="shipping_method" value="Kurir Toko">
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-8">
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
                                <label for="shipping_zone" class="block text-sm font-medium text-gray-700">Daerah
                                    Pengiriman</label>
                                <select x-model="selectedZoneId" id="shipping_zone" name="shipping_zone_id" required
                                    class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih Daerah --</option>
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
                        {{-- <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
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
                        </div> --}}
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Metode Pembayaran</h3>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': paymentMethod === 'Transfer Bank' }">
                                    <input type="radio" name="payment_method" value="Transfer Bank"
                                        x-model="paymentMethod" class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">Transfer Bank BCA</span>
                                </label>
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': paymentMethod === 'QRIS' }">
                                    <input type="radio" name="payment_method" value="QRIS" x-model="paymentMethod"
                                        class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">QRIS</span>
                                </label>
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer"
                                    :class="{ 'border-indigo-600 bg-indigo-50': paymentMethod === 'COD' }">
                                    <input type="radio" name="payment_method" value="COD" x-model="paymentMethod"
                                        class="h-4 w-4 text-indigo-600 border-gray-300">
                                    <span class="ml-3 text-sm font-medium text-gray-800">Bayar Tunai di Tempat (COD)</span>
                                </label>
                            </div>
                        </div>
                    </div>
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
                                    <p>Rp<span x-text="formatCurrency(shippingCost)"></span></p>
                                    {{-- <p>
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
                                    </p> --}}
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
