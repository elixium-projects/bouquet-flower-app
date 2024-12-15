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
                <h2>Brand Logo</h2>
            </div>

            <div class="flex items-center gap-x-[52px]">
                @foreach ($menus as $menu)
                    <a href={{ $menu['link'] }} class="capitalize">{{ $menu['label'] }}</a>
                @endforeach
            </div>

            {{ $additionalNav ?? '' }}
        </div>
    </div>
</nav>
