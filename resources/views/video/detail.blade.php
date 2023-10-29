@extends('includes.user-main')

@section('content')
    <div class="bg-white p-10 space-y-5">
        <p class="rounded-xl text-center font-semibold py-2 px-4 bg-[#152A75] text-white w-min">
            {{ ucfirst($data->category) }}</p>
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-7 h-min pb-2 rounded-xl border-2 border-gray-700 space-y-3">
                <video controls src="{{ asset('videos/' . $data->nama) }}" alt=""
                    class="rounded-xl h-96 w-full object-cover"></video>
                <div class="px-5 space-y-1">
                    <h1 class="font-semibold">{{ $data->judul }}</h1>
                    <p>{{ $data->keterangan }}</p>
                    <div class="flex gap-10">
                        <p>{{ $totalVideoWatched }} x ditonton</p>
                        <p>diunggah {{ $data->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-span-5 space-y-5">
                <div class="flex gap-2 items-center first:border-b first:pb-4 first:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-14 h-14 fill-[#277ACD]">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <video src="{{ asset('videos/' . $data->nama) }}" alt=""
                            class="h-36 w-full rounded-xl object-cover"></video>
                        <p class="font-semibold">{{ $data->nama }}</p>
                    </div>
                </div>

                @foreach ($latestVideo as $latest)
                    <a href="{{ route('video.detail', $latest->id) }}" class="flex gap-2 items-center">
                        @if (in_array($latest->id, $watchedVideos))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-14 h-14 fill-[#277ACD]">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                    clip-rule="evenodd" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-14 h-14 fill-gray-300">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif
                        <div>
                            <video src="{{ asset('videos/' . $latest->nama . '?' . time()) }}" alt=""
                                class="h-36 w-full rounded-xl object-cover"></video>
                            <p class="font-semibold">{{ $latest->nama }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
