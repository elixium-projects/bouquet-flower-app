@extends('layouts.dashboard')

@section('content')
    <x-ui.card>
        <div class="mb-4">
            <h3 class="mb-6">Tambah User</h3>
        </div>

        <form action="{{ route('dashboard.users.create') }}" method="post" autocomplete="off" enctype="multipart/form-data">

            @csrf

            <div class="mb-4">
                <h4 class="mb-6 text-lg text-center">Foto Profile</h4>
                <x-ui.input-label for="img_file_upload"
                    class="relative mx-auto overflow-hidden text-center rounded-full cursor-pointer bg-surface-700 size-36 place-content-center">
                    <x-slot:value>
                        <img id="image_upload_preview" class="absolute inset-0 hidden object-cover w-full h-full">
                        <i class="text-xl fa-solid fa-plus bg-secondary"></i>
                    </x-slot:value>
                </x-ui.input-label>
                <x-ui.input-element type="file" class="invisible mb-0 !p-0" id="img_file_upload" name="profile" />
                @error('profile')
                    <span class="block mt-1 text-center text-danger-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid gap-5 lg:grid-cols-2">
                <x-ui.form-group>
                    <x-ui.input-label value="Nama Depan" for="first_name" :isRequired="true" />
                    <x-ui.input-element type="text" name="first_name" id="first_name" placeholder="Masukan nama depan"
                        :validate="$errors->has('first_name')" value="{{ old('first_name') }}" />
                    @error('first_name')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
                <x-ui.form-group>
                    <x-ui.input-label value="Nama Belakang" for="last_name" :isRequired="true" />
                    <x-ui.input-element type="text" name="last_name" id="last_name" placeholder="Masukan nama belakang"
                        :validate="$errors->has('last_name')" value="{{ old('last_name') }}" />
                    @error('last_name')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
            </div>

            <div class="grid gap-5 lg:grid-cols-2">
                <x-ui.form-group>
                    <x-ui.input-label value="Alamat email" for="email" :isRequired="true" />
                    <x-ui.input-element type="text" name="email" id="email" placeholder="Masukan email pengguna"
                        :validate="$errors->has('email')" value="{{ old('email') }}" />
                    @error('email')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
                <x-ui.form-group>
                    <x-ui.input-label value="Kata sandi" for="password" :isRequired="true" />
                    <x-ui.input-element type="password" name="password" id="password" placeholder="Masukan kata sandi"
                        :validate="$errors->has('password')" value="{{ old('password') }}" />
                    @error('password')
                        <span class="block mt-1 text-danger-500">{{ $message }}</span>
                    @enderror
                </x-ui.form-group>
            </div>

            <x-ui.form-group>
                <x-ui.input-label value="Alamat" for="address" :isRequired="true" />
                <x-ui.textarea name="address" id="address" placeholder="Masukkan Alamat secara detail di sini"
                    :validate="$errors->has('address')">{{ old('address') }}</x-ui.textarea>
                @error('address')
                    <span class="block mt-1 text-danger-500">{{ $message }}</span>
                @enderror
            </x-ui.form-group>

            <x-ui.form-group>
                <x-ui.input-label value="Nomor telpon" for="phone_number" :isRequired="true" />
                <x-ui.input-element type="phone_number" name="phone_number" id="phone_number"
                    placeholder="Masukan nomor telpon" :validate="$errors->has('phone_number')" value="{{ old('phone_number') }}" />
                @error('phone_number')
                    <span class="block mt-1 text-danger-500">{{ $message }}</span>
                @enderror
            </x-ui.form-group>

            <x-ui.button buttonType="primary" type="submit" label="Tambah User" class="w-full rounded-lg" />
        </form>
    </x-ui.card>
@endsection

@push('scripts')
    @vite(['resources/js/preview-img.js'])
@endpush
