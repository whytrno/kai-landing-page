@extends('includes.main')

@section('content')

    <div class="bg-[url('{{asset('images/bg2.png')}}')]">
        <div class="py-5 px-10 space-y-10">
            <h1 class="font-bold text-2xl">User Setting</h1>
            <div class="space-y-5 bg-white rounded-t-lg">
                <div class="flex gap-2 justify-center bg-[#277ACD] py-2 text-white font-semibold rounded-lg">
                    <p>Laporan</p>
                </div>

                <div class="px-10 pb-10 space-y-5">
                    <div>
                        <table class="w-full text-[#152A75]">
                            <tr>
                                <th class="border border-[#277ACD]">No</th>
                                <th class="border border-[#277ACD]">NIPP</th>
                                <th class="border border-[#277ACD]">Nama</th>
                                <th class="border border-[#277ACD]" colspan="5">Tanggal</th>
                                <th class="border border-[#277ACD]">Unit Kerja</th>
                                <th class="border border-[#277ACD]">Rata-Rata</th>
                                <th class="border border-[#277ACD]">Keterangan</th>
                            </tr>
                            <tr class="text-center">
                                <td class="border border-[#277ACD]">1</td>
                                <td class="border border-[#277ACD]">Bambang</td>
                                <td class="border border-[#277ACD]">Bambang</td>
                                <td class="border border-[#277ACD]">Tanggal 1</td>
                                <td class="border border-[#277ACD]">Tanggal 2</td>
                                <td class="border border-[#277ACD]">Tanggal 3</td>
                                <td class="border border-[#277ACD]">Tanggal 4</td>
                                <td class="border border-[#277ACD]">Tanggal 5</td>
                                <td class="border border-[#277ACD]">Bambang</td>
                                <td class="border border-[#277ACD]">Bambang</td>
                                <td class="border border-[#277ACD]">Bambang</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
