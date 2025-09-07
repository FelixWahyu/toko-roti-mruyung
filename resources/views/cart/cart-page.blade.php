@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Keranjang Belanja Anda</h1>
            <div id="cart-container">
                @if ($cartItems->count() > 0)
                    <div class="bg-white shadow-md border border-gray-200 rounded-lg overflow-hidden">
                        <ul role="list" class="divide-y divide-gray-200" id="cart-list">
                            @php $total = 0; @endphp
                            @foreach ($cartItems as $item)
                                @php $total += $item->product->price * $item->quantity; @endphp
                                <li class="p-4 sm:p-6" id="cart-item-{{ $item->id }}">
                                    <div class="flex items-center sm:items-start">
                                        <div
                                            class="flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24 rounded-md overflow-hidden bg-gray-200">
                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="[Gambar {{ $item->product->name }}]"
                                                class="w-full h-full object-cover object-center">
                                        </div>
                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3><a href="#">{{ $item->product->name }}</a></h3>
                                                    <p class="ml-4 item-subtotal" data-price="{{ $item->product->price }}">
                                                        Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Rp{{ number_format($item->product->price, 0, ',', '.') }} /
                                                    {{ $item->product->unit->name }}
                                                </p>
                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm mt-4">
                                                <div class="flex items-center">
                                                    <button onclick="updateQuantity('{{ $item->id }}', -1)"
                                                        class="p-1 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 disabled:opacity-50"
                                                        {{ $item->quantity <= 1 ? '' : '' }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    <input id="quantity-{{ $item->id }}" type="number" min="1"
                                                        max="{{ $item->product->stock }}" value="{{ $item->quantity }}"
                                                        class="w-16 text-center p-1 border border-gray-300 rounded-md mx-2"
                                                        onchange="updateQuantityDirect('{{ $item->id }}')">
                                                    <button onclick="updateQuantity('{{ $item->id }}', 1)"
                                                        class="p-1 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form action="{{ route('cart.destroy', $item) }}" method="POST"
                                                    onsubmit="return showConfirmation(event,'Hapus list!','Anda yakin ingin menghapus item ini dari keranjang?','Hapus');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center p-2 rounded-md font-medium bg-red-100 text-red-600 hover:bg-red-200">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p id="cart-total">Rp{{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Ongkos kirim akan dihitung saat checkout.</p>
                            <div class="mt-6">
                                <a href="{{ route('checkout.index') }}"
                                    class="w-full flex items-center justify-center rounded-md border border-transparent bg-brown-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-brown-600">
                                    Lanjut ke Checkout
                                </a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>atau <a href="{{ route('products.index') }}"
                                        class="font-medium text-brown-500 hover:text-brown-400"> Lanjut Belanja<span
                                            aria-hidden="true"> &rarr;</span></a></p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-20 bg-white rounded-lg shadow-md">
                        <h2 class="text-xl font-medium text-gray-900">Keranjang Anda masih kosong.</h2>
                        <p class="mt-2 text-gray-500">Yuk, cari produk favoritmu!</p>
                        <div class="mt-6">
                            <a href="{{ route('products.index') }}"
                                class="text-base font-medium text-white bg-brown-500 hover:bg-brown-600 rounded-md px-6 py-3">
                                Mulai Belanja
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        async function postQty(itemId, newQuantity) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const res = await fetch(`/keranjang/update-quantity/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    quantity: newQuantity
                })
            });

            let data = {};
            try {
                data = await res.json();
            } catch (_) {}

            return {
                ok: res.ok && data.success,
                status: res.status,
                data
            };
        }

        function rupiah(n) {
            return 'Rp' + (n || 0).toLocaleString('id-ID');
        }

        async function updateQuantity(itemId, change) {
            const qtyInput = document.getElementById(`quantity-${itemId}`);
            let newQty = parseInt(qtyInput.value || '1', 10) + change;
            if (newQty < 1) newQty = 1;

            const {
                ok,
                status,
                data
            } = await postQty(itemId, newQty);
            const itemRow = document.getElementById(`cart-item-${itemId}`);
            const itemSubtotalEl = itemRow.querySelector('.item-subtotal');
            const price = parseFloat(itemSubtotalEl.getAttribute('data-price'));

            if (!ok) {
                if (status === 422 && typeof data.allowedQuantity !== 'undefined') {
                    qtyInput.value = data.allowedQuantity;
                    itemSubtotalEl.innerText = rupiah(price * data.allowedQuantity);
                    Swal.fire({
                        icon: "error",
                        title: "Stok tidak cukup",
                        text: data.message || "Jumlah melebihi stok tersedia.",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    updateCartTotal();
                    return;
                }
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: data?.message || "Gagal memperbarui kuantitas."
                });
                return;
            }

            qtyInput.value = data.newQuantity;
            itemSubtotalEl.innerText = rupiah(data.newSubtotal);
            updateCartTotal();
        }

        async function updateQuantityDirect(itemId) {
            const qtyInput = document.getElementById(`quantity-${itemId}`);
            let newQty = parseInt(qtyInput.value || '1', 10);
            if (isNaN(newQty) || newQty < 1) newQty = 1;

            const maxAttr = parseInt(qtyInput.getAttribute('max') || '0', 10);
            if (maxAttr > 0 && newQty > maxAttr) newQty = maxAttr;

            const {
                ok,
                status,
                data
            } = await postQty(itemId, newQty);
            const itemRow = document.getElementById(`cart-item-${itemId}`);
            const itemSubtotalEl = itemRow.querySelector('.item-subtotal');
            const price = parseFloat(itemSubtotalEl.getAttribute('data-price'));

            if (!ok) {
                if (status === 422 && typeof data.allowedQuantity !== 'undefined') {
                    qtyInput.value = data.allowedQuantity;
                    itemSubtotalEl.innerText = rupiah(price * data.allowedQuantity);
                    Swal.fire({
                        icon: "error",
                        title: "Stok tidak cukup",
                        text: data.message || "Jumlah melebihi stok tersedia.",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    updateCartTotal();
                    return;
                }
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: data?.message || "Gagal memperbarui kuantitas."
                });
                return;
            }

            qtyInput.value = data.newQuantity;
            itemSubtotalEl.innerText = rupiah(data.newSubtotal);
            updateCartTotal();
        }

        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('#cart-list li').forEach(item => {
                const subtotalText = item.querySelector('.item-subtotal')?.innerText || '0';
                const raw = subtotalText.replace(/[^\d]/g, '');
                total += parseInt(raw || '0', 10);
            });
            document.getElementById('cart-total').innerText = rupiah(total);
        }
    </script>
@endsection
