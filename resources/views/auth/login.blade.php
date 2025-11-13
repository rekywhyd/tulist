<x-guest-layout>

    <!-- Judul Form -->
    <div class="mb-8 text-left">
        <!-- FONT BARU DITERAPKAN DI SINI -->
        <h1 class="text-3xl font-bold text-gray-900 font-poppins">Welcome Back</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Welcome Back! Please enter your details</p>
    </div>

    <!-- Session Status (Penting, jangan dihapus) -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <!-- 
              Label dihapus dan 'placeholder' ditambahkan ke input 
              untuk meniru desain di gambar.
            -->
            <x-text-input id="email" class="block w-full px-4 py-3 mt-1 border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!-- 
              Kita bungkus dengan 'relative' untuk menempatkan ikon mata.
              'pr-10' memberi ruang di dalam input untuk ikon.
            -->
            <div class="relative">
                <x-text-input id="password" class="block w-full px-4 py-3 pr-10 mt-1 border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                type="password"
                                name="password"
                                required autocomplete="current-password" 
                                placeholder="Password" />
                
                <!-- Ikon Mata (Placeholder) -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-blue-600 border-gray-300 rounded shadow-sm focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700" name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 rounded-md hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <!-- Tombol Login (Dibuat full-width dan rounded-full) -->
        <div class="mt-6">
            <x-primary-button class="justify-center w-full py-3 text-sm font-semibold rounded-full" style="background-color: #1E40AF; /* Dark Blue */">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Separator "Or Login with" -->
    <div class="flex items-center justify-center mt-6">
        <span class="w-full h-px bg-gray-200 dark:bg-gray-700"></span>
        <span class="mx-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">Or Login with</span>
        <span class="w-full h-px bg-gray-200 dark:bg-gray-700"></span>
    </div>

    <!-- Tombol Social Login -->
    <div class="flex justify-center gap-4 mt-6">
        <!-- Tombol Google -->
        <button class="flex items-center justify-center w-12 h-12 border border-gray-300 rounded-full dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
            <svg class="w-5 h-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"></path><path fill="#FF3D00" d="m6.306 14.691 6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"></M4,12H12V20H4z"></path><path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"></path><path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303c-.792 2.237-2.231 4.166-4.087 5.571l.003-.002 6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"></path></svg>
        </button>
        <!-- Tombol Apple -->
        <button class="flex items-center justify-center w-12 h-12 border border-gray-300 rounded-full dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
            <svg class="w-5 h-5 dark:fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.01,16.23c-1.2,0-2.31-0.4-3.23-1.21c-1.03-0.91-1.6-2.1-1.59-3.43c0-2.36,1.7-3.91,3.95-3.91 c0.54,0,1.19,0.13,1.86,0.38C13.63,7.91,14.4,7.4,15.35,7.4c0.1,0,0.19,0,0.29,0.01c-0.19-0.2-0.39-0.38-0.6-0.55 c-1.05-0.86-2.26-1.3-3.6-1.3c-2.09,0-3.91,0.97-5.12,2.56c-1.07,1.4-1.63,3.06-1.63,4.91c0,2.83,1.5,5.18,3.92,6.48 c0.94,0.51,2,0.78,3.13,0.78c0.75,0,1.46-0.16,2.11-0.45c1.23-0.55,2.13-1.46,2.56-2.61c-0.01,0-0.02,0-0.03,0 C14.93,16.23,13.51,16.23,12.01,16.23z M15.75,5.16c0.86-1.04,1.49-2.42,1.69-3.98c-1.11,0.05-2.25,0.51-3.11,1.38 c-0.75,0.75-1.33,1.89-1.5,3.15C13.75,5.68,14.83,5.99,15.75,5.16z"></path></svg>
        </button>
    </div>

    <!-- Link ke Sign Up (Register) -->
    <p class="mt-8 text-sm text-center text-gray-600 dark:text-gray-400">
        Don't have an account? 
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                Sign Up
            </a>
        @endif
    </p>

</x-guest-layout>