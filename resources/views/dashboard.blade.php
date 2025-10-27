<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tulist</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>


    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        
        <!-- Navbar -->
    <header class="flex justify-between items-center px-8 py-4 bg-white/70 backdrop-blur-md shadow-sm fixed top-0 left-0 w-full z-50">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10">
        <h1 class="font-bold text-xl">ToDo<span class="text-blue-600">App</span></h1>
      </div>

      <nav class="hidden md:flex space-x-8">
        <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
        <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
      </nav>

      <div class="space-x-3">
        <a href="{{ route('login') }}" class="px-4 py-2 rounded-full font-medium text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white transition">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 rounded-full font-medium text-white bg-blue-600 hover:bg-blue-700 transition">Sign Up</a>
      </div>
    </header>

</body>
</html>
