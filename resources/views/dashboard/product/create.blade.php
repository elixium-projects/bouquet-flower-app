@extends('layouts.dashboard')

@section('content')
    <x-ui.card>
        <div class="mb-4">
            <h3 class="mb-6">Tambah Produk</h3>
        </div>

        <form action="{{ route('dashboard.product.create-post') }}" method="post" autocomplete="off"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <h4 class="mb-6 text-lg text-center">Foto Produk</h4>
                <x-ui.input-label for="img_file_upload"
                    class="relative mx-auto overflow-hidden text-center rounded-full cursor-pointer bg-surface-700 size-36 place-content-center">
                    <x-slot:value>
                        <img id="image_upload_preview" class="absolute inset-0 hidden object-cover w-full h-full">
                        <i class="text-xl fa-solid fa-plus bg-secondary"></i>
                    </x-slot:value>
                </x-ui.input-label>
                <x-ui.input-element type="file" class="invisible mb-0 !p-0" id="img_file_upload"
                    name="thumbnail_product" />
                @error('thumbnail_product')
                    <span class="block mt-3 text-center text-danger-500">{{ $message }}</span>
                @enderror
            </div>

            <x-ui.form-group>
                <x-ui.input-label value="Nama Produk" for="product_name" :isRequired="true" />
                <x-ui.input-element type="text" name="product_name" id="product_name" placeholder="Masukan nama produk"
                    :validate="$errors->has('product_name')" value="{{ old('product_name') }}" />
                @error('product_name')
                    <span class="block mt-1 text-danger-500">{{ $message }}</span>
                @enderror
            </x-ui.form-group>
            <x-ui.form-group>
                <x-ui.input-label value="Deskripsi Produk" for="description" :isRequired="true" />
                <x-ui.textarea name="description" id="description"
                    placeholder="Masukkan deskripsi produk secara detail di sini" :validate="$errors->has('description')" />
                @error('description')
                    <span class="block mt-1 text-danger-500">{{ $message }}</span>
                @enderror
            </x-ui.form-group>
            <div class="grid gap-5 lg:grid-cols-3">
                <x-ui.form-group>
                    <x-ui.input-label value="Kategori produk" for="category" :isRequired="true" />
                    <x-ui.select name="category" id="category" :validate="$errors->has('category')">
                        <option value="" disabled selected>Pilih kategori produk</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </x-ui.select>
                    <button x-data type="button" class="text-left text-primary-500"
                        x-on:click="$dispatch('open-modal', {name: 'add_category_modal'})">Tambah
                        kategori baru</button>
                    @error('product_name')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
                <x-ui.form-group>
                    <x-ui.input-label value="Harga produk" for="price_number_input" :isRequired="true" />
                    <x-ui.input-element name="price" id="price_number_input" :validate="$errors->has('price')"
                        placeholder="Masukkan harga produk di sini" value="{{ old('price') }}" />
                    @error('price')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
                <x-ui.form-group>
                    <x-ui.input-label value="Stock produk" for="price_number_input" :isRequired="true" />
                    <x-ui.input-count name="stock" />
                </x-ui.form-group>
            </div>
            <div class="grid gap-5 lg:grid-cols-3">
                <x-ui.form-group>
                    <x-ui.input-label value="Ukuran" for="product_size" :isRequired="true" />
                    <x-ui.input-element type="text" name="product_size" id="product_size"
                        placeholder="Masukan ukuran produk" :validate="$errors->has('product_size')" value="{{ old('product_size') }}" />
                    <span>Masukkan dimensi produk (panjang x lebar) dalam satuan cm.</span>
                    @error('product_name')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
            </div>

            <x-ui.button buttonType="primary" type="submit" label="Tambah Produk" class="w-full rounded-lg" />
        </form>
    </x-ui.card>

    <x-ui.modal title="Tambah Kategori" name="add_category_modal">
        <form method="POST" action="{{ route('dashboard.product-category.create') }}" autocomplete="off" class="mb-6">
            @csrf
            <x-ui.form-group>
                <x-ui.input-label value="Nama Kategori Produk" for="category_name" :isRequired="true" />
                <x-ui.input-element type="text" name="category_name" id="category_name"
                    placeholder="Masukan nama kategori" />
            </x-ui.form-group>
            <x-ui.button label="Tambah kategori" class="w-full rounded-lg" />
        </form>

        <x-ui.table>
            <tr>
                <x-ui.table-th>Nama</x-ui.table-th>
                <x-ui.table-th>Aksi</x-ui.table-th>
            </tr>

            @forelse ($categories as $category)
                <tr>
                    <x-ui.table-td class="text-center">{{ $category['name'] }}</x-ui.table-td>
                    <x-ui.table-td class="text-center ">
                        <form action="{{ route('dashboard.product-category.delete', ['category' => $category['id']]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <x-ui.button buttonType="danger" type="submit" class="rounded-lg !py-3 !px-4">
                                <x-slot:label>
                                    <i class="fa-solid fa-trash size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                        </form>
                    </x-ui.table-td>
                </tr>
            @empty
                <tr>
                    <x-ui.table-td class="text-center">Tidak ada produk</x-ui.table-td>
                </tr>
            @endforelse
        </x-ui.table>
    </x-ui.modal>
@endsection

@push('scripts')
    @vite(['resources/js/preview-img.js', 'resources/js/price-format.js'])
@endpush
