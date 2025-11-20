@extends('layouts.setting')

@section('content')
    {{-- Edit Button (Used to toggle Edit mode) --}}
    <div class="flex justify-end">
        <button id="edit-profile-btn"
            class="mt-32 mr-6 font-bold items-center gap-2 px-3 border border-gray-300 text-xl text-black flex bg-[#F2F6FF] rounded-full transition-transform duration-200 hover:hover:scale-110">
            Edit
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 6.5L17.5 10.5M4 20H8L18.5 9.5L14.5 5.5L4 16V20Z" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>


    <div class="px-12 space-y-6 font-poppins">
        <div class="flex items-center justify-between pt-10">
            {{-- Avatar and Name --}}
            <div class="flex items-center gap-16 mb-8">
                <svg class="w-44 h-44 transition-all text-black hover:text-[#0E213D] duration-200 hover:hover:scale-110"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>

                <p class="text-4xl font-bold">{{ Auth::user()->name }}</p>
            </div>
        </div>

        <div id="profile-view-mode" class="space-y-8">
            {{-- Profile Information Display --}}
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-black">Profile Information</h3>

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600">Name</label>
                    <div class="py-2 px-4 mt-1 mb-10 text-black bg-[#F2F6FF] border border-gray-400 w-full rounded-lg">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                {{-- Email Address --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email Address</label>
                    <div class="py-2 px-4 mt-1 mb-16 text-black bg-[#F2F6FF] border border-gray-400 w-full rounded-lg">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                {{-- Change Password --}}
                <button id="edit-password-btn"
                    class="flex items-center gap-2 px-4 py-1 text-xl font-bold text-black transition-transform duration-200 bg-gray-400 rounded-lg hover:hover:scale-110">
                    Change Password
                </button>
            </div>
        </div>

        {{-- Combined Edit Form Area (Hidden by default, shown when 'Edit' is clicked --}}
        <div id="profile-edit-mode" class="hidden space-y-8">

            {{-- Update Profile Form --}}
            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

        </div>

        {{-- Combined Change Password Form Area (Hidden by default, shown when 'Change Password' is clicked --}}
        <div id="password-edit-mode" class="hidden space-y-8">

            {{-- Update Password Form --}}
            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>


        </div>
        <div class="pb-10"></div>
        {{-- Delete Account Section (Always visible) --}}
        <div id="delete-account-section" class="flex justify-end">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- 1. Ambil Semua Elemen yang Dibutuhkan ---

            // Elemen Utama (Toggle Profile Info vs Form)
            const editProfileBtn = document.getElementById('edit-profile-btn');
            const viewMode = document.getElementById('profile-view-mode');
            const editProfileMode = document.getElementById('profile-edit-mode');
            const cancelProfileBtn = document.getElementById(
                'cancel-edit-btn'); // tombol cancel
            const deleteAccountSection = document.getElementById(
                'delete-account-section');

            // Elemen Password (View Mode vs Edit Form)
            const editPasswordBtn = document.getElementById('edit-password-btn'); // Tombol Edit di dalam view mode
            const editPasswordMode = document.getElementById('password-edit-mode'); // Div Form Edit Password
            const cancelPasswordBtn = document.getElementById(
                'cancel-password-btn'); // Tombol Cancel


            // --- 2. Tentukan State Awal ---
            if (viewMode) viewMode.classList.remove('hidden');
            if (editProfileMode) editProfileMode.classList.add('hidden');
            if (editPasswordMode) editPasswordMode.classList.add('hidden');
            if (editProfileBtn) editProfileBtn.classList.remove('hidden');


            // --- 3. Fungsi Toggle Profile Info ---

            function toggleProfileEditMode(isEditing) {
                if (isEditing) {
                    viewMode.classList.add('hidden');
                    editProfileMode.classList.remove('hidden');
                    editProfileBtn.classList.add('hidden');

                    // Sembunyikan Delete Account
                    if (deleteAccountSection) deleteAccountSection.classList.add('hidden');
                } else {
                    viewMode.classList.remove('hidden');
                    editProfileMode.classList.add('hidden');
                    editProfileBtn.classList.remove('hidden');

                    // Tampilkan Delete Account
                    if (deleteAccountSection) deleteAccountSection.classList.remove('hidden');
                }
            }

            // Listener untuk Tombol Edit dan Cancel Profile Info
            if (editProfileBtn) editProfileBtn.addEventListener('click', () => toggleProfileEditMode(true));
            if (cancelProfileBtn) cancelProfileBtn.addEventListener('click', () => toggleProfileEditMode(false));


            // --- 4. Fungsi Toggle Password ---

            function togglePasswordEditMode(isEditing) {
                if (isEditing) {
                    viewMode.classList.add('hidden');
                    editPasswordMode.classList.remove('hidden');
                    editProfileBtn.classList.add('hidden');

                    // Sembunyikan Delete Account
                    if (deleteAccountSection) deleteAccountSection.classList.add('hidden');
                } else {
                    viewMode.classList.remove('hidden');
                    editPasswordMode.classList.add('hidden');
                    editProfileBtn.classList.remove('hidden');

                    // Tampilkan Delete Account
                    if (deleteAccountSection) deleteAccountSection.classList.remove('hidden');
                }
            }

            // Listener untuk Tombol Edit dan Cancel Password
            if (editPasswordBtn) editPasswordBtn.addEventListener('click', () => togglePasswordEditMode(true));
            if (cancelPasswordBtn) cancelPasswordBtn.addEventListener('click', () => togglePasswordEditMode(false));
        });
    </script>
@endsection
