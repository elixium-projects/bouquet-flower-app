@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'py-4 px-3 border rounded-lg w-full border-surface-700 text-second']) }}>