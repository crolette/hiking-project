<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="container flex flex-col items-center mx-auto px-4">
        @include('includes.header')

        @yield('content')

        @include('includes.footer')
</body>
</html>