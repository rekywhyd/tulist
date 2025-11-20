@extends('layouts.dashboard')

@section('content')
    <div class="px-12 mx-auto mt-20 max-w-7xl">

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
                @if (Route::has('login'))
                    <div class="flex items-center mt-4 ml-24 text-lg">
                        @auth
                            {{-- Tautan Home (Jika sudah login) --}}
                            <a href="{{ url('/home') }}"
                                class="px-9 py-2 text-[#132C51] font-bold hover:scale-110 transition-all duration-200 rounded-full border border-opacity-40 border-[#acc5ea] bg-gradient-to-r from-[#EAF0FA] to-[#D3E4FF]">
                                Started Now
                            </a>
                        @else
                            {{-- Tautan Login (Jika belum login) --}}
                            <a href="{{ route('login') }}"
                                class="px-9 py-2 text-[#132C51] font-bold hover:scale-110 transition-all duration-200 rounded-full border border-opacity-40 border-[#acc5ea] bg-gradient-to-r from-[#EAF0FA] to-[#D3E4FF]">
                                Started Now
                            </a>
                        @endauth
                    </div>
                @endif
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
                <div
                    class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                    <div class="px-16 pb-12 ml-4">
                        <h3 class="mb-6 text-5xl font-bold">Organize Jobdesk</h3>
                        <p class="text-2xl text-white">Simpan dan kelola setiap tanggung jawab kantor secara sistematis agar
                            mudah diakses dan tidak ada yang terlewat.</p>
                    </div>
                    <div class="w-[700px] py-4">
                        <img src="{{ Vite::asset('resources/images/organize.png') }}" alt="Organize Jobdesk">
                    </div>
                </div>
                <!-- feature 1 -->


                <!-- feature 2 -->
                <div
                    class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                    <div class="order-last px-16 ml-4 mr-8 text-right pb-14">
                        <h3 class="mb-6 text-5xl font-bold">Smart Scheduling</h3>
                        <p class="text-2xl text-white">Atur jadwal harian dan meeting dengan efisien, sehingga setiap jam
                            kerja lebih produktif.</p>
                    </div>
                    <div class="w-[600px] pl-16 pt-8">
                        <img src="{{ Vite::asset('resources/images/smart.png') }}" alt="Smart Scheduling">
                    </div>
                </div>
                <!-- feature 2 -->


                <!-- feature 3 -->
                <div
                    class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                    <div class="px-16 ml-4 pb-14">
                        <h3 class="mb-6 text-5xl font-bold">Deadline Tracking</h3>
                        <p class="text-2xl text-white">Dapatkan pengingat otomatis untuk setiap deadline, memastikan semua
                            tugas selesai tepat waktu.</p>
                    </div>
                    <div class="w-[600px] py-0 pr-12">
                        <img src="{{ Vite::asset('resources/images/deadline.png') }}" alt="Deadline Tracking">
                    </div>
                </div>
                <!-- feature 3 -->


                <!-- feature 4 -->
                <div
                    class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16">
                    <div class="order-last px-16 ml-4 mr-8 text-right pb-14">
                        <h3 class="mb-6 text-5xl font-bold">Time Management</h3>
                        <p class="text-2xl text-white">Kelola waktu secara efektif untuk menyelesaikan pekerjaan lebih cepat
                            dan tepat sasaran.</p>
                    </div>
                    <div class="w-[600px] pl-16 pt-10 pb-8">
                        <img src="{{ Vite::asset('resources/images/time.png') }}" alt="Time Management">
                    </div>
                </div>
                <!-- feature 4 -->


                <!-- feature 5 -->
                <div
                    class="flex items-center w-[1050px] justify-between py-2 text-[#D5E2F5] bg-[#132C51] rounded-3xl mb-16 pt-8">
                    <div class="pl-16 ml-0 pb-14">
                        <h3 class="mb-6 text-5xl font-bold ">Progress Overview</h3>
                        <p class="text-2xl text-white">Lihat perkembangan seluruh pekerjaan secara real-time sehingga Anda
                            selalu terkendali.</p>
                    </div>
                    <div class="w-[500px] py-0">
                        <img src="{{ Vite::asset('resources/images/progress.png') }}" alt="Progress Overview">
                    </div>
                </div>
                <!-- feature 5 -->

            </div>
        </section>
    </div>
@endsection
