@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="grid min-h-screen grid-cols-2">
        <div class="px-28 place-content-center">
            <div class="mb-8">
                <h2 class="mb-4">Masuk ke Yaya Flower</h2>
                <p>Temukan keindahan buket bunga dan pesan dalam hitungan menit!</p>
            </div>

            <form action="{{ route('login') }}" method="post" autocomplete="off">
                @csrf

                <div class="mb-14">
                    <div class="mb-4 space-y-2">
                        <x-ui.input-label value="Alamat email" isRequired />
                        <x-ui.input-element type="text" placeholder="Alamat email" name="email" />
                        <x-ui.input-error :messages="$errors->get('email')" />
                    </div>
                    <div class="space-y-2 relative" x-data="{ showPassword: false }">
                        <x-ui.input-label value="Kata sandi" isRequired />
                        <x-ui.input-element x-bind:type="showPassword ? 'text' : 'password'" name="password"
                            placeholder="Kata sandi" />
                        <x-ui.input-error :messages="$errors->get('password')" />
                        <button type="button" class="text-xl absolute right-[24px] top-[43%] text-surface-800"
                            x-on:click="() => showPassword = !showPassword">
                            <i x-bind:class="showPassword ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                        </button>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex gap-2 mt-4">
                            <x-ui.input-element type="checkbox" name="remember" class="!w-fit" id="remember" />
                            <x-ui.input-label value="Ingat saya" for="remember" class="select-none" />
                        </div>
                    </div>
                </div>

                <x-ui.button type="submit" label="Masuk" class="w-full rounded-lg" />
            </form>

            <span class="block mt-8 text-center">Belum punya akun ? <a href="{{ route('register') }}"
                    class="text-primary-600">Daftar
                    disini</a></span>
        </div>
        <div class="relative text-white bg-primary-600 place-content-center flex items-center">
            <div class="p-8">
                <h1 class="mb-7 lg:max-w-[556px]">Selamat Datang Kembali di Yaya Flowers</h1>
                <p class="lg:max-w-[556px]">Masuk untuk melanjutkan pengalaman berbelanja Anda. Akses produk favorit, cek
                    status
                    pesanan Anda, dan
                    temukan buket bunga terbaik dengan mudah!</p>
            </div>
            <div class="size-52 overflow-hidden">
                <img src="{{ asset('images/Logo_PNG.png') }}" alt="logo" class="object-cover w-full h-auto">
            </div>
        </div>
    </div>
@endsection
