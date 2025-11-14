<x-guest-layout>

    <!-- Judul Form -->
    <div class="flex flex-col items-center font-serif">
        <h1 class="my-2 text-4xl font-bold text-gray-900">Welcome Back</h1>
        <p class="mb-6 text-xs font-semibold text-gray-500">Welcome Back! Please enter your details</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-5 font-poppins">
            <x-text-input id="email" class="block w-full px-4 py-3 mt-1 text-xs border border-gray-500 shadow-sm rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#6AA6FF]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative mb-3 font-poppins">
            <x-text-input id="password" class="block w-full px-4 py-3 pr-10 mt-1 text-xs border border-gray-500 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6AA6FF]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="Password" />
            
                <button type="button" data-toggle-password data-target-input="#password" class="absolute right-0 flex items-center pl-2 pr-3 text-gray-400 border-l-2 border-gray-200 inset-y-2 hover:text-gray-600">
                    <svg class="w-5 h-5 transition-transform duration-200 icon-eye hover:hover:scale-110" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a.75.75 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                    </svg>

                    <svg class="hidden w-5 h-5 transition-transform duration-200 icon-eye-slash hover:hover:scale-110" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">                 
                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a.75.75 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                        
                        <path fill-rule="evenodd" d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18z" clip-rule="evenodd" />
                    </svg>
                </button>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-black border-gray-500 transition-transform ml-4 duration-200 hover:hover:scale-110 rounded shadow-sm focus:ring-[#6AA6FF]" name="remember">
                <span class="pl-2 text-sm text-black font-poppins ms-2">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="pt-1 text-xs text-[#6AA6FF] rounded-md transition-transform duration-200 hover:hover:scale-105" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <!-- Tombol Login -->
        <div class="flex justify-center mt-4 mb-5 transition-transform duration-200 font-poppins hover:hover:scale-105">
            <x-primary-button class="flex justify-center px-[100px] py-[16px] text-xs font-medium text-white bg-[#163769] border border-transparent shadow-sm rounded-2xl hover:bg-[#132C51] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Pemisah "Or Sign Up with" -->
    <div class="flex items-center my-4">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-4 text-xs text-gray-500 font-poppins">Or Login with</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>

    <!-- Tombol Social Login -->
    <div class="flex justify-center gap-4 mt-6">
        <!-- Tombol Google -->
        <img class="w-6 h-6 mt-[6px] transition-transform duration-200 hover:hover:scale-110" src="{{ Vite::asset('resources/images/google-color.svg') }}" alt="Google Icon">
        
        <!-- Tombol Apple -->
        <img class="w-8 h-8 transition-transform duration-200 hover:hover:scale-110" src="{{ Vite::asset('resources/images/apple-logo.svg') }}" alt="Apple Icon">
    </div>

    <!-- Link ke Halaman Sign Up (Register) -->
    <div class="mt-4 text-center font-poppins">
        <span class="text-sm text-black">Don't have an account?</span>
        <a class="text-sm font-semibold text-[#6AA6FF] hover:underline" href="{{ route('register') }}">
            {{ __('Sign Up') }}
        </a>
    </div>

</x-guest-layout>