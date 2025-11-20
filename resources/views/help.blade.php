@extends('layouts.setting')

@section('content')
    <div class="flex flex-col justify-center h-full font-poppins">

        <div class="pt-20 mb-10">
            <p class="text-sm font-medium text-gray-500 ">We Are Here To Help You</p>
            <h1 class="text-4xl leading-tight text-gray-900">
                <span class="font-extrabold">Discuss</span> Your <br> Chemical Solution <br> Needs
            </h1>
        </div>

        <div class="p-12 bg-[#F2F6FF] shadow-xl rounded-2xl">
            <form action="/submit-help" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-1 text-sm font-semibold text-gray-600">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-3 transition duration-150 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Your Full Name">
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-1 text-sm font-semibold text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 transition duration-150 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Your Email Address">
                </div>

                <div class="mb-8">
                    <label for="problem" class="block mb-1 text-sm font-semibold text-gray-600">Problem</label>
                    <textarea id="problem" name="problem" rows="4"
                        class="w-full px-4 py-3 transition duration-150 border border-gray-300 rounded-lg resize-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Text here"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-8 py-3 font-semibold text-white transition duration-200 hover:hover:scale-110 bg-[#163769] shadow-lg rounded-xl hover:bg-[#132C51]">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
