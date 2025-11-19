<button {{ $attributes->merge(['type' => 'submit', 'class' => 'tracking-widest']) }}>
    {{ $slot }}
</button>
