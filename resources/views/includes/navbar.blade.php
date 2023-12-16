<nav>
    @if (isset(auth()->user()->role) && auth()->user()->role === 'admin')
        <div class="flex justify-between py-2 items-center px-10 bg-[#152A75] text-white font-bold w-full">
            <div>
                <img src="{{ asset('logo.png') }}" alt="" class="h-14">
            </div>
            <div class="gap-5 flex">
                <a href="/"
                    class="{{ Request::path() == '/' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Beranda</a>
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
    @else
        <div class="flex justify-between py-2 items-center px-10 bg-[#152A75] text-white font-bold w-full">
            <div>
                <img src="{{ asset('logo.png') }}" alt="" class="h-14">
            </div>
            <div class="gap-5 flex">
                <a href="/"
                    class="{{ Request::path() == '/' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }}">Beranda</a>
                @if (auth()->user())
                    <div>
                        <button onclick="togglePengaturanModal()"
                            class="{{ Request::path() == 'pengaturan' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]' }} flex gap-2 items-center">
                            View Video
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="chevron w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="chevron hidden w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                            </svg>
                        </button>
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
    @endif

    <div id="pengaturanModal"
        class="hidden font-bold rounded-b-lg text-white flex flex-col gap-2 py-4 px-8 bg-[#152A75] w-min whitespace-nowrap float-right absolute right-0 top-18">
        <a href="/admin/video-setting" class="hover:text-[#C95C0D]">Pelayanan</a>
        <a href="/admin/video-setting" class="hover:text-[#C95C0D]">Keamanan</a>
        <a href="/admin/video-setting" class="hover:text-[#C95C0D]">Kebersihan</a>
    </div>
</nav>

@push('scripts')
    <script>
        function togglePengaturanModal() {
            $('#pengaturanModal').toggleClass('hidden');
            $('.chevron').toggleClass('hidden');
        }
    </script>
@endpush
