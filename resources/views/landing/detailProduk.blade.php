@extends('layouts.landing')

@section('title', 'Detail Produk')

@section('content')

    <div class="m-5">
        <div class="text-[40px] font-semibold">
            Detail Produk
        </div>

        <div class="mt-5">
            <div class="grid grid-cols-3 gap-6">
                <!-- Kolom Kiri: 3 Gambar Vertikal -->
                <div class="grid gap-8 grid-auto-rows-[180px] ">
                    <div class="bg-primary-500 rounded-lg w-[180px] h-[180px] overflow-hidden">
                        <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk">
                    </div>

                    <div class="bg-primary-500 rounded-lg w-[180px] h-[180px] overflow-hidden">
                        <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk">
                    </div>

                    <div class="bg-primary-500 rounded-lg w-[180px] h-[180px] overflow-hidden">
                        <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk">
                    </div>
                </div>

                <!-- Kolom Tengah: Gambar Besar -->
                <div class="flex items-center justify-center">
                    <div class="bg-primary-500 rounded-lg w-[614px] h-[602px] overflow-hidden">
                        <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk besar">
                    </div>
                </div>

                <!-- Kolom Kanan: Judul -->
                <div class="">
                    <h3 class="text-3xl font-bold text-primary-700">HOT</h3>
                    <h3 class="text-3xl font-bold text-primary-700">Romance</h3>
                </div>
            </div>

        </div>
    </div>

@endsection
