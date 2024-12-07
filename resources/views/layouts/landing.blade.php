<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'No title')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="min-h-screen">

        <header>
            <x-ui.navigation :menus="[
                [
                    'label' => 'beranda',
                    'link' => '#',
                ],
                [
                    'label' => 'produk',
                    'link' => '#',
                ],
                [
                    'label' => 'tentang kami',
                    'link' => '#',
                ],
                [
                    'label' => 'galeri',
                    'link' => '#',
                ],
                [
                    'label' => 'hubungi kami',
                    'link' => '#',
                ],
            ]">
                <x-slot:additionalNav>
                    <div class="space-x-8">
                        <x-ui.link label="Daftar" />
                        <x-ui.link label="Masuk" type="primary" href="/login" />
                    </div>
                </x-slot:additionalNav>
            </x-ui.navigation>
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
