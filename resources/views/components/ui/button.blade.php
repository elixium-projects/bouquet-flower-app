@props([
    'buttonType' => 'primary',
    'type' => 'button',
    'label' => '',
])

@php
    $buttonColor = '';
    switch ($buttonType) {
        case 'secondary':
            $buttonColor = 'bg-transparent text-primary-400';
            break;
        default:
            $buttonColor = 'bg-primary-500 text-white';
    }
@endphp


<button
    {{ $attributes->merge([
        'class' => 'px-6 py-3 rounded-full ' . $buttonColor,
    ]) }}>{{ $label }}</button>
