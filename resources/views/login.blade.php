@extends('includes.main')

@section('content')
    <div class="bg-[url('{{ asset('images/bg2.png') }}')] bg-cover h-screen text-white">
        <div class="flex justify-end px-10 items-center h-full">
            <div class="py-10 px-14 bg-[#152A75] w-1/3 rounded-lg space-y-2">
                <h1 class="font-bold text-center">Login</h1>
                @if (session('error'))
                    <p class="text-red-700 text-center">{{ session('error') }}</p>
                @endif
                <form action="{{ route('login') }}" method="POST" class="space-y-2">
                    @csrf
                    <input type="text" name="username" placeholder="Masukkan username"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <button type="submit"
                        class="block w-min whitespace-nowrap rounded-lg bg-[#D76513] py-1 px-6">Masuk</button>
                </form>
                <div class="flex gap-1 text-sm">
                    <p class="text-white">Belum Memiliki Akun ?</p>
                    <a href="/register" class="text-orange-800">Sign Up !</a>
                </div>
            </div>
        </div>
    </div>
    <div id="success-popup"
        class="hidden fixed top-0 left-0 w-full h-full bg-opacity-50 bg-gray-900 flex items-center justify-center">
        <div class="bg-white p-4 rounded-lg">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-18 h-18 stroke-green-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <p class="text-xl font-bold">Login berhasil!</p>
        </div>
    </div>
    <div id="failed-popup"
        class="hidden fixed top-0 left-0 w-full h-full bg-opacity-50 bg-gray-900 flex items-center justify-center">
        <div class="bg-white p-4 rounded-lg">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-18 h-18 stroke-red-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

            </div>

            <p class="text-xl font-bold">Login gagal!</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        @if (session('success'))
            // Tampilkan pesan pop-up saat login berhasil
            var successPopup = document.getElementById('success-popup');
            successPopup.classList.remove('hidden');

            // Sembunyikan pesan pop-up setelah 3 detik
            setTimeout(function() {
                successPopup.classList.add('hidden');
            }, 3000);

            // Alihkan pengguna ke halaman profil setelah 3 detik
            setTimeout(function() {
                window.location.href = "{{ route('profile') }}";
            }, 3000);
        @elseif (session('failed'))
            // Tampilkan pesan pop-up saat login berhasil
            var failedPopup = document.getElementById('failed-popup');
            failedPopup.classList.remove('hidden');

            // Sembunyikan pesan pop-up setelah 3 detik
            setTimeout(function() {
                failedPopup.classList.add('hidden');
            }, 3000);
        @endif
    </script>
@endpush
