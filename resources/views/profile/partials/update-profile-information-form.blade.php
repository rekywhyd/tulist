<section>
    <header>
        <h2 class="text-xl font-bold text-black">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4 space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label class="block text-sm font-medium text-gray-600" for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text"
                class="block py-2 px-4 mt-1 text-black mb-10 bg-[#F2F6FF] border border-gray-400 w-full rounded-lg"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label class="block text-sm font-medium text-gray-600" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email"
                class="block py-2 px-4 mt-1 mb-10 text-black bg-[#F2F6FF] border border-gray-400 w-full rounded-lg"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center justify-end gap-6 pt-4">
            <button type="submit"
                class="inline-flex items-center px-6 py-1 text-base font-bold text-black transition duration-150 ease-in-out bg-[#C1D3EF] shadow-sm font-poppins rounded-3xl hover:bg-[#7b99ca] focus:outline-none focus:border-[#7b99ca] focus:ring focus:ring-[#7b99ca]">
                {{ __('Save') }}
            </button>

            <button type="button" id="cancel-edit-btn"
                class="inline-flex items-center px-4 py-1 text-base font-bold text-black transition duration-150 ease-in-out bg-gray-300 font-poppins rounded-3xl hover:bg-gray-400 focus:outline-none focus:border-gray-400 focus:ring focus:ring-gray-400">
                {{ __('Cancel') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
