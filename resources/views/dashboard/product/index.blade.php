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

            @forelse ($products as $index => $product)
                <tr>
                    <x-ui.table-td class="text-center">{{ $products->firstItem() + $index }}</x-ui.table-td>
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
                            <x-ui.button type="button" buttonType="info" class="rounded-lg !py-3 !px-4">
                                <x-slot:label>
                                    <i class="fa-solid fa-eye size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                            <x-ui.button type="button" buttonType="warning" class="rounded-lg !py-3 !px-4" x-data
                                x-on:click="() => window.location.href = '{{ route('dashboard.product.edit', ['product' => $product->id]) }}'">
                                <x-slot:label>
                                    <i class="fa-solid fa-pencil size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                            <x-ui.button type="button" buttonType="danger" class="rounded-lg !py-3 !px-4" x-data
                                x-on:click="() =>
                                $dispatch('open-modal', {name:'delete_modal'})
                                $dispatch('set-product-id', '{{ $product->id }}')
                                ">
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
        {{ $products->links() }}
    </x-ui.card>

    <x-ui.modal title="" name="delete_modal">
        <div x-data="{ productId: '' }" x-on:set-product-id.window="productId = $event.detail">
            <h1 class="mb-5 text-center">Konfirmasi Penghapusan Produk</h1>
            <p class="text-center">
                Apakah Anda yakin ingin menghapus produk ini dari daftar? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex items-center justify-center gap-4 mt-6">
                <x-ui.button type="button" label="Batal" x-on:click="$dispatch('close-modal', {name:'delete_modal'})"
                    class="w-full text-lg rounded-lg" buttonType="outline-primary" />
                <x-ui.button type="button" label="Ya, Hapus Produk" x-on:click="DeleteProduct(productId)"
                    class="w-full text-lg rounded-lg" />
            </div>
        </div>
    </x-ui.modal>
@endsection

@push('scripts')
    <script type="text/javascript">
        async function DeleteProduct(id) {
            try {
                const resDelete = await axios({
                    method: "delete",
                    url: `${window.location.origin}/dashboard/products/delete/${id}`
                })

                if (resDelete.status === 200) {
                    window.location.reload();
                }

            } catch (err) {
                console.error(err)
                $dispatch('close-modal', {
                    name: 'delete_modal'
                })
            }
        }
    </script>
@endpush
