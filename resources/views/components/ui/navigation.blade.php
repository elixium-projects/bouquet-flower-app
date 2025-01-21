@props([
    'menus' => [
        [
            'label' => 'Label',
            'link' => '#',
        ],
    ],
])

<nav class=" px-2 py-6 shadow-sm">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div>
                <div class="bg-primary-500 w-[60px] h-[60px] mt-2 rounded-full">
                    <img src="{{ asset('images/Logo_PNG.png') }}" alt="img3" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex items-center gap-x-[52px]">
                @foreach ($menus as $menu)
                    <a href={{ $menu['link'] }} class="capitalize ">{{ $menu['label'] }}</a>
                @endforeach
            </div>

            {{ $additionalNav ?? '' }}
        </div>
    </div>
</nav>
