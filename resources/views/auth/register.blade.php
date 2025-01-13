@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="grid min-h-screen grid-cols-2">
        <div class="px-28 place-content-center">
            <div class="mb-8">
                <h2 class="mb-4">Daftar ke Yaya Flower</h2>
                <p>Gabung untuk memesan buket bunga indah dan nikmati layanan eksklusif kami.</p>
            </div>

            <form action="{{ route('register') }}" method="post" autocomplete="off">
                @csrf

                <div class="mb-14">
                    <div class="mb-4 space-y-2">
                        <x-ui.input-label value="Nama depan" isRequired />
                        <x-ui.input-element type="text" placeholder="Masukan nama depan" name="first_name" />
                        <x-ui.input-error :messages="$errors->get('first_name')" />
                    </div>
                    <div class="mb-4 space-y-2">
                        <x-ui.input-label value="Nama belakang" isRequired />
                        <x-ui.input-element type="text" placeholder="Masukan nama belakang" name="last_name" />
                        <x-ui.input-error :messages="$errors->get('last_name')" />
                    </div>
                    <div class="mb-4 space-y-2">
                        <x-ui.input-label value="Nomor telepon" isRequired />
                        <x-ui.input-element type="text" placeholder="Nomor telepon" name="phone_number" />
                        <x-ui.input-error :messages="$errors->get('phone_number')" />
                    </div>
                    <div class="mb-4 space-y-2">
                        <x-ui.input-label value="Alamat email" isRequired />
                        <x-ui.input-element type="text" placeholder="Alamat email" name="email" />
                        <x-ui.input-error :messages="$errors->get('email')" />
                    </div>
                    <div class="space-y-2 relative" x-data="{ showPassword: false }">
                        <x-ui.input-label value="Kata sandi" isRequired />
                        <x-ui.input-element x-bind:type="showPassword ? 'text' : 'password'" name="password"
                            placeholder="Kata sandi" />
                        <button type="button" class="text-xl absolute right-[24px] top-[43%] text-surface-800"
                            x-on:click="() => showPassword = !showPassword">
                            <i x-bind:class="showPassword ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                        </button>
                        <x-ui.input-error :messages="$errors->get('password')" />

                    </div>
                </div>

                <x-ui.button type="submit" label="Daftar" class="w-full rounded-lg" />
            </form>

            <span class="block mt-8 text-center">Sudah punya akun ? <a href="{{ route('login') }}"
                    class="text-primary-600">Masuk disini</a></span>

        </div>
        <div class="relative text-white bg-primary-600 place-content-center">
            <div class="p-8">
                <h1 class="mb-7 lg:max-w-[556px]">Selamat Datang Kembali di Yaya Flowers</h1>
                <p class="lg:max-w-[556px]">Masuk untuk melanjutkan pengalaman berbelanja Anda. Akses produk favorit, cek
                    status
                    pesanan Anda, dan
                    temukan buket bunga terbaik dengan mudah!</p>
            </div>
            <div class="w-[800px] h-[600px] overflow-hidden text-right ml-auto">
                <img src="{{ asset('img/yaya-flower-macbook.png') }}" alt="macbook" class="object-cover w-full h-auto">
            </div>
        </div>
    </div>
@endsection
