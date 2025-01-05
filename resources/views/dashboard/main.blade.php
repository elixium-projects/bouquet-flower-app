@extends('layouts.dashboard')

@section('content')
    <div class="grid gap-4 lg:grid-cols-3">
        <x-fragments.card-status-count>
            <x-slot:icon>
                <x-fas-user class="text-info-500 size-14" />
            </x-slot:icon>
            <x-slot:count>{{ $totalUser }}</x-slot:count>
            <x-slot:label>Total Pengguna</x-slot:label>
        </x-fragments.card-status-count>
        <x-fragments.card-status-count>
            <x-slot:icon>
                <x-fas-box class="text-info-500 size-14" />
            </x-slot:icon>
            <x-slot:count>{{ $totalProduct }}</x-slot:count>
            <x-slot:label>Total Produk</x-slot:label>
        </x-fragments.card-status-count>
        <x-fragments.card-status-count>
            <x-slot:icon>
                <x-fas-user class="text-info-500 size-14" />
            </x-slot:icon>
            <x-slot:count>320</x-slot:count>
            <x-slot:label>Total kategori</x-slot:label>
        </x-fragments.card-status-count>
        <x-fragments.card-status-count>
            <x-slot:icon>
                <x-fas-bookmark class="text-info-500 size-14" />
            </x-slot:icon>
            <x-slot:count>320</x-slot:count>
            <x-slot:label>Total transaksi perbulan</x-slot:label>
        </x-fragments.card-status-count>
        <div class="col-span-2">
            <x-fragments.card-status-count>
                <x-slot:icon>
                    <x-fas-user class="text-info-500 size-14" />
                </x-slot:icon>
                <x-slot:count>320</x-slot:count>
                <x-slot:label>Total Pendapatan per bulan</x-slot:label>
            </x-fragments.card-status-count>
        </div>
    </div>
@endsection
