@php
    $user = Auth::user();
    $menus = [
        [
            'label' => 'Data diri',
            'href' => '#',
        ],
        [
            'label' => 'Favorit',
            'href' => '#',
        ],
        [
            'label' => 'Keranjang',
            'href' => '#',
        ],
        [
            'label' => 'Transaksi',
            'href' => '#',
        ],
    ];
@endphp

<section class="relative">
    <div class="flex items-center cursor-pointer select-none gap-x-4" id="profile">
        <div class="h-[32px] w-[1px] bg-[#AFAFAF]"></div>
        <img src="{{ $user->profileURL }}" class="rounded-full size-14" />
        <h4 class="text-xl font-medium select-none">{{ $user->full_name }}</h4>
    </div>

    <div class="bg-white absolute w-fit top-[70px] border border-gray-100 rounded-lg hidden" id="profile_dropdown">
        <header class="px-4 py-3">
            <h6>{{ $user->full_name }}</h6>
            <p class="text-second">{{ $user->email }}</p>
        </header>

        <div class="flex flex-col border-t border-gray-100">
            @foreach ($menus as $menu)
                <a href="#" class="px-4 py-2">{{ $menu['label'] }}</a>
            @endforeach
        </div>

        <div class="px-4 py-2 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="text-danger-500">Keluar</button>
            </form>
        </div>
    </div>
</section>


<script type="text/javascript">
    const profile = document.getElementById("profile")
    const dropdown = document.getElementById("profile_dropdown")

    profile.addEventListener("click", () => {
        dropdown.classList.toggle("!block");
    })
</script>
