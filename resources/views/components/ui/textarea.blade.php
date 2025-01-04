@props(['validate' => false])

@php
    $isErrorValidation = $validate ? 'border border-danger-500' : '';
@endphp

<textarea
    {{ $attributes->merge(['class' => 'py-4 px-3 border rounded-lg w-full border-surface-700 text-second h-52 ' . $isErrorValidation]) }}>
</textarea>
