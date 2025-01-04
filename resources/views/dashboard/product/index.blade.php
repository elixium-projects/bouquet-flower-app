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
                    class="rounded-lg bg-primary-500 text-white px-6 py-3 rounded-lg flex items-center gap-x-4 justify-center">
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

            <tr>
                <x-ui.table-td colspan="99" class="text-center">Tidak ada produk</x-ui.table-td>
            </tr>
        </x-ui.table>
    </x-ui.card>
@endsection
