<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('scripts.script')
</head>

<body class="antialiased">

    @session('message')
        <x-ui.alert>{{ session('message') }}</x-ui.alert>
    @endsession

    @if ($errors->has('category_name'))
        <x-ui.alert type="error">{{ $errors->first('category_name') }}</x-ui.alert>
    @endif

    @session('error')
        <x-ui.alert type="error">{{ session('error') }}</x-ui.alert>
    @endsession

    <div class="min-h-screen grid grid-cols-[280px_1fr]">
        {{-- aside --}}
        <x-fragments.sidebar-dashboard />


        <!-- Page Content -->
        <main>
            <x-fragments.header-dashboard />

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>

</html>
