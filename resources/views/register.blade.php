@extends('includes.main')

@section('content')

    <div class="bg-[url('{{asset('images/bg2.png')}}')] h-screen text-white">
        <div class="flex justify-end px-10 items-center h-full">
            <div class="py-10 px-14 bg-[#152A75] w-1/2 rounded-lg space-y-2">
                <h1 class="font-bold text-center">Sign Up</h1>
                <form action="" class="space-y-2">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="" placeholder="Masukkan nama lengkap" class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">ID Pegawai</label>
                    <input type="text" name="" placeholder="Masukkan id pegawai" class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">Password</label>
                    <input type="password" name="" placeholder="Masukkan password" class="py-2 px-4 rounded-lg w-full text-black">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" name="" placeholder="Masukkan password" class="py-2 px-4 rounded-lg w-full text-black">
                    <a href="/login" class="block w-full text-center whitespace-nowrap rounded-lg bg-[#D76513] py-1 px-6">Selanjutnya</a>
                </form>
            </div>
        </div>
    </div>

@endsection
