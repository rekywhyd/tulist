<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tulist</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])    
    </head>
    
    <body class="bg-[radial-gradient(#FFFFFF_18%,_#EAF0FA_44%)] mt-14">
        
        <header class="sticky top-0 w-3/4 mx-auto">
            <nav class="container flex items-center justify-between py-0 mx-auto border rounded-full px-9 font-poppins backdrop-blur-lg bg-white/50 border-white/70">
                    <a href="{{ url('/') }}" class="w-[170px]">
                        <img src="{{ Vite::asset('resources/images/logo-navbar.png') }}" alt="Logo">
                    </a>
                    
                    <div class="flex gap-12 text-xl font-medium text-black">
                        <a href="#" class="transition-transform duration-200 hover:hover:scale-110">About</a>
                        <a href="#" class="transition-transform duration-200 hover:hover:scale-110">Contact Us</a>
                    </div>

                    <div>
                        @if (Route::has('login'))
                            <div class="flex items-center gap-8 text-lg font-medium">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="px-9 py-2 text-white border bg-[#1616b0] hover:bg-[#5e5ec5] rounded-full transition-colors duration-200 ease-out"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="py-2 text-black transition-colors duration-200 ease-out bg-white border border-black rounded-full px-9 hover:bg-gray-200"
                                    >
                                        Login
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="px-8 py-2 text-white border bg-[#1616b0] hover:bg-[#5e5ec5] rounded-full transition-colors duration-200 ease-out"
                                        >
                                            Sign Up
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
            </nav>
        </header>

        
        <main class="px-12 mx-auto mt-20 max-w-7xl">
            
        <!-- hero section -->
            <section class="flex flex-row items-center justify-between w-full mx-auto">
                <div class="mb-24 ml-8 text-left">
                    <h1 class="font-serif font-bold text-gray-900 text-7xl">
                        Kerja,<br>
                        Tuntaskan
                    </h1>
                    <p class="mt-5 text-xl font-bold text-gray-600 font-poppins">
                        Kelola semua tugas kerja dengan lebih teratur. Catat, atur, dan
                        selesaikan jobdesk kantor tanpa keteteran.
                    </p>
                </div>
                <div class="w-[800px]">
                    <img src="{{ Vite::asset('resources/images/hero-section.png') }}" alt="Hero Section">
                </div>
            </section>
        <!-- hero section -->

            <section class="pt-16 mt-6">
                <h2 class="pl-16 font-serif text-5xl font-bold text-left text-gray-900">
                    Features
                </h2>

                <div class="flex flex-col items-center gap-6 mt-6 font-serif">
                    
                    <!-- feature 1 -->
                    <div class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                        <div class="px-16 pb-12 ml-4">
                            <h3 class="mb-6 text-5xl font-bold">Organize Jobdesk</h3>
                            <p class="text-2xl text-white">Simpan dan kelola setiap tanggung jawab kantor secara sistematis agar mudah diakses dan tidak ada yang terlewat.</p>
                        </div>
                        <div class="w-[700px] py-4">
                            <img src="{{ Vite::asset('resources/images/organize.png') }}" alt="Organize Jobdesk">
                        </div>
                    </div>
                    <!-- feature 1 -->


                    <!-- feature 2 -->
                    <div class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                        <div class="order-last px-16 ml-4 mr-8 text-right pb-14">
                            <h3 class="mb-6 text-5xl font-bold">Smart Scheduling</h3>
                            <p class="text-2xl text-white">Atur jadwal harian dan meeting dengan efisien, sehingga setiap jam kerja lebih produktif.</p>
                        </div>
                        <div class="w-[600px] pl-16 pt-8">
                            <img src="{{ Vite::asset('resources/images/smart.png') }}" alt="Smart Scheduling">
                        </div>
                    </div>
                    <!-- feature 2 -->


                    <!-- feature 3 -->
                    <div class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                        <div class="px-16 ml-4 pb-14">
                            <h3 class="mb-6 text-5xl font-bold">Deadline Tracking</h3>
                            <p class="text-2xl text-white">Dapatkan pengingat otomatis untuk setiap deadline, memastikan semua tugas selesai tepat waktu.</p>
                        </div>
                        <div class="w-[600px] py-0 pr-12">
                            <img src="{{ Vite::asset('resources/images/deadline.png') }}" alt="Deadline Tracking">
                        </div>
                    </div>
                    <!-- feature 3 -->


                    <!-- feature 4 -->
                    <div class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                        <div class="order-last px-16 ml-4 mr-8 text-right pb-14">
                            <h3 class="mb-6 text-5xl font-bold">Time Management</h3>
                            <p class="text-2xl text-white">Kelola waktu secara efektif untuk menyelesaikan pekerjaan lebih cepat dan tepat sasaran.</p>
                        </div>
                        <div class="w-[600px] pl-16 pt-10 pb-8">
                            <img src="{{ Vite::asset('resources/images/time.png') }}" alt="Time Management">
                        </div>
                    </div>
                    <!-- feature 4 -->


                    <!-- feature 5 -->
                    <div class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16 pt-8">
                        <div class="pl-16 ml-0 pb-14">
                            <h3 class="mb-6 text-5xl font-bold ">Progress Overview</h3>
                            <p class="text-2xl text-white">Lihat perkembangan seluruh pekerjaan secara real-time sehingga Anda selalu terkendali.</p>
                        </div>
                        <div class="w-[500px] py-0">
                            <img src="{{ Vite::asset('resources/images/progress.png') }}" alt="Progress Overview">
                        </div>
                    </div>
                    <!-- feature 5 -->

                </div>
            </section>
        </main>

        <footer>
            <div class="container max-w-6xl p-6 mx-auto mt-12 text-center text-gray-400 font-poppins">
                <p>@2025 credit</p>
            </div>
        </footer>

    </body>
</html>