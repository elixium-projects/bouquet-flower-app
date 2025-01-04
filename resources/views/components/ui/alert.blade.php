@props(['type' => 'sucess'])

@php
    switch ($type) {
        case 'error':
            $themeClass = 'bg-danger-500 text-white';
            break;

        default:
            $themeClass = 'bg-primary-500 text-white';
    }
@endphp

<div
    class="{{ 'fixed px-6 py-4 rounded-lg z-[999] left-1/2 top-10 shadow-md text-lg -translate-x-1/2 ' . $themeClass }}">
    {{ $slot }}
</div>
