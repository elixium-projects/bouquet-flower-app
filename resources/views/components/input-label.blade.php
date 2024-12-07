@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-gray-700 text-second']) }}>
    {{ $value ?? $slot }}
</label>
