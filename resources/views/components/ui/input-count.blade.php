<div class="flex">
    <button type="button" class="bg-surface-700 px-6 py-4 rounded-l-md font-semibold" id="btn_less">-</button>
    <input
        {{ $attributes->merge(['id' => 'input_count', 'value' => 0, 'class' => 'text-center block text-lg border border-surface-700 w-[80px]', 'type' => 'number', 'min' => 0]) }}>
    <button type="button" class="bg-surface-700 px-6 py-4 rounded-r-md font-semibold" id="btn_add">+</button>
</div>

@push('scripts')
    @vite(['resources/js/count.js'])
@endpush
