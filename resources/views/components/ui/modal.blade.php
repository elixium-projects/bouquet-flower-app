@props(['title', 'name'])

<div style="display: none" x-data="{ visible: false, name: '{{ $name }}' }" x-show="visible"
    x-on:open-modal.window = "visible = ($event.detail.name === '{{ $name }}')"
    x-on:close-modal.window = "visible = false" x-on:keydown.escape.window = "visible = false">
    <div class="fixed inset-0 w-full h-full bg-black/40" x-on:click="visible = false"></div>
    <div class="fixed bg-white top-1/2 left-1/2 w-[800px] -translate-y-1/2 -translate-x-1/2" x-show="visible"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0  sm:scale-95"
        x-transition:enter-end="opacity-1 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-1 sm:scale-100" x-transition:leave-end="opacity-0  sm:scale-95">
        <div class="flex items-center justify-between p-6">
            <h4 class="text-lg">{{ $title }}</h4>
            <button type="button" id="close_modal" x-on:click="$dispatch('close-modal')">
                <i class="fa-solid fa-x"></i>
            </button>
        </div>

        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>
