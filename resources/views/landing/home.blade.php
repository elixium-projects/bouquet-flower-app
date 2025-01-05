@extends('layouts.landing')

@section('title', 'Boquent Flower')

@section('content')

    <!-- section hero -->
    <div class="grid grid-cols-3 gap-4 xl:mx-0 lg:mx-[185px]">
        <div class="col-span-2 w-[800px] h-[560px]">
            <img src="{{ asset('images/bg-branda.jpg') }}" alt="">
        </div>
        <div class="mt-24 ">
            <h1 class="text-4xl font-bold">Rangkaian Indah</h1>
            <h1 class="text-4xl font-bold">Untuk Setiap</h1>
            <h1 class="text-4xl font-bold">Momen</h1>

            <p class="mt-5 text-customeBlue pe-20">
                Temukan bouquet bunga yang dirangkai dengan cinta, sempurna untuk merayakan hari spesial atau mengungkapkan
                perasaanmu.
            </p>

            <div class=" mt-5 flex">
                <div class="me-2 mt-2">
                    <a href="{{ route('Produk') }}"
                        class="bg-primary-500 rounded-md hover:bg-black hover:text-white   text-white p-2 ">
                        Pesan Sekarang</a>
                </div>
                <div class="ms-2">
                    <button
                        class="border-solid border hover:bg-primary-500 hover:text-white  rounded-md border-primary-500 p-2"
                        type="submit">
                        Cari Bouquetmu </button>
                </div>
            </div>

        </div>
    </div>

    <!-- section produk -->
    <div class=" xl:mx-0 lg:mx-[185px] mt-10  bg-surface-700" id="produk">

        <div class="flex justify-between p-5">
            <div class="pb-2">
                <h3 class="text-3xl text-customeBlue font-bold"> Produk</h3>
            </div>
            <div class="relative mt-1">
                <!-- Input Field -->
                <input type="text"
                    class="border border-gray-300 rounded-md text-xs px-4 pl-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                    placeholder="Cari Bouquetmu">

                <!-- Icon -->
                <i
                    class="fa-solid fa-magnifying-glass text-gray-500 text-xs absolute left-3 top-1/2 transform -translate-y-1/2"></i>
            </div>


        </div>

        <!-- kategori -->
        <div>
            <div class=" flex ">
                <h5
                    class=" text-sm m-4 border-solid border border-second  rounded-lg hover:bg-primary-500 hover:text-white p-2 ">
                    Semua</h5>
                <h5
                    class=" text-sm m-4 border-solid border border-second  rounded-lg hover:bg-primary-500 hover:text-white p-2 ">
                    Bequet Bunga</h5>
                <h5
                    class=" text-sm m-4 border-solid border border-second  rounded-lg hover:bg-primary-500 hover:text-white p-2 ">
                    Karangan Bunga</h5>
            </div>
        </div>

        <!-- card produk -->
        <div class="m-5 ">
            <div class="grid grid-cols-4 gap-4 pb-5">
                @for ($a = 0; $a <= 7; $a++)
                    <div class="card border-solid drop-shadow-lg rounded-lg bg-surface-500">
                        <img src="{{ asset('images/produk.png') }}" alt="img1" class=" rounded-lg">
                        <h5 class="card-title m-2">Hot Romance</h5>
                        <p class="m-2 flex justify-between">Rp.459.000 <span><i
                                    class=" text-primary-500  fa-solid fa-cart-shopping m-2"></i></span></p>
                    </div>
                @endfor
            </div>

        </div>

        <div class="flex justify-center mt-4 pb-5">
            <nav aria-label="Pagination">
                <ul class="inline-flex items-center">

                    <li>
                        <a href="#" class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600"
                            aria-label="Previous">
                            &laquo;
                        </a>
                    </li>


                    @for ($a = 1; $a <= 25; $a++)
                        @if ($a <= 3 || $a > 22)
                            <li>
                                <a href="#" class="px-4 py-2 text-gray-500  hover:bg-gray-200 hover:text-gray-600">
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
                        <a href="#" class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600"
                            aria-label="Next">
                            &raquo;
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

    <!-- section About Us -->
    <div class="mt-28 xl:mx-0 lg:mx-[185px]">
        <div class="grid grid-cols-2 gap-4">
            <div class=" m-5 ">
                <h3 class="text-4xl flex  mt-10 text-customeBlue font-bold">Menhadirkan Keindahan di Setiap Momen
                    Spesial
                </h3>
                <p class="mt-5 text-customeBlue">Yaya Flowers menyediakan bouquet bunga segar untuk berbagai acara
                    spesial,
                    seperti Hari Valentine, Hari Ibu, dan ulang tahun. Berdiri sejak 2022 di Jalan Diponegoro No. 114,
                    Klungkung, Bali, kami buka setiap hari pukul 08.00–20.00 WITA, kecuali pada hari raya besar Hindu.
                </p>
                <div class="mt-5">
                    <a href="{{ route('AboutUs') }}"
                        class="text-white  bg-primary-500 p-2  border border-solid rounded-md hover:bg-black hover:text-white">
                        Lihat Detail</a>
                </div>

            </div>
            <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2 overflow-hidden">

                <div>
                    <div class="bg-primary-500 w-full max-w-full h-[469px] rounded-lg drop-shadow-lg ">
                        <img src="{{ asset('images/image1.jpeg') }}" class="w-full h-full object-cover rounded-lg "
                            alt="image1">
                    </div>
                </div>


                <div class="me-5">
                    <div class="bg-primary-500 w-full max-w-full h-[300px] rounded-lg drop-shadow-lg ">
                        <img src="{{ asset('images/image2.jpeg') }}" class="w-full h-full object-cover rounded-lg"
                            width="200" alt="image2">
                    </div>

                    <div class="bg-primary-500 mt-4 w-full max-w-full h-[153px] rounded-lg drop-shadow-lg">
                        <img src="{{ asset('images/image3.jpeg') }}" class="w-full h-full object-cover rounded-lg"
                            width="200" alt="image3">
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- section galery -->
    <div class="xl:mx-0 lg:mx-[185px] mt-28 mb-10 bg-surface-700 ">
        <div class="flex justify-between m-5 pt-10 ">
            <div>
                <h3 class="text-4xl text-customeBlue font-bold">Galeri Keindahan Bunga</h3>
                <h3 class="text-4xl text-customeBlue font-bold">Kami</h3>
            </div>
            <div>
                <p class=" text-customeBlue">Temukan koleksi bouquet cantik yang telah kami siapkan untuk </p>
                <p class=" text-customeBlue">momen spesial Anda.</p>
                <div class="mt-3">
                    <a href="{{ route('Gallery') }}" class=" text-white rounded-md hover:bg-black bg-primary-500  p-2">Lihat
                        Semua</a>
                </div>

            </div>



        </div>

        <!-- gallery -->
        <div class="m-5 py-5">
            <div class=" mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 overflow-hidden">

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
    </div>

    <!-- section contact us -->
    <div class="mx-2 mt-11 mb-20 ">
        <div class="flex justify-between ">
            <div class="w-[604px] h-[373px]">
                <div class="text-[48px] font-bold font-playfair">Kami Siap Mendengar Dari Anda</div>

                <div class="mt-5">
                    <div class="text-[20px] font-playfair">Punya pertanyaan, masukan, atau butuh bantuan memilih membantu
                        Anda!</div>
                    <div class="text-[20px] font-playfair"> bouquet? Hubungi kami – kami dengan senang hati akan</div>
                    <div class="text-[20px] font-playfair">membantu Anda!</div>
                </div>

                <div class="mt-5 ">
                    <ul>
                        <li><i class="fa-regular fa-envelope text-customePurple"></i> Alamat Email : example@gmail.com</li>
                        <li><i class="fa-solid fa-phone text-customePurple"></i> Nomor Telepon : +123 45678910</li>
                        <li><i class="fa-regular fa-clock text-customePurple"></i> Jam Buka : Setiap Hari, 08.00 - 20.00
                        </li>
                    </ul>
                </div>



            </div>

            <div class=" border border-solid rounded-lg  w-[604px] h-[427px] ">
                <div class="mt-2">
                    <p class="text-[24px] font-bold font-playfair text-black p-5">Hubungi kami lewat formulir berikut: </p>
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        @if (session('success'))
                            <div class="text-center mx-6 rounded-lg p-1 bg-green-500 text-white">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="grid grid-cols-2 gap-2 m-5 drop-shadow-lg">
                            <div>
                                <input type="text" name="name" required
                                    class="w-full px-3 py-2 text-xs border rounded-lg border-black text-black"
                                    placeholder="Tulis Nama Lengkap Anda" />
                            </div>
                            <div>
                                <input type="email" name="email" required
                                    class="w-full px-3 py-2 text-xs border rounded-lg border-black text-black"
                                    placeholder="Tulis Alamat Email Anda" />
                            </div>
                        </div>

                        <div class="m-5">
                            <textarea name="message" rows="8" required
                                class="w-full px-3 py-2 text-xs border rounded-lg text-black border-black"
                                placeholder="Ceritakan kebutuhan atau pertanyaan Anda di sini."></textarea>
                        </div>

                        <div class="flex justify-center m-5">
                            <button type="submit" class="px-48 py-2 bg-primary-500 w-full text-white border rounded-lg">
                                Hubungi Kami
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
