@extends('layouts.landing')

@section('title', 'Gallery')

@section('content')

    <div class="m-5 ">
        <div class="my-5">
            <h3 class="text-3xl">Galeri Keindahan Bunga Kami</h3>
        </div>
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 overflow-hidden">

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[384px] mt-2">
                    <img src="{{ asset('images/bunga1.jpeg') }}" alt="img1" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[250px] mt-2">
                    <img src="{{ asset('images/bunga2.jpeg') }}" alt="img2" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[283px] mt-2">
                    <img src="{{ asset('images/bunga3.jpeg') }}" alt="img3" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[289px] mt-2">
                    <img src="{{ asset('images/bunga4.jpeg') }}" alt="img4" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[191px] mt-2">
                    <img src="{{ asset('images/bunga5.jpeg') }}" alt="img5" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[211px] mt-2">
                    <img src="{{ asset('images/bunga6.jpeg') }}" alt="img6" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[218px] mt-2">
                    <img src="{{ asset('images/bunga7.jpeg') }}" alt="img7" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[384px] mt-2">
                    <img src="{{ asset('images/bunga8.jpeg') }}" alt="img8" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[250px] mt-2">
                    <img src="{{ asset('images/bunga9.jpeg') }}" alt="img9" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[283px] mt-2">
                    <img src="{{ asset('images/bunga10.jpeg') }}" alt="img10" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[211px] mt-2">
                    <img src="{{ asset('images/bunga11.jpeg') }}" alt="img11" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[512px] mt-2">
                    <img src="{{ asset('images/bunga12.jpeg') }}" alt="img12" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[194px] mt-2">
                    <img src="{{ asset('images/bunga13.jpeg') }}" alt="img13" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <div class="container mt-4 mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 overflow-hidden">

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[384px] mt-2">
                    <img src="{{ asset('images/bunga1.jpeg') }}" alt="img1" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[250px] mt-2">
                    <img src="{{ asset('images/bunga2.jpeg') }}" alt="img2" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[283px] mt-2">
                    <img src="{{ asset('images/bunga3.jpeg') }}" alt="img3" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[289px] mt-2">
                    <img src="{{ asset('images/bunga4.jpeg') }}" alt="img4" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[191px] mt-2">
                    <img src="{{ asset('images/bunga5.jpeg') }}" alt="img5" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[211px] mt-2">
                    <img src="{{ asset('images/bunga6.jpeg') }}" alt="img6" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[218px] mt-2">
                    <img src="{{ asset('images/bunga7.jpeg') }}" alt="img7" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[384px] mt-2">
                    <img src="{{ asset('images/bunga8.jpeg') }}" alt="img8" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[250px] mt-2">
                    <img src="{{ asset('images/bunga9.jpeg') }}" alt="img9" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[283px] mt-2">
                    <img src="{{ asset('images/bunga10.jpeg') }}" alt="img10" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="bg-primary-500 w-full max-w-full h-[211px] mt-2">
                    <img src="{{ asset('images/bunga11.jpeg') }}" alt="img11" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[512px] mt-2">
                    <img src="{{ asset('images/bunga12.jpeg') }}" alt="img12" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary-500 w-full max-w-full h-[194px] mt-2">
                    <img src="{{ asset('images/bunga13.jpeg') }}" alt="img13" class="w-full h-full object-cover">
                </div>
            </div>
        </div>


    </div>

@endsection
