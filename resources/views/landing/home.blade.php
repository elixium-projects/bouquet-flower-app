@extends('layouts.landing')

@section('title', 'Boquent Flower')

@section('content')

    <!-- section hero -->
    <div class="grid grid-cols-3 gap-4 ">
        <div class="col-span-2">
            <img src="{{ asset('images/bg-branda.jpg') }}" width="800" height="560" alt="">
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
                <div class="me-2">
                    <button class="bg-primary-500 rounded-md hover:bg-black hover:text-white   text-white p-2 "
                        type="submit">
                        Pesan Sekarang</button>
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
    <div class=" p-5  bg-surface-700" id="produk">

        <div class="flex justify-between px-5">
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
            <div class="grid grid-cols-4 gap-4">
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

        <!-- section About Us -->
        <div class="p-5" id="tentangKami">
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
        <div class="p-5 mt-5 mb-10 bg-surface-700" id="galeri">
            <div class="flex justify-between m-5 ">
                <div>
                    <h3 class="text-4xl text-customeBlue font-bold">Galeri Keindahan Bunga</h3>
                    <h3 class="text-4xl text-customeBlue font-bold">Kami</h3>
                </div>
                <div>
                    <p class=" text-customeBlue">Temukan koleksi bouquet cantik yang telah kami siapkan untuk </p>
                    <p class=" text-customeBlue">momen spesial Anda.</p>
                    <div class="mt-3">
                        <a href="{{ route('Gallery') }}"
                            class=" text-white rounded-md hover:bg-black bg-primary-500  p-2">Lihat
                            Semua</a>
                    </div>

                </div>



            </div>

            <!-- gallery -->
            <div class="m-5 ">
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
                            <img src="{{ asset('images/bunga6.jpeg') }}" alt="img6"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-primary-500 w-full max-w-full h-[218px] mt-2">
                            <img src="{{ asset('images/bunga7.jpeg') }}" alt="img7"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <div>
                        <div class="bg-primary-500 w-full max-w-full h-[384px] mt-2">
                            <img src="{{ asset('images/bunga8.jpeg') }}" alt="img8"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-primary-500 w-full max-w-full h-[250px] mt-2">
                            <img src="{{ asset('images/bunga9.jpeg') }}" alt="img9"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-primary-500 w-full max-w-full h-[283px] mt-2">
                            <img src="{{ asset('images/bunga10.jpeg') }}" alt="img10"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <div>
                        <div class="bg-primary-500 w-full max-w-full h-[211px] mt-2">
                            <img src="{{ asset('images/bunga11.jpeg') }}" alt="img11"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-primary-500 w-full max-w-full h-[512px] mt-2">
                            <img src="{{ asset('images/bunga12.jpeg') }}" alt="img12"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-primary-500 w-full max-w-full h-[194px] mt-2">
                            <img src="{{ asset('images/bunga13.jpeg') }}" alt="img13"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- section contact us -->
        <div class="p-5 mt-5 " id="hubungiKami">
            <div class="flex justify-between m-5">
                <div>
                    <h3 class="text-4xl text-customeBlue font-bold">Kami Siap Mendengar Dari</h3>
                    <h3 class="text-4xl text-customeBlue font-bold">Anda</h3>

                    <div class="mt-5">
                        <p class="text-xs text-customeBlue ">Punya pertanyaan, masukan, atau butuh bantuan memilih membantu
                            Anda!</p>
                        <p class="text-xs text-customeBlue"> bouquet? Hubungi kami – kami dengan senang hati akan</p>
                        <p class="text-xs text-customeBlue">membantu Anda!</p>
                    </div>

                    <div class="mt-5 ">
                        <ul>
                            <li><i class="fa-regular fa-envelope text-customePurple"></i> Alamat Email : example@gmail.com
                            </li>
                            <li><i class="fa-solid fa-phone text-customePurple"></i> Nomor Telepon : +123 45678910</li>
                            <li><i class="fa-regular fa-clock text-customePurple"></i> Jam Buka : Setiap Hari, 08.00 -
                                20.00
                            </li>
                        </ul>
                    </div>



                </div>
                <div class=" border border-solid rounded-lg ">
                    <p class="text-2xl font-bold text-black p-5">Hubungi kami lewat formulir berikut: </p>
                    <form action="">
                        <div class="grid grid-cols-2 gap-2 m-5 drop-shadow-lg">
                            <div>
                                <input type="text"
                                    class="w-full px-3 py-2 text-xs border rounded-lg border-black text-black"
                                    placeholder="Tulis Nama Lengkap Anda" />
                            </div>
                            <div>
                                <input type="text"
                                    class="w-full px-3 py-2 text-xs border rounded-lg border-black text-black"
                                    placeholder="Tulis Alamat Email Anda" />
                            </div>
                        </div>

                        <div class="m-5">
                            <textarea rows="4" class="w-full px-3 py-2 text-xs border rounded-lg text-black border-black"
                                placeholder="Ceritakan kebutuhan atau pertanyaan Anda di sini."></textarea>
                        </div>

                        <div class=" flex justify-center  m-5">
                            <button type="submit" class="px-48 py-2 bg-primary-500 text-white border rounded-lg">
                                Hubungi Kami
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>


    @endsection
