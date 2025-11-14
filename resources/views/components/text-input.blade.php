@props(['disabled' => false])

@php
// Cek apakah ada error untuk input ini
$hasError = $errors->has($attributes->get('name'));
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border shadow-sm rounded-2xl focus:outline-none ' .

               // --- Logika IF-ELSE untuk style ---
               ($hasError
                // --- KELAS JIKA ADA ERROR ---
                ? 'border-red-600 text-red-600 placeholder:text-red-600 focus:ring-2 focus:ring-red-600'
                
                // --- KELAS JIKA NORMAL (style asli) ---
                : 'border-gray-500 focus:ring-2 focus:ring-[#6AA6FF]')
]) !!}>