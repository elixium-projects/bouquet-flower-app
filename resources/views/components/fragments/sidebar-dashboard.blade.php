@php

    function ClassRouteActive($main)
    {
        $routeActive = Route::current()->getName();

        return $routeActive === $main ? 'bg-primary-500 text-white' : 'hover:bg-primary-300 hover:text-white';
    }

    $menus = [
        [
            'label' => 'Beranda',
            'route' => 'dashboard.main',
        ],
        [
            'label' => 'Pengguna',
            'route' => 'dashboard.user-management',
        ],
        [
            'label' => 'Produk',
            'route' => 'dashboard.product-management',
        ],
        [
            'label' => 'Transaksi',
            'route' => 'dashboard.transaction-management',
        ],
    ];
@endphp

<aside class="bg-white drop-shadow">
    <header class="py-8 px-9">
        <img src="{{ asset('logo.svg') }}" alt="">
    </header>
    <div class="px-8 py-4">
        <h5 class="text-lg text-primary-400">Menu</h5>
    </div>


    @foreach ($menus as $menu)
        <a href="{{ route($menu['route']) }}"
            class="text-xl px-8 py-6 block {{ ClassRouteActive($menu['route']) }}">{{ $menu['label'] }}</a>
    @endforeach

</aside>
