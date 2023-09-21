@extends('includes.main')

@section('content')
    <div class="bg-[url('{{ asset('images/bg2.png') }}')] bg-cover h-screen text-white">
        <div class="flex justify-end px-10 items-center h-full">
            <div class="py-10 px-14 bg-[#152A75] w-1/3 rounded-lg space-y-2">
                <h1 class="font-bold text-center">Login</h1>
                @if(session('error'))
                    <p class="text-red-700 text-center">{{session('error')}}</p>
                @endif
                <form action="{{route('login')}}" method="POST" class="space-y-2">
                    @csrf
                    <input type="text" name="username" placeholder="Masukkan username"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="py-2 px-4 rounded-lg w-full text-black">
                    <button type="submit" class="block w-min whitespace-nowrap rounded-lg bg-[#D76513] py-1 px-6">Masuk</button>
                </form>
                <div class="flex gap-1 text-sm">
                    <p class="text-white">Belum Memiliki Akun ?</p>
                    <a href="/register" class="text-orange-800">Sign Up !</a>
                </div>
            </div>
        </div>
    </div>
@endsection
