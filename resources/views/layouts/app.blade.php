{{-- layout untuk home, view, schedule, notifications, setting, dan help --}}
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
    
    <body class="antialiased bg-[#E8EEF9]">

        <div class="flex flex-col min-h-screen">
            <header class="flex font-poppins items-center justify-between w-full bg-[#E8EEF9]">

                <div class="flex items-center gap-8">
                    <a href="{{ url('/home') }}">
                        <img class="w-[110px]" src="{{ Vite::asset('resources/images/logo-favicon.png') }}" alt="Logo">
                    </a>
                    
                    <div class="flex flex-col"> 
                        <div class="text-3xl font-bold text-gray-900">Hi, {{ Auth::user()->name }}!</div>
                        <p class="text-xs text-gray-500">Let's take a look at your activity today</p>
                    </div>
                </div>

                <div class="pt-4 text-xl font-bold text-gray-500 pr-7">{{ \Carbon\Carbon::now()->format('d M Y') }}</div>
                    
                <div class="flex items-center gap-10 mr-8">
                    <div class="relative transition-transform duration-200 hover:hover:scale-105">
                        <input type="text" placeholder="Search" class="w-[180px] py-2 pl-16 pr-4 border-white bg-white rounded-3xl focus:outline-none focus:ring-2 focus:ring-[#0E213D]">
                        <svg class="absolute w-6 h-6 text-gray-400 -translate-y-1/2 left-3 top-1/2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" fill="#000000"></path> </g></svg>
                    </div>

                    <a href="{{ route('profile.edit') }}">                       
                        <svg class="w-12 h-12 transition-transform duration-200 hover:hover:scale-110" viewBox="0 0 61.7998 61.7998" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g data-name="Layer 2" id="Layer_2"> <g data-name="—ÎÓÈ 1" id="_ÎÓÈ_1"> <circle cx="30.8999" cy="30.8999" fill="#58b0e0" r="30.8999"></circle> <path d="M23.255 38.68l15.907.121v12.918l-15.907-.121V38.68z" fill="#f9dca4" fill-rule="evenodd"></path> <path d="M43.971 58.905a30.967 30.967 0 0 1-25.843.14V48.417H43.97z" fill="#e6e6e6" fill-rule="evenodd"></path> <path d="M33.403 61.7q-1.238.099-2.503.1-.955 0-1.895-.057l1.03-8.988h2.41z" fill="#e9573e" fill-rule="evenodd"></path> <path d="M25.657 61.332A34.072 34.072 0 0 1 15.9 57.92a31.033 31.033 0 0 1-7.857-6.225l1.284-3.1 13.925-6.212c0 5.212 1.711 13.482 2.405 18.95z" fill="#677079" fill-rule="evenodd"></path> <path d="M39.165 38.759v3.231c-4.732 5.527-13.773 4.745-15.8-3.412z" fill-rule="evenodd" opacity="0.11"></path> <path d="M31.129 8.432c21.281 0 12.987 35.266 0 35.266-12.267 0-21.281-35.266 0-35.266z" fill="#ffe8be" fill-rule="evenodd"></path> <path d="M18.365 24.046c-3.07 1.339-.46 7.686 1.472 7.658a31.972 31.972 0 0 1-1.472-7.659z" fill="#f9dca4" fill-rule="evenodd"></path> <path d="M44.14 24.045c3.07 1.339.46 7.687-1.471 7.658a31.993 31.993 0 0 0 1.471-7.658z" fill="#f9dca4" fill-rule="evenodd"></path> <path d="M21.931 14.328c-3.334 3.458-2.161 13.03-2.161 13.03l-1.05-.495c-6.554-25.394 31.634-25.395 25.043 0l-1.05.495s1.174-9.572-2.16-13.03c-4.119 3.995-14.526 3.974-18.622 0z" fill="#464449" fill-rule="evenodd"></path> <path d="M36.767 61.243a30.863 30.863 0 0 0 17.408-10.018l-1.09-2.631-13.924-6.212c0 5.212-1.7 13.393-2.394 18.861z" fill="#677079" fill-rule="evenodd"></path> <path d="M39.162 41.98l-7.926 6.465 6.573 5.913s1.752-9.704 1.353-12.378z" fill="#ffffff" fill-rule="evenodd"></path> <path d="M23.253 41.98l7.989 6.465-6.645 5.913s-1.746-9.704-1.344-12.378z" fill="#ffffff" fill-rule="evenodd"></path> <path d="M28.109 51.227l3.137-2.818 3.137 2.818-3.137 2.817-3.137-2.817z" fill="#e9573e" fill-rule="evenodd"></path> <path d="M25.767 61.373a30.815 30.815 0 0 1-3.779-.88 2.652 2.652 0 0 1-.114-.093l-3.535-6.39 4.541-3.26h-4.752l1.017-6.851 4.11-2.599c.178 7.37 1.759 15.656 2.512 20.073z" fill="#434955" fill-rule="evenodd"></path> <path d="M36.645 61.266c.588-.098 1.17-.234 1.747-.384.682-.177 1.36-.377 2.034-.579l.134-.043 3.511-6.315-4.541-3.242h4.752l-1.017-6.817-4.11-2.586c-.178 7.332-1.758 15.571-2.51 19.966z" fill="#434955" fill-rule="evenodd"></path> </g> </g> </g></svg>
                    </a>
                </div>
            </header>

            {{-- AREA KONTEN UTAMA --}}
            <div class="flex flex-1">

                {{-- SIDEBAR --}}
                @include('layouts.sidebar')
                
                {{-- AREA KONTEN KANAN (YANG BISA SCROLL) --}}
                <div class="flex flex-col flex-1">
                    
                    @isset($header)
                        <header class="bg-black shadow"> {{-- Ini header hitam opsional Anda --}}
                            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <main class="flex-1 p-6">
                        {{ $slot }}
                    </main>

                </div>           
            </div>
        </div>
    </body>
</html>