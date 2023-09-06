
<nav>
    <div class="flex justify-between py-2 items-center px-10 bg-[#152A75] text-white font-bold w-full">
        <div>
            <img src="{{asset('logo.png')}}" alt="" class="h-14">
        </div>
        <div class="gap-5 flex">
            <a href="/" class="{{Request::path() == '/' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]'}}">Beranda</a>
            <a href="/laporan" class="{{Request::path() == 'lapangan' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]'}}">Laporan</a>
            <div>
                <button onclick="togglePengaturanModal()" class="{{Request::path() == 'pengaturan' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]'}}">Pengaturan</button>
            </div>
            <a href="/login" class="{{Request::path() == 'profile' ? 'text-[#C95C0D]' : 'hover:text-[#C95C0D]'}}">Profil</a>
        </div>
    </div>

    <div id="pengaturanModal" class="hidden font-bold rounded-b-lg text-white flex flex-col gap-2 py-4 px-8 bg-[#152A75] w-min whitespace-nowrap float-right absolute right-0 top-18">
        <a href="/user-setting" class="hover:text-[#C95C0D]">User Setting</a>
        <a href="/video-setting" class="hover:text-[#C95C0D]">Pengaturan Video</a>
    </div>
</nav>

@push('scripts')
    <script>
        function togglePengaturanModal() {
            $('#pengaturanModal').toggleClass('hidden');
        }
    </script>
@endpush
