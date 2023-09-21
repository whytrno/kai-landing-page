@extends('includes.main')

@section('content')
    <div class="bg-[url('{{ asset('images/bg2.png') }}')] bg-cover h-screen text-white">
        <div class="flex justify-center px-10 items-center h-full">
            <div class="py-10 px-14 bg-[#152A75] w-1/3 rounded-lg space-y-2">
                @if(session('success'))
                    <p class="text-blue-700 text-center">{{session('success')}}</p>
                @endif
                <form action="{{route('profile.update')}}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <p class="font-semibold">Nama</p>
                        <div class="flex items-center border-b border-white justify-between">
                            <input type="text" name="nama" value="{{auth()->user()->nama}}" class="bg-transparent w-full" disabled>
                            <button onclick="toggleEditProfile()" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold">Nomor Pegawai</p>
                        <div class="flex items-center border-b border-white justify-between">
                            <input type="text" name="id_pegawai" value="{{auth()->user()->id_pegawai}}" class="bg-transparent w-full" disabled>
                            <button onclick="toggleEditProfile()" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <a id="logout" href="{{route('logout')}}"
                        class="block text-center w-full whitespace-nowrap rounded-lg bg-[#D76513] py-1">Log Out</a>
                    <button id="submit" type="submit"
                        class="hidden block text-center w-full whitespace-nowrap rounded-lg bg-[#D76513] py-1">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleEditProfile() {
            $('input').removeAttr('disabled');
            $('#logout').toggleClass('hidden');
            $('#submit').toggleClass('hidden');
        }
    </script>
@endpush
