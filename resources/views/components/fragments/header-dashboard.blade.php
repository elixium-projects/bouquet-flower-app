@php
    $user = Auth::user();
    $routeActive = Route::current()->getName();
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

    $activeMenu = collect($menus)->first(function ($item) use ($routeActive) {
        return $routeActive === $item['route'];
    });

@endphp

<header class="px-8 py-6 bg-white drop-shadow">
    <div class="grid grid-cols-[6fr_1fr] gap-x-8 items-center">
        <ul class="breadcrumb">
            <li class="breadcrumb-content">Menu</li>
            <li class="breadcrumb-content">{{ $activeMenu['label'] ?? 'Page' }}</li>
        </ul>
        <div class="flex items-center cursor-pointer select-none gap-x-4" id="profile">
            <div class="h-[32px] w-[1px] bg-[#AFAFAF]"></div>
            <img src="{{ asset('img/' . $user->profile_img) }}" class="rounded-full size-14" />
            <h4 class="text-xl font-medium select-none">{{ $user->full_name }}</h4>
        </div>
    </div>
</header>
