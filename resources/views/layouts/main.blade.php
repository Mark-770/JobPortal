<!doctype html>
<html lang="en">
<head>
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{ asset('js/app.js') }}" defer></script>
{{--    //если че подключить в бади --}}
    @include('../partials.head')
</head>
<body>
    @include('../partials.nav')

    @yield('content')

    @include('../partials.footer')
</body>
</html>
