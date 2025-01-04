@extends('layouts.dashboard')

@section('content')
    <x-ui.card>
        <div class="mb-4">
            <h3 class="mb-6">Tambah Produk</h3>
        </div>

        <form action="#" method="post">
            @csrf

            <div class="mb-4">
                <h4 class="text-lg text-center mb-6">Foto Produk</h4>
                <x-ui.input-label for="img_file_upload"
                    class="mx-auto bg-surface-700 size-36 rounded-full place-content-center text-center overflow-hidden relative cursor-pointer">
                    <x-slot:value>
                        <img id="image_upload_preview" class="hidden absolute w-full h-full object-cover inset-0">
                        <i class="fa-solid fa-plus text-xl bg-secondary"></i>
                    </x-slot:value>
                </x-ui.input-label>
                <x-ui.input-element type="file" class="hidden" id="img_file_upload" name="foto_produk" />
            </div>

            <x-ui.form-group>
                <x-ui.input-label value="Nama Produk" for="product_name" :isRequired="true" />
                <x-ui.input-element type="text" name="product_name" id="product_name"
                    placeholder="Masukan nama produk" />
            </x-ui.form-group>
            <x-ui.form-group>
                <x-ui.input-label value="Deskripsi Produk" for="description" :isRequired="true" />
                <x-ui.textarea name="description" id="description"
                    placeholder="Masukkan deskripsi produk secara detail di sini" />
            </x-ui.form-group>
            <div class="grid lg:grid-cols-3 gap-5">
                <x-ui.form-group>
                    <x-ui.input-label value="Kategori produk" for="category" :isRequired="true" />
                    <x-ui.select name="category" id="category">
                        <option value="" disabled selected>Pilih kategori produk</option>
                    </x-ui.select>
                    <button type="button" class="text-left text-primary-500"
                        x-on:click="$dispatch('toggle-modal', {
                    modalId: 'category-product-modal'
                    })">Buat
                        kategori baru</button>
                </x-ui.form-group>
                <x-ui.form-group>
                    <x-ui.input-label value="Harga produk" for="price_number_input" :isRequired="true" />
                    <x-ui.input-element name="price" id="price_number_input"
                        placeholder="Masukkan harga produk di sini" />
                </x-ui.form-group>
                <x-ui.form-group>
                    <x-ui.input-label value="Harga produk" for="price_number_input" :isRequired="true" />
                    <x-ui.input-count name="stock" />
                </x-ui.form-group>
            </div>
        </form>
    </x-ui.card>

    <div x-data="{ show: false }"
        x-on:toggle-modal.window="if ($event.detail.modalId === 'category-product-modal') show = !show">
        <x-ui.modal title="Tambah Kategori">
            <form action="#">
                <x-ui.form-group>
                    <x-ui.input-label value="Nama Kategori Produk" for="category_name" :isRequired="true" />
                    <x-ui.input-element type="text" name="category_name" id="category_name"
                        placeholder="Masukan nama kategori" />
                </x-ui.form-group>
                <x-ui.button label="Tambah kategori" class="w-full rounded-lg" />
            </form>
        </x-ui.modal>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/preview-img.js', 'resources/js/price-format.js'])
@endpush
