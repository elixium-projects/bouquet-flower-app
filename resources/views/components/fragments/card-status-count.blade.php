@props(['icon', 'count', 'label'])

<x-ui.card>
    <div class="flex items-center gap-x-6">
        <div class="p-6 rounded-lg bg-info-100">{{ $icon ?? null }}</div>
        <div>
            <h2 class="mb-2 text-4xl font-semibold">{{ $count ?? 0 }}</h2>
            <h4 class="text-xl font-medium">{{ $label ?? null }}</h4>
        </div>
    </div>
</x-ui.card>
