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
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased text-black bg-[#EAF0FA] font-poppins bg-[url('../images/bg-auth.png')] bg-cover bg-center bg-no-repeat">
        <div class="pb-10 mx-16 my-12 rounded-3xl bg-white/70 backdrop-blur-lg">
            <a href="{{ url('/') }}">
                <img class="w-[175px] ml-12 pt-4" src="{{ Vite::asset('resources/images/logo-navbar.png') }}" alt="Logo">
            </a>

            <div class="relative min-h-[400px]">
                <img class="absolute z-50 max-w-[520px] mt-[75px] ml-[64px]" src="{{ Vite::asset('resources/images/time-management.png') }}" alt="time management">

                <div class="w-[570px] ml-[540px] px-[90px] py-8 my-6 bg-white shadow-2xl rounded-[50px]">
                    <div class="flex flex-col items-center font-serif">
                        {{-- Judul Formulir --}}
                        <h2 class="my-2 text-4xl font-bold text-gray-900">Sign Up</h2>
                        <p class="mb-6 text-sm font-semibold text-gray-500">Create an account, it's free</p>
                    </div>

                    {{-- Formulir Pendaftaran --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="flex gap-4 mb-5 font-poppins">
                            <!-- Name -->
                            <x-text-input id="name" class="block w-full px-4 py-[14px] mt-1 text-xs border border-gray-500 shadow-sm rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#6AA6FF]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            
                            <!-- Email -->
                            <x-text-input id="email" class="block w-full px-4 py-[14px] mt-1 text-xs border border-gray-500 shadow-sm rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#6AA6FF]" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="relative mb-5 font-poppins">
                            <x-text-input id="password" class="block w-full px-4 py-[14px] mt-1 text-xs border border-gray-500 shadow-sm rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#6AA6FF]"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" 
                                            placeholder="Password" />
                                
                                <button type="button" data-toggle-password data-target-input="#password" class="absolute right-0 flex items-center pl-2 pr-3 text-gray-400 border-l-2 border-gray-200 inset-y-2 hover:text-gray-600">
                                    <svg class="w-5 h-5 icon-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    
                                    <svg class="hidden w-5 h-5 icon-eye-slash" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.99 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L12 12" />
                                    </svg>
                                </button>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative mb-5 font-poppins">
                            <x-text-input id="password_confirmation" class="block w-full px-4 py-[14px] mt-1 text-xs border border-gray-500 shadow-sm rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#6AA6FF]"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password" />

                                            <button type="button" data-toggle-password data-target-input="#password_confirmation" class="absolute right-0 flex items-center pl-2 pr-3 text-gray-400 border-l-2 border-gray-200 inset-y-2 hover:text-gray-600">
                                                <svg class="w-5 h-5 icon-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                
                                                <svg class="hidden w-5 h-5 icon-eye-slash" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.99 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L12 12" />
                                                </svg>
                                            </button>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-center mb-5 transition-transform duration-200 font-poppins hover:hover:scale-105">
                            <x-primary-button class="flex justify-center px-12 py-[16px] text-xs font-medium text-white bg-[#163769] border border-transparent shadow-sm rounded-2xl hover:bg-[#132C51] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                {{ __('Create account') }}
                            </x-primary-button>
                        </div>
                        
                        <!-- Pemisah "Or Sign Up with" -->
                        <div class="flex items-center my-4">
                            <div class="flex-grow border-t border-gray-300"></div>
                            <span class="mx-4 text-xs text-gray-500 font-poppins">Or Sign Up with</span>
                            <div class="flex-grow border-t border-gray-300"></div>
                        </div>

                        <!-- Social Logins -->
                        <div class="flex justify-center space-x-4">
                            <!-- Google -->
                            <img class="w-6 h-6 mt-[6px] transition-transform duration-200 hover:hover:scale-110" src="{{ Vite::asset('resources/images/google-color.svg') }}" alt="Google Icon">

                            <!-- Apple -->
                            <img class="w-8 h-8 transition-transform duration-200 hover:hover:scale-110" src="{{ Vite::asset('resources/images/apple-logo.svg') }}" alt="Apple Icon">
                        </div>

                        <!-- Link ke Halaman Login -->
                        <div class="mt-4 text-center font-poppins">
                            <span class="text-sm text-gray-600">Already have an account?</span>
                            {{-- Menggunakan link "Already registered?" yang ada dari kode Anda, tetapi mengubah teksnya --}}
                            <a class="text-sm font-semibold text-[#6AA6FF] hover:underline" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>               
    </body>
</html>
