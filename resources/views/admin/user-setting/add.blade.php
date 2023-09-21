@extends('includes.main')

@section('content')
    <div class="bg-[url('{{ asset('images/bg2.png') }}')] bg-cover p-20">
        <div class="bg-white w-full py-5 px-10 space-y-10">
            <h1 class="text-2xl font-bold">Input Data</h1>
            <form action="{{route('user-setting.store')}}" method="POST" class="space-y-10">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-12 items-center">
                        <label for="" class="col-span-2">Nama User</label>
                        <input type="text" name="nama" id=""
                            class="col-span-10 border py-2 px-4 border-[#277ACD] rounded-lg w-full">
                    </div>
                    <div class="grid grid-cols-12 items-center">
                        <label for="" class="col-span-2">Username</label>
                        <input type="text" name="username" id=""
                            class="col-span-10 border py-2 px-4 border-[#277ACD] rounded-lg w-full">
                    </div>
                    <div class="grid grid-cols-12 items-center">
                        <label for="" class="col-span-2">Kedudukan/Jabatan</label>
                        <input type="text" name="kedudukan" id=""
                            class="col-span-10 border py-2 px-4 border-[#277ACD] rounded-lg w-full">
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit" class="text-white bg-[#0B8908] py-2 rounded-lg px-10">Tambah</button>
                    <a href="/user-setting" class="bg-[#D7D7D7] py-2 rounded-lg px-10">Tutup</a>
                </div>
            </form>
        </div>
    </div>
@endsection
