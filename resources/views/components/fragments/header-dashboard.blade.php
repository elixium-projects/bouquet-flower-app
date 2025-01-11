@php
    $user = Auth::user();
    $routeActive = Route::current()->getName();
    $menus = [
        [
            'label' => 'Beranda',
            'route' => 'dashboard.main',
            'breadcrumbs' => ['Beranda'],
        ],
        [
            'label' => 'Pengguna',
            'route' => 'dashboard.users.index',
            'breadcrumbs' => ['Kelola Pengguna'],
        ],
        [
            'label' => 'Produk',
            'route' => 'dashboard.product.index',
            'breadcrumbs' => ['Kelola Produk'],
        ],
        [
            'label' => 'Tambah Produk',
            'route' => 'dashboard.product.create',
            'breadcrumbs' => ['Kelola Produk', 'Tambah Produk'],
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
            <li class="breadcrumb-content">
                <i class="mr-2 fa-solid fa-home"></i>
                <span>Menu</span>
            </li>
            @isset($activeMenu['breadcrumbs'])
                @foreach ($activeMenu['breadcrumbs'] as $breadcrumb)
                    <li class="breadcrumb-content">{{ $breadcrumb }}</li>
                @endforeach
            @endisset
        </ul>
        <div class="relative" x-data="{ profileDropdown: false }">
            <div class="flex items-center cursor-pointer select-none gap-x-4" id="profile"
                x-on:click="() => profileDropdown = !profileDropdown">
                <div class="h-[32px] w-[1px] bg-[#AFAFAF]"></div>
                <img src="{{ asset('img/' . $user->profile_img) }}" class="rounded-full size-14" />
                <h4 class="text-xl font-medium select-none">{{ $user->full_name }}</h4>
            </div>
            <div class="absolute z-10 bg-white shadow-lg top-[65px] left-0 w-full" x-show="profileDropdown">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="w-full px-4 py-3 text-left hover:bg-primary-200">
                        <i class="mr-2 fa-solid fa-right-from-bracket"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
