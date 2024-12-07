@props(['value', 'isRequired' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-base text-gray-700']) }}>
    {{ $value ?? $slot }}
    @if ($isRequired)
        <span class="text-danger-500">*</span>
    @endif
</label>
