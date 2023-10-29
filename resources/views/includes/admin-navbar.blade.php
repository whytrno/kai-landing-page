<nav>
    <div class="flex justify-between py-2 items-center px-10 bg-[#152A75] text-white font-bold w-full">
        <div>
            <img src="{{ asset('logo.png') }}" alt="" class="h-14">
        </div>
        <div class="gap-5 flex">
            <a href="/" class="{{ Request::path() == '/' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Beranda</a>
            @if (auth()->user())
                <a href="{{ route('laporan.index') }}"
                    class="{{ Request::path() == 'lapangan' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Laporan</a>
                <div>
                    <button onclick="togglePengaturanModal()"
                        class="{{ Request::path() == 'pengaturan' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Pengaturan</button>
                </div>
                <a href="/profile"
                    class="{{ Request::path() == 'profile' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Hallo,
                    {{ auth()->user()->nama }}</a>
            @else
                <a href="/login"
                    class="{{ Request::path() == 'profile' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Login</a>
            @endif
        </div>
    </div>

    <div id="pengaturanModal"
        class="hidden font-bold rounded-b-lg text-white flex flex-col gap-2 py-4 px-8 bg-[#152A75] w-min whitespace-nowrap float-right absolute right-0 top-18">
        <a href="/admin/user-setting" class="hover:text-[#C95C0D]">User Setting</a>
        <a href="/admin/video-setting" class="hover:text-[#C95C0D]">Pengaturan Video</a>
    </div>
</nav>

@push('scripts')
    <script>
        function togglePengaturanModal() {
            $('#pengaturanModal').toggleClass('hidden');
        }
    </script>
@endpush
