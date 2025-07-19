@section('content')
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Zona Pengiriman</h1>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <form action="{{ route('admin.shipping-zones.update', $shippingZone) }}" method="POST">
            @method('PATCH')
            @include('superadmin.shipping-zones._form', ['submitButtonText' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
