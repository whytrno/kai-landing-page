<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    @if (isset(auth()->user()->role) && auth()->user()->role === 'admin')
        @include('includes.admin-navbar')
    @elseif(isset(auth()->user()->role) && auth()->user()->role === 'user')
        @include('includes.navbar')
    @else
        @include('includes.navbar')
    @endif

    @yield('content')

    @if (Request::path() != '/')
        @include('includes.footer2')
    @else
        @include('includes.footer')
    @endif

    @stack('scripts')
</body>

</html>
