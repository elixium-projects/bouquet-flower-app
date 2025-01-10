<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />


    <title>@yield('title', 'No title')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/landingProduk.js'])
</head>

<body class=" antialiased">
    <div class="min-h-screen ">

        <header>
            <x-ui.navigation :menus="[
                [
                    'label' => 'beranda',
                    'link' => route('home'),
                ],
                [
                    'label' => 'produk',
                    'link' => route('Produk'),
                ],
                [
                    'label' => 'tentang kami',
                    'link' => route('AboutUs'),
                ],
                [
                    'label' => 'galeri',
                    'link' => route('Gallery'),
                ],
                [
                    'label' => 'hubungi kami',
                    'link' => route('ContactUs'),
                ],
            ]">
                <x-slot:additionalNav>
                    @guest
                        <div class="space-x-8">
                            <x-ui.link label="Daftar" />
                            <x-ui.link label="Masuk" type="primary" href="/login" />
                        </div>
                    @endguest

                    @auth
                        <x-fragments.profile-user-nav />
                    @endauth
                </x-slot:additionalNav>
            </x-ui.navigation>
        </header>

        <!-- Page Content -->
        <main id="home">
            @yield('content')
        </main>

        <!-- section footer -->
        <div class=" bg-black w-full">
            <div class="mx-auto text-center justify-center mt-5">
                <h3 class="text-3xl font-bold text-white pt-5">Logo ipsum</h3>
            </div>
            <div class=" flex text-center justify-center mt-10">
                <ul class="flex ">
                    <li><i class=" text-3xl px-2 fa-brands fa-square-facebook text-white"></i></li>
                    <li><i class=" text-3xl px-2 fa-brands fa-square-twitter  text-white "></i></li>
                    <li><i class=" text-3xl px-2 fa-brands fa-square-whatsapp  text-white"></i></li>
                    <li><i class=" text-3xl px-2 fa-brands fa-square-instagram  text-white"></i></li>
                </ul>
            </div>
            <div class="text-center mt-10 pb-10">
                <p class=" text-white">2024 © yaya Flower - Dilindungi oleh Undang - Undang</p>
            </div>
        </div>

    </div>
</body>

</html>
