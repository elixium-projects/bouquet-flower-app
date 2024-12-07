@props(['label', 'type' => 'default'])

@php
    $class = '';
    switch ($type) {
        case 'primary':
            $class = 'px-6 py-3 text-white rounded-full bg-primary-500';
            break;
        default:
            $class = 'text-primary-400';
    }
@endphp

<a {{ $attributes->merge(['class' => 'cursor-pointer ' . $class]) }}>{{ $label }}</a>
