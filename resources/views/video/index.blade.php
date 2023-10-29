@extends('includes.user-main')

@section('content')
    <div class="bg-white grid grid-cols-4 gap-20 p-20">
        @foreach ($data as $d)
            <a href="{{ route('video.detail', $d->id) }}" class="space-y-1">
                <video src="{{ asset('videos/' . $d->nama) }}" class="rounded-xl h-40 w-full object-cover"></video>
                <p class="font-semibold break-words">{{ $d->judul }}</p>
            </a>
        @endforeach
    </div>
@endsection
