@extends('includes.main')

@section('content')
    <div class="bg-[url('{{ asset('images/bg2.png') }}')] bg-cover">
        <div class="py-5 px-10 space-y-10">
            <h1 class="font-bold text-2xl">User Setting</h1>
            <div class="space-y-5 bg-white rounded-t-lg">
                <div class="flex gap-2 justify-center bg-[#277ACD] py-2 text-white font-semibold rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                    </svg>
                    <p>Data User</p>
                </div>

                <div class="px-10 pb-10 space-y-5">
                    <div class="flex justify-between">
                        <button onclick="toggleAddModal()"
                            class="font-semibold px-8 py-2 rounded-lg bg-[#277ACD] text-white">Tambah Video</button>
                        <form action="{{route('video-setting.search')}}" method="POST" class="flex gap-3">
                            @csrf
                            <input type="text" name="nama" id="" placeholder="Cari Data" class="border border-[#277ACD] rounded-lg py-2 px-4">
                            <button type="submit" class="bg-[#277ACD] text-white rounded-lg py-2 px-4">Cari</button>
                        </form>
                    </div>

                    <div>
                        <table class="w-full text-[#152A75]">
                            <tr>
                                <th class="border border-[#277ACD]">No</th>
                                <th class="border border-[#277ACD]">Nama Video</th>
                                <th class="border border-[#277ACD]">Aksi</th>
                            </tr>
                            @foreach($data as $d)
                            <tr class="text-center">
                                <td class="border border-[#277ACD]">{{$loop->iteration}}</td>
                                <td class="border border-[#277ACD]">{{$d->nama}}</td>
                                <td class="border border-[#277ACD]">
                                    <div class=" flex gap-3 justify-center items-center">
                                        <button onclick="toggleEditModal({{$d->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-[#277ACD]">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </button>
                                        |
                                        <button onclick="toggleDeleteModal({{$d->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-[#277ACD]">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                                <div id="editModal{{$d->id}}" class="hidden fixed top-0 left-0 flex items-center justify-center w-full h-full">
                                    <div class="absolute z-99 bg-white p-6 rounded-lg space-y-5 w-2/5">
                                        <div class="flex justify-between items-center border-b border-black pb-4">
                                            <h1 class="text-2xl font-bold">Tambah Video</h1>
                                            <button onclick="toggleEditModal({{$d->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                     stroke="currentColor" class="w-6 h-6 stroke-red-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{route('video-setting.update', $d->id)}}" method="POST" class="space-y-10" enctype="multipart/form-data">
                                            @csrf
                                            <div class="space-y-2 col-span-2">
                                                <p>Pilih Video:</p>
                                                <div onclick="document.getElementById('file2').click()" id="file-container"
                                                     class="cursor-pointer hover:text-[#014F31] hover:border-[#014F31] hover:fill-[#014F31] flex flex-col items-center rounded-[12px] py-8 justyfy-center border-dashed border-2 text-gray-300 fill-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                         class="w-16 h-16">
                                                        <path fill-rule="evenodd"
                                                              d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.03 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v4.94a.75.75 0 001.5 0v-4.94l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                    <p id="file-name2" class="font-semibold text-center">Lampirkan file Anda di sini <br> atau <br>
                                                        Jelajahi file</p>
                                                </div>
                                                <input type="file" required name="video" accept="video/*" id="file2" class="hidden">
                                            </div>
                                            <button type="submit" class="bg-blue-600 w-full rounded-lg py-2 text-white">Simpan</button>
                                        </form>
                                    </div>
                                </div>

                                <div id="deleteModal{{$d->id}}" class="hidden fixed top-0 left-0 flex items-center justify-center w-full h-full">
                                    <div class="absolute z-99 bg-white p-6 rounded-lg space-y-5">
                                        <h1 class="text-2xl font-bold">Apakah anda ingin menghapus data ini ?</h1>
                                        <div class="flex justify-end gap-3">
                                            <form action="{{route('video-setting.destroy', $d->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white bg-[#FF000D] py-2 rounded-lg px-10">Oke</button>
                                            </form>
                                            <button onclick="toggleDeleteModal({{$d->id}})" class="bg-[#D7D7D7] py-2 rounded-lg px-10">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addModal" class="hidden fixed top-0 left-0 flex items-center justify-center w-full h-full">
        <div class="absolute z-99 bg-white p-6 rounded-lg space-y-5 w-2/5">
            <div class="flex justify-between items-center border-b border-black pb-4">
                <h1 class="text-2xl font-bold">Tambah Video</h1>
                <button onclick="toggleAddModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 stroke-red-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{route('video-setting.store')}}" method="POST" class="space-y-10" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2 col-span-2">
                    <p>Pilih Video:</p>
                    <div onclick="document.getElementById('file').click()" id="file-container"
                        class="cursor-pointer hover:text-[#014F31] hover:border-[#014F31] hover:fill-[#014F31] flex flex-col items-center rounded-[12px] py-8 justyfy-center border-dashed border-2 text-gray-300 fill-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-16 h-16">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.03 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v4.94a.75.75 0 001.5 0v-4.94l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                                clip-rule="evenodd" />
                        </svg>
                        <p id="file-name" class="font-semibold text-center">Lampirkan file Anda di sini <br> atau <br>
                            Jelajahi file</p>
                    </div>
                    <input type="file" required name="video" accept="video/*" id="file" class="hidden">
                </div>
                <button class="bg-[#0B8908] w-full rounded-lg py-2 text-white">Tambah</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#file').change(function() {
            const fileName = $('#file').val().split('\\').pop();
            $('#file-name').text(fileName);
        })
        $('#file2').change(function() {
            const fileName = $('#file2').val().split('\\').pop();
            $('#file-name2').text(fileName);
        })
        function toggleAddModal() {
            $('#addModal').toggleClass('hidden');
        }

        function toggleEditModal(id) {
            $('#editModal' + id).toggleClass('hidden');
        }

        function toggleDeleteModal(id) {
            $('#deleteModal' + id).toggleClass('hidden');
        }
    </script>
@endpush
