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
                    <div class="space-y-2">
                        <x-ui.input-label value="Kata sandi" isRequired />
                        <x-ui.input-element type="password" name="password" placeholder="Kata sandi" />
                        <x-ui.input-error :messages="$errors->get('password')" />
                    </div>
                    <div class="flex justify-between">
                        <div class="flex gap-2 mt-4">
                            <x-ui.input-element type="checkbox" name="remember" class="!w-fit" id="remember" />
                            <x-ui.input-label value="Ingat saya" for="remember" class="select-none" />
                        </div>
                        <div class="flex gap-2 mt-4">
                            <a href="#" class="text-primary-600">Lupa kata sandi ?</a>
                        </div>
                    </div>
                </div>

                <x-ui.button type="submit" label="Masuk" class="w-full rounded-lg" />
            </form>

            <span class="block mt-8 text-center">Belum punya akun ? <a href="#" class="text-primary-600">Daftar
                    disini</a></span>
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
                <img src="{{ asset('img/yaya-flower-macbook.png') }}" alt="macbook" class="object-cover w-full h-full">
            </div>
        </div>
    </div>
@endsection
