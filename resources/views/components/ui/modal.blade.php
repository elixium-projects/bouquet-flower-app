@props(['title'])

<div class="hidden" x-data="{ show: false }" x-show="show">
    <div class="absolute bg-black/40 inset-0 w-full h-full"></div>
    <div class="absolute bg-white top-1/2 left-1/2 w-[800px] -translate-y-1/2 -translate-x-1/2">
        <div class="p-6 flex items-center justify-between">
            <h4 class="text-lg">{{ $title }}</h4>
            <button type="button" id="close_modal">
                <i class="fa-solid fa-x"></i>
            </button>
        </div>

        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>
