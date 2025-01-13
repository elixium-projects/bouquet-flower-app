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
            'icon' => 'fa-solid fa-house',
        ],
        [
            'label' => 'Pengguna',
            'route' => 'dashboard.users.index',
            'icon' => 'fa-solid fa-user',
        ],
        [
            'label' => 'Produk',
            'route' => 'dashboard.product.index',
            'icon' => 'fa-solid fa-cube',
        ],
        [
            'label' => 'Transaksi',
            'route' => 'dashboard.transactions.index',
            'icon' => 'fa-solid fa-sack-dollar',
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
            class="flex items-center gap-x-4 text-xl px-8 py-6 {{ ClassRouteActive($menu['route']) }}">
            @isset($menu['icon'])
                <i class="{{ $menu['icon'] }}"></i>
            @endisset
            <span>{{ $menu['label'] }}</span>
        </a>
    @endforeach

</aside>
