<section>
    <header>
        <h2 class="text-xl font-bold text-black">
            {{ __('Update Password') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-4">
        @csrf
        @method('put')

        <div class="flex items-start gap-x-6">
    <div class="w-1/2">
        <x-input-label class="block text-sm font-medium text-gray-600" for="update_password_current_password"
            :value="__('Current Password')" />
        <x-text-input id="update_password_current_password" name="current_password" type="password"
            class="block py-2 mb-10 px-4 mt-1 text-black bg-[#F2F6FF] border border-gray-400 w-full rounded-lg"
            autocomplete="current-password" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div class="w-1/2">
        <x-input-label class="block text-sm font-medium text-gray-600" for="update_password_password"
            :value="__('New Password')" />
        <x-text-input id="update_password_password" name="password" type="password"
            class="block py-2 mb-10 px-4 mt-1 text-black bg-[#F2F6FF] border border-gray-400 w-full rounded-lg"
            autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>
</div>

        <div>
            <x-input-label class="block text-sm font-medium text-gray-600" for="update_password_password_confirmation"
                :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="block py-2 px-4 mt-1 mb-10 text-black bg-[#F2F6FF] border border-gray-400 w-full rounded-lg"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end gap-6 pt-4">
            <button type="submit"
                class="inline-flex items-center px-6 py-1 text-base font-bold text-black transition duration-150 ease-in-out bg-[#C1D3EF] shadow-sm font-poppins rounded-3xl hover:bg-[#7b99ca] focus:outline-none focus:border-[#7b99ca] focus:ring focus:ring-[#7b99ca]">
                {{ __('Save') }}
            </button>

            <button type="button" id="cancel-password-btn"
                class="inline-flex items-center px-4 py-1 text-base font-bold text-black transition duration-150 ease-in-out bg-gray-300 font-poppins rounded-3xl hover:bg-gray-400 focus:outline-none focus:border-gray-400 focus:ring focus:ring-gray-400">
                {{ __('Cancel') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
