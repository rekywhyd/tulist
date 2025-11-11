<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tulist</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])    
    </head>
    
    <body class="bg-[radial-gradient(#FFFFFF_18%,_#EAF0FA_44%)]">
        
        <header class="fixed w-full mx-auto top-4">
            <nav class="container flex items-center justify-between px-10 py-1 mx-auto border rounded-full backdrop-blur-lg border-white/50">
                    <div class="items-center">
                        <img src="{{ Vite::asset('resources/images/logo-navbar.png') }}" alt="Logo">
                    </div>
                    
                    <div class="\text-sm text-gray-600 gap-9">
                        <a href="#" class="hover:text-black">About</a>
                        <a href="#" class="hover:text-black">Contact Us</a>
                    </div>

                    <div>
                        @if (Route::has('login'))
                            <div class="flex items-center gap-3">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="px-6 py-2 text-sm font-medium text-black bg-white border border-black rounded-full hover:bg-gray-100"
                                    >
                                        Login
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700"
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

        
        <main class="container max-w-6xl p-6 mx-auto mt-12">
            
            <section class="flex flex-col items-center gap-12 lg:flex-row">
                <div class="text-center lg:w-1/2 lg:text-left">
                    <h1 class="text-5xl font-bold leading-tight text-gray-900 md:text-6xl dark:text-white">
                        Kerja,<br>
                        Tuntaskan
                    </h1>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                        Kelola semua tugas kerja dengan lebih tertata. Mudah, efisien, dan
                        selesaikan pekerjaan penting dengan terfokus.
                    </p>
                </div>
                <div class="lg:w-1/2">
                    <img src="{{ Vite::asset('resources/images/hero-section.png') }}" alt="Hero Section" class="object-cover w-full rounded-lg h-96">
                </div>
            </section>

            <section class="mt-24 mb-12">
                <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white">
                    Features
                </h2>

                <div class="flex flex-col items-center gap-6 mt-12">
                    
                    <div class="flex flex-col items-center w-full max-w-5xl gap-8 p-8 text-white bg-slate-800 rounded-xl md:flex-row">
                        <div class="md:w-1/2">
                            <h3 class="mb-2 text-2xl font-bold">Organize Jobdesk</h3>
                            <p class="text-slate-300">Simpan dan kelola setiap tanggung jawab harian atau proyek besar agar mudah diakses dan tidak ada yang terlewat.</p>
                        </div>
                        <div class="w-full md:w-1/2">
                            <img src="{{ Vite::asset('resources/images/organize.png') }}" alt="Organize Jobdesk" class="object-cover w-full h-40 rounded-lg">
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full max-w-5xl gap-8 p-8 text-white bg-slate-800 rounded-xl md:flex-row">
                        <div class="w-full md:w-1/2 md:order-last">
                            <h3 class="mb-2 text-2xl font-bold">Smart Scheduling</h3>
                            <p class="text-slate-300">Atur jadwal harian dan mingguan secara efisien, sehingga setiap jam kerja lebih produktif.</p>
                        </div>
                        <div class="w-full md:w-1/2 md:order-first">
                            <img src="{{ Vite::asset('resources/images/smart.png') }}" alt="Smart Scheduling" class="object-cover w-full h-40 rounded-lg">
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full max-w-5xl gap-8 p-8 text-white bg-slate-800 rounded-xl md:flex-row">
                        <div class="md:w-1/2">
                            <h3 class="mb-2 text-2xl font-bold">Deadline Tracking</h3>
                            <p class="text-slate-300">Dapatkan pengingat otomatis untuk setiap deadline, memastikan semua tugas selesai tepat waktu.</p>
                        </div>
                        <div class="w-full md:w-1/2">
                            <img src="{{ Vite::asset('resources/images/deadline.png') }}" alt="Deadline Tracking" class="object-cover w-full h-40 rounded-lg">
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full max-w-5xl gap-8 p-8 text-white bg-slate-800 rounded-xl md:flex-row">
                        <div class="w-full md:w-1/2 md:order-last">
                            <h3 class="mb-2 text-2xl font-bold">Time Management</h3>
                            <p class="text-slate-300">Kelola waktu secara efektif untuk menyelesaikan pekerjaan lebih cepat dan tepat sasaran.</p>
                        </div>
                        <div class="w-full md:w-1/2 md:order-first">
                            <img src="{{ Vite::asset('resources/images/time.png') }}" alt="Time Management" class="object-cover w-full h-40 rounded-lg">
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full max-w-5xl gap-8 p-8 text-white bg-slate-800 rounded-xl md:flex-row">
                        <div class="md:w-1/2">
                            <h3 class="mb-2 text-2xl font-bold">Progress Overview</h3>
                            <p class="text-slate-300">Lihat perkembangan seluruh pekerjaan secara real-time sehingga Anda selalu terkendali.</p>
                        </div>
                        <div class="w-full md:w-1/2">
                            <img src="{{ Vite::asset('resources/images/progress.png') }}" alt="Progress Overview" class="object-cover w-full h-40 rounded-lg">
                        </div>
                    </div>

                </div>
            </section>
        </main>
        </body>
</html>