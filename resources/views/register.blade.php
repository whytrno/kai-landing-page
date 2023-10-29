@extends('includes.main')

@section('content')
    <div class="bg-[url('{{ asset('images/bg2.png') }}')] bg-cover h-screen text-white">
        <div class="flex justify-end px-10 items-center h-full">
            <div class="py-10 px-14 bg-[#152A75] w-1/2 rounded-lg space-y-2">
                <h1 class="font-bold text-center">Sign Up</h1>
                <form action="{{ route('user-setting.store') }}" method="POST" class="space-y-2">
                    @csrf
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Masukkan id pegawai"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">ID Pegawai</label>
                    <input type="number" name="id_pegawai" placeholder="Masukkan id pegawai"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">Kedudukan</label>
                    <input type="text" name="kedudukan" placeholder="Masukkan id pegawai"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Masukkan password" class="py-2 px-4 rounded-lg w-full text-black">
                    <p class="text-red-700" id="error">Password harus sama</p>
                    <button id="submit" disabled type="submit"
                        class="block w-full text-center whitespace-nowrap rounded-lg bg-[#D76513]/70 py-1 px-6">Selanjutnya</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#password').on('input', function() {
            validatePassword();
        });

        $('#password_confirmation').on('input', function() {
            validatePassword();
        });

        function validatePassword() {
            var password = $('#password').val();
            var passwordConfirmation = $('#password_confirmation').val();

            if (password === passwordConfirmation) {
                $('#error').addClass('hidden');
                $('#submit').removeAttr('disabled');
                $('#submit').removeClass('bg-[#D76513]/70');
                $('#submit').addClass('bg-[#D76513]');
            } else {
                $('#error').removeClass('hidden');
                $('#submit').attr('disabled', true);
                $('#submit').addClass('bg-[#D76513]/70');
                $('#submit').removeClass('bg-[#D76513]');
            }
        }
    </script>
@endpush
