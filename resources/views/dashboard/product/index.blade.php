@extends('layouts.dashboard')

@php
    $productTH = ['ID', 'Foto', 'Nama', 'Kategori', 'Harga', 'Stock', 'Aksi'];
@endphp

@section('content')
    <x-ui.card>
        <div class="mb-4">
            <h3 class="mb-6">Kelola Produk</h3>
            <div class="grid lg:grid-cols-[3fr_1fr] gap-6">
                <x-ui.input-element type="search" placeholder="Masukan nama produk" />
                <a href="{{ route('dashboard.product.create') }}"
                    class="flex items-center justify-center px-6 py-3 text-white rounded-lg bg-primary-500 gap-x-4">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Produk</span>
                </a>
            </div>
        </div>
        <x-ui.table>
            <tr>
                @foreach ($productTH as $th)
                    <x-ui.table-th>{{ $th }}</x-ui.table-th>
                @endforeach
            </tr>

            @forelse ($products as $product)
                <tr>
                    <x-ui.table-td class="text-center">{{ $product->id }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">
                        <div class="relative mx-auto overflow-hidden size-32">
                            <img src="{{ $product->thumbnailURL }}" alt="thumbnail" class="object-cover w-full h-full" />
                        </div>
                    </x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $product->name }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $product->category->name }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">Rp.{{ number_format($product->price) }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $product->stock }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">
                        <div class="flex items-center justify-center gap-4">
                            <x-ui.button buttonType="info" class="rounded-lg !py-3 !px-4">
                                <x-slot:label>
                                    <i class="fa-solid fa-eye size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                            <x-ui.button buttonType="warning" class="rounded-lg !py-3 !px-4">
                                <x-slot:label>
                                    <i class="fa-solid fa-pencil size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                            <x-ui.button buttonType="danger" class="rounded-lg !py-3 !px-4">
                                <x-slot:label>
                                    <i class="fa-solid fa-trash size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                        </div>
                    </x-ui.table-td>
                </tr>
            @empty
                <tr>
                    <x-ui.table-td colspan="99" class="text-center">Tidak ada produk</x-ui.table-td>
                </tr>
            @endforelse
        </x-ui.table>
    </x-ui.card>
@endsection
