@php
$user = Auth::user();
@endphp

<header class="drop-shadow py-6 px-8 bg-white">
    <div class="grid grid-cols-[6fr_1fr] gap-x-8">
        <x-ui.input-element placeholder="Masukan kata kunci" />
        <div class="flex items-center gap-x-4 cursor-pointer select-none" id="profile">
            <div class="h-[32px] w-[1px] bg-[#AFAFAF]"></div>
            <img src="{{ asset('img/' . $user->profile_img) }}" class="size-14 rounded-full" />
            <h4 class="text-xl font-medium select-none">{{ $user->full_name }}</h4>
        </div>
    </div>
</header>
