<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="antialiased text-black bg-[#EAF0FA] font-poppins bg-[url('../images/bg-auth.png')] bg-cover bg-center bg-no-repeat">
    <div class="mx-16 my-12 mpb-10 rounded-[40px] bg-white/60 backdrop-blur-lg">
        <a href="{{ url('/') }}">
            <img class="w-[175px] ml-[280px] pt-[50px] pb-2" src="{{ Vite::asset('resources/images/logo-navbar.png') }}"
                alt="Logo">
        </a>

        <div class="flex items-center justify-center gap-12 pr-0">
            <div class="w-[500px] px-[50px] py-8 mt-2 mb-24 bg-white shadow-2xl rounded-[50px]">
                {{ $slot }}
            </div>

            <img class="pl-16 w-[480px] mb-[50px]" src="{{ Vite::asset('resources/images/login-girl.png') }}"
                alt="Login girl">
        </div>
    </div>
</body>

</html>
