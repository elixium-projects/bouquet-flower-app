@extends('layouts.landing')

@section('title', 'Produk')

@section('content')

    <div class="flex h-full xl:mx-2 lg:mx-[185px]">
        <!-- Sidebar -->
        <div class="flex flex-col w-64 h-full  text-white">
            <div class=" mt-5 text-[24px] font-bold text-black">
                Filter
            </div>

            <div class=" mt-5">
                <div class="text-[20px] font-bold text-black">
                    Harga
                </div>
                <div class="text-[16px] border rounded-md p-2 mt-2 text-black">
                    Harga Maksimum
                </div>
                <div class="text-[16px] border rounded-md p-2 mt-2 text-black">
                    Harga Minimum
                </div>
            </div>

            <div class=" mt-5">
                <div class="text-[20px] font-bold text-black">
                    Kategori
                </div>
                <div class="text-[16px] mt-2 text-black">
                    Bouquet Bunga
                </div>
                <div class="text-[16px] mt-2 text-black">
                    Karangan Bunga
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 bg-gray-100 p-5">
            <div class="relative mt-1">
                <input type="text"
                    class="border border-gray-300 rounded-md text-xs px-4 pl-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                    placeholder="Cari Bouquetmu">
                <i
                    class="fa-solid fa-magnifying-glass text-gray-500 text-xs absolute left-3 top-1/2 transform -translate-y-1/2"></i>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-2">
                @for ($a = 0; $a <= 11; $a++)
                    <div class="card border-solid drop-shadow-lg rounded-lg bg-surface-500">
                        <img src="{{ asset('images/produk.png') }}" alt="img1" class=" rounded-lg">
                        <h5 class="card-title m-2">Hot Romance</h5>
                        <div class="flex justify-between">
                            <div>
                                <p class="m-2 flex justify-between">Rp.459.000 </p>
                            </div>
                            <div class="bg-primary-500 m-2 rounded-full ">
                                <a href="{{ route('detailProduk') }}">
                                    <i class=" text-white  fa-solid fa-cart-shopping p-2"></i>
                                </a>

                            </div>

                        </div>

                    </div>
                @endfor
            </div>

            <div class="flex justify-center mt-10 pb-5">
                <nav aria-label="Pagination">
                    <ul class="inline-flex items-center">

                        <li>
                            <a href="#"
                                class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600"
                                aria-label="Previous">
                                &laquo;
                            </a>
                        </li>


                        @for ($a = 1; $a <= 25; $a++)
                            @if ($a <= 3 || $a > 22)
                                <li>
                                    <a href="#"
                                        class="px-4 py-2 text-gray-500  hover:bg-gray-200 hover:text-gray-600">
                                        {{ $a }}
                                    </a>
                                </li>
                            @elseif ($a == 4)
                                <li>
                                    <span class="px-4 py-2 text-gray-500  hover:bg-gray-200 hover:text-gray-600">...</span>
                                </li>
                            @endif
                        @endfor


                        <li>
                            <a href="#"
                                class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600"
                                aria-label="Next">
                                &raquo;
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>


    </div>




@endsection
