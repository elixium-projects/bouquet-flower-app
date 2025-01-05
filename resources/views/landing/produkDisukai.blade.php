@extends('layouts.landing')

@section('title', 'Produk Disukai')

@section('content')

    <div class=" xl:mx-0 lg:mx-[185px]">

        <div class="m-2 mt-10">
            <h1 class=" font-playfair text-[40px]">Produk Disukai</h1>
        </div>
        <!-- card produk -->
        <div class="mt-10 mx-[175px] xl:mx-2">
            <div class="grid grid-cols-4 gap-[32px]">
                @for ($a = 0; $a <= 3; $a++)
                    <div class="card border-solid drop-shadow-lg rounded-lg bg-surface-500">
                        <div
                            class="bg-white rounded-full w-[44px] h-[44px] absolute right-2 flex items-center justify-center shadow-md mt-2">
                            <i class="fa-solid fa-heart text-danger-500 text-lg"></i>
                        </div>


                        <img src="{{ asset('images/produk.png') }}" alt="img1" class=" rounded-lg">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h5 class="card-title m-2">Hot Romance</h5>
                                <div class="m-2">Rp.459.000 </div>
                            </div>

                            <div
                                class="w-[56px] h-[56px]  bg-primary-500 rounded-full absolute right-2 flex items-center justify-center shadow-md mt-2">
                                <i class=" text-white  fa-solid fa-cart-shopping text-lg"></i>
                            </div>

                        </div>

                    </div>
                @endfor
            </div>

        </div>
    </div>
@endsection
