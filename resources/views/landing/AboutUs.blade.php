@extends('layouts.landing')

@section('title', 'Tentang Kami')

@section('content')

    <div class="m-5">
        <div class="mx-auto justify-center text-center">
            <h3 class="text-3xl text-black">Menghadirkan Keindahan di Setiap Momen Spesial</h3>
        </div>

        <div class="bg-primary-500 w-[1280px] max-w-full h-[400px] mt-5">
            <img src="{{ asset('images/bg-aboutUs.jpg') }}" class="w-full h-full object-cover" alt="">
        </div>

        <div class="mt-5">
            <p>Toko Yaya Flowers adalah salah satu toko yang khusus bergerak dalam penjualan bouquet bunga untuk berbagai
                acara penting dan perayaan Istimewa. Toko ini melayani berbagai kebutuhan pelanggan yang ingin menghias
                acara mereka dengan bunga-bunga segar dan indah, baik untuk merayakan hari valentine, hari ibu, ulang tahun,
                maupun perayaan hari-hari spesial lainnya.
                Yaya Flowers berlokasi di Jalan Diponogoro No. 114, Klungkung, Bali, Toko Yaya Flowers didirikan oleh I
                Wayan Suriana sejak tahun 2022. Toko ini buka setiap hari dari Senin hingga Minggu, dengan jam operasional
                yang dimulai dari pukul 08.00 WITA hingga 20.00 WITA. Pada hari-hari raya atau perayaan besar Hindu toko
                Yaya Flowers tidak beroperasi.</p>
        </div>
    </div>

@endsection
