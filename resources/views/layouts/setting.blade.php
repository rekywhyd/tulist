<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <div class="flex w-full min-h-screen bg-[#E8EEF9]">

        {{-- LEFT SIDE (Sidebar) - 1/3 Lebar --}}
        <div class="bg-[#D5E2F5] rounded-r-3xl w-1/3 min-h-screen shadow-[#87a9dc] shadow-2xl">

            <aside class="flex flex-col w-full h-full sidebar-background">

                {{-- 1. TOP SECTION - BACK Button (Selalu di Atas) --}}
                <a href="{{ route('home') }}"
                    class="flex items-center gap-4 p-6 text-4xl font-bold text-black transition-transform duration-200 hover:hover:scale-105 font-poppins">
                    {{-- BACK Icon SVG --}}
                    <svg class="w-6 h-6" fill="#000000" height="200px" width="200px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 472.615 472.615" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path
                                        d="M167.158,117.315l-0.001-77.375L0,193.619l167.157,153.679v-68.555c200.338,0.004,299.435,153.932,299.435,153.932 c3.951-19.967,6.023-40.609,6.023-61.736C472.615,196.295,341.8,117.315,167.158,117.315z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Back
                </a>

                {{-- RUANG PEMISAH (Memaksa 2 turun) --}}
                <div class="flex-grow"></div>

                {{-- 2. MIDDLE-UP SECTION - MY SETTING --}}
                <div class="p-8 mb-10 my-settings-section">
                    <h2 class="ml-20 text-4xl font-bold text-black font-poppins">
                        My Settings
                    </h2>
                </div>

                {{-- RUANG PEMISAH (Memaksa 3 turun) --}}
                <div class="flex-grow"></div>

                {{-- 3. MIDDLE-DOWN SECTION - PROFILE, PRIVACY, HELP --}}
                <div class="mb-10 navigation-links-section font-poppins">
                    <nav class="space-y-4">
                        <a href="{{ route('profile.edit') }}"
                            class="p-2 pl-16 transition-colors font-bold text-3xl block rounded-3xl duration-200 {{ request()->routeIs('profile') ? 'bg-[#74A7FF] text-white' : 'text-black hover:bg-[#74A7FF] hover:text-white' }}">
                            Profile</a>
                        <a href="{{ route('privacy') }}"
                            class="p-2 pl-16 transition-colors font-bold text-3xl block rounded-3xl duration-200 {{ request()->routeIs('privacy') ? 'bg-[#74A7FF] text-white' : 'text-black hover:bg-[#74A7FF] hover:text-white' }}">
                            Privacy</a>
                        {{-- Contoh elemen aktif: Link Help --}}
                        <a href="{{ route('help') }}"
                            class="py-2 pl-16 transition-colors font-bold text-3xl block rounded-3xl duration-200 {{ request()->routeIs('help') ? 'bg-[#74A7FF] text-white' : 'text-black hover:bg-[#74A7FF] hover:text-white' }}">
                            Help</a>
                    </nav>
                </div>

                {{-- RUANG PEMISAH (Memaksa 4 turun) --}}
                <div class="flex-grow"></div>

                {{-- 4. BOTTOM SECTION - LOGOUT Button (Selalu di Bawah) --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" title="Log Out"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="pl-4 m-8 pr-6 py-2 inline-flex items-center gap-4 border border-white transition-colors text-3xl font-bold font-poppins bg-white/20 rounded-full backdrop-blur-3xl duration-200 hover:scale-105 {{ request()->routeIs('logout') ? 'bg-red-600 text-white' : 'text-black hover:bg-red-600 hover:text-white' }}">
                        {{-- LOGOUT Icon SVG --}}
                        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 6.5C2 4.01472 4.01472 2 6.5 2H12C14.2091 2 16 3.79086 16 6V7C16 7.55228 15.5523 8 15 8C14.4477 8 14 7.55228 14 7V6C14 4.89543 13.1046 4 12 4H6.5C5.11929 4 4 5.11929 4 6.5V17.5C4 18.8807 5.11929 20 6.5 20H12C13.1046 20 14 19.1046 14 18V17C14 16.4477 14.4477 16 15 16C15.5523 16 16 16.4477 16 17V18C16 20.2091 14.2091 22 12 22H6.5C4.01472 22 2 19.9853 2 17.5V6.5ZM18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289L22.7071 11.2929C23.0976 11.6834 23.0976 12.3166 22.7071 12.7071L19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071C17.9024 15.3166 17.9024 14.6834 18.2929 14.2929L19.5858 13L11 13C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11L19.5858 11L18.2929 9.70711C17.9024 9.31658 17.9024 8.68342 18.2929 8.29289Z"
                                    fill="currentColor"></path>
                            </g>
                        </svg>
                        Logout
                    </a>
                </form>
            </aside>

        </div>

        {{-- MAIN CONTENT (Right Side) --}}
        <main class="w-2/3 px-16 pb-6">
            @yield('content')
        </main>

    </div>
</body>

</html>
