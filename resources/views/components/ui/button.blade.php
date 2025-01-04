@props([
    'buttonType' => 'primary',
    'type' => 'button',
    'label' => '',
])

@php
    $buttonColor = '';
    switch ($buttonType) {
        case 'info':
            $buttonColor = 'bg-info-500 text-white';
            break;
        case 'warning':
            $buttonColor = 'bg-warning-500 text-white';
            break;
        case 'danger':
            $buttonColor = 'bg-danger-500 text-white';
            break;
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
