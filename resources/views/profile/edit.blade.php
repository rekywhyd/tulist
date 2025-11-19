@extends('layouts.setting')

@section('content')
<div class="space-y-6">
    {{-- A. Profile Header Section (Avatar, Name, Edit Button) --}}
    <div class="flex items-center justify-between pt-10">
        {{-- Avatar and Name --}}
        <div class="flex items-center space-x-4">
            {{-- Placeholder for User Avatar (Need to be implemented inside partials or here) --}}
            {{-- For now, we'll use a placeholder structure similar to the image --}}
            <div class="text-center">
                {{-- User Avatar (Dummy for display) --}}
                {{-- Replace with actual image/livewire component for photo upload --}}
                <img src="https://i.ibb.co/L8y2p2r/aaa.png" alt="Profile Avatar" class="w-24 h-24 mx-auto rounded-full" id="user-avatar-display">
                <p class="text-3xl font-bold">{{ Auth::user()->name }}</p>
                <p class="text-xl text-gray-500">bbb</p> {{-- Placeholder for a second line of text --}}
            </div>
        </div>

        {{-- Edit Button (Used to toggle Edit mode) --}}
        <button id="edit-profile-btn" class="flex items-center gap-2 text-xl font-medium text-gray-600 hover:text-gray-900">
            Edit
            {{-- Edit Icon SVG (Pencil) --}}
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 6.5L17.5 10.5M4 20H8L18.5 9.5L14.5 5.5L4 16V20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <hr class="my-4">

    {{-- B. Profile Content Area (Combined Forms) --}}
    <div id="profile-view-mode" class="space-y-8">
        {{-- 1. Profile Information Display (View Mode - Image 1) --}}
        <div class="space-y-4">
            <h3 class="text-2xl font-bold text-gray-900">Profile Information</h3>

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <div class="p-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md">{{ Auth::user()->name }}</div>
            </div>

            {{-- Email Address --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="p-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md">{{ Auth::user()->email }}</div>
            </div>

            {{-- Password (Hidden/Eye Icon not implemented in this simple structure) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <div class="p-2 mt-1 text-gray-900 bg-white border border-gray-300 rounded-md">********</div>
            </div>
        </div>
    </div>

    {{-- C. Combined Edit Form Area (Hidden by default, shown when 'Edit' is clicked - Image 2) --}}
    <div id="profile-edit-mode" class="hidden space-y-8">
        {{-- Update Profile Information Form --}}
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form-custom')
            </div>
        </div>

        {{-- Update Password Form --}}
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Save/Cancel Buttons --}}
        <div class="flex justify-end space-x-4">
            <button id="cancel-edit-btn" type="button" class="px-6 py-2 text-lg font-bold text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                Cancel
            </button>
            {{-- Note: Actual Save will be handled by form submissions inside the included partials --}}
            {{-- I will add a dummy save button for visual consistency, but the actual partials already have 'Save' buttons. --}}
        </div>
    </div>

    {{-- D. Delete Account Section (Always visible) --}}
    <div class="flex justify-end p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editBtn = document.getElementById('edit-profile-btn');
        const cancelBtn = document.getElementById('cancel-edit-btn');
        const viewMode = document.getElementById('profile-view-mode');
        const editMode = document.getElementById('profile-edit-mode');
        const deleteBtnContainer = document.querySelector('#profile-edit-mode + .flex.justify-end');

        // Initial state: Display view mode, hide edit mode
        viewMode.classList.remove('hidden');
        editMode.classList.add('hidden');

        // Toggle visibility
        function toggleEditMode(isEditing) {
            if (isEditing) {
                viewMode.classList.add('hidden');
                editMode.classList.remove('hidden');
                editBtn.classList.add('hidden'); // Hide the main Edit button
            } else {
                viewMode.classList.remove('hidden');
                editMode.classList.add('hidden');
                editBtn.classList.remove('hidden'); // Show the main Edit button
            }
        }

        editBtn.addEventListener('click', () => toggleEditMode(true));
        cancelBtn.addEventListener('click', () => toggleEditMode(false));

        // Note: The original Blade partials already contain "Save" buttons that trigger form submission.
        // The Cancel button here is mainly for visual/UX to switch back to view mode without saving.
    });
</script>
@endsection