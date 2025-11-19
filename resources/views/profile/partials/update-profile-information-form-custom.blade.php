<section>
    <header>
        <h2 class="text-xl font-bold text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, email address, and profile photo.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Form for updating profile information, including photo. Note the enctype for file upload. --}}
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Profile Photo Upload Section --}}
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />

            <div class="flex items-center mt-2 space-x-4">
                {{-- Current Photo --}}
                <img src="https://i.ibb.co/L8y2p2r/aaa.png" alt="Current Profile" class="w-20 h-20 rounded-full" id="current-photo-preview">
                
                {{-- File Input --}}
                <input type="file" name="profile_photo" id="profile_photo" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        {{-- Name Input --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email Input --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            
            {{-- Email verification logic (optional, keep if needed) --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    {{-- ... verification code ... --}}
                </div>
            @endif
        </div>

        {{-- Save Button for Profile Information --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>