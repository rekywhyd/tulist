<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="font-sans antialiased">
        
        {{-- 
          PERUBAHAN UTAMA DIMULAI DI SINI
          Kita bungkus semua dengan flex-box untuk menempatkan sidebar 
          dan konten utama secara berdampingan.
        --}}
        <div class="flex h-screen bg-gray-100">

            @include('layouts.sidebar')

            <div class="flex flex-col flex-1 overflow-y-auto">

                {{-- Kita pindahkan bg-yellow-200 dari body ke header ini --}}
                <header class="flex items-center justify-between w-full px-6 pt-6 bg-yellow-200 lg:px-10">
                    <div class="flex items-center space-x-4">
                        <img class="w-[100px]" src="{{ Vite::asset('resources/images/logo-navbar.png') }}" alt="Logo">
                        
                        {{-- Layout sapaan yang sudah diperbaiki --}}
                        <div class="flex flex-col"> 
                            <div class="text-2xl font-bold text-gray-800">Hi, {{ Auth::user()->name }}!</div>
                            <p class="text-gray-500">Let's take a look at your activity today</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="hidden font-semibold text-gray-700 md:block">{{ \Carbon\Carbon::now()->format('d M Y') }}</div>
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="py-2 pl-10 pr-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-5 h-5 text-gray-400 -translate-y-1/2 left-3 top-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <img class="object-cover w-12 h-12 rounded-full" src="https_placehold.co/100x100/E2E8F0/334155?text={{ substr(Auth::user()->name, 0, 1) }}" alt="User Avatar">
                    </div>
                </header>

                {{-- 
                  Ini adalah wrapper 'min-h-screen' Anda sebelumnya, 
                  tapi sekarang kita hanya butuh kontennya.
                --}}
                
                @isset($header)
                    <header class="bg-black shadow"> {{-- Anda memberi bg-black di sini --}}
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="flex-1 p-6"> {{-- Tambahkan padding agar konten tidak menempel --}}
                    {{ $slot }}
                </main>
            
            </div> {{-- Akhir dari wrapper konten utama --}}
        
        </div> {{-- Akhir dari flex-box root --}}

    </body>
</html>