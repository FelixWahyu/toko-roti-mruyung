@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 border border-gray-200 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-800">Reset ulang password</h2>
            <p class="text-sm text-center text-gray-600">Masukkan alamat email anda dan kami akan mengirimkan tautan untuk
                menetapkan ulang password anda.</p>

            @if (session('success'))
                <div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button id="submitBtn" type="submit"
                        class="w-full mt-3 px-4 py-2 font-semibold text-white bg-brown-500 hover:bg-brown-600 rounded-md">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const submitBtn = document.getElementById("submitBtn");

            @if (session('success'))
                let countdown = 15;
                submitBtn.disabled = true;
                submitBtn.innerText = `Tunggu ${countdown} detik`;
                submitBtn.classList.add("opacity-70", "cursor-not-allowed");

                let timer = setInterval(() => {
                    countdown--;
                    submitBtn.innerText = countdown > 0 ?
                        `Tunggu ${countdown} detik` :
                        "Kirim";

                    if (countdown <= 0) {
                        clearInterval(timer);
                        submitBtn.disabled = false;
                        submitBtn.classList.remove("opacity-70", "cursor-not-allowed");
                    }
                }, 1000);
            @endif
        });
    </script>
@endsection
