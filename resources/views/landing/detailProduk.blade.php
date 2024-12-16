@extends('layouts.landing')

@section('title', 'Detail Produk')

@section('content')

    <div class="m-5 mx-44">
        <div class="text-[40px] font-semibold mt-10">
            Detail Produk
        </div>

        <div class="mt-5 flex">
            <div class="grid grid-rows-3 w-[180px] gap-[12%]">
                <div class="bg-primary-500 rounded-lg w-full h-[150px] overflow-hidden"> <!-- Sesuaikan ukuran gambar -->
                    <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk">
                </div>

                <div class="bg-primary-500 rounded-lg w-full h-[150px] overflow-hidden">
                    <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk">
                </div>

                <div class=" bg-primary-500 rounded-lg w-full h-[150px] overflow-hidden">
                    <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 ms-10">
                <div>
                    <div class="bg-primary-500 rounded-lg w-[614px] h-[602px] overflow-hidden">
                        <img src="{{ asset('images/produk.png') }}" class="w-full h-full object-cover" alt="produk besar">
                    </div>
                </div>

                <div class="ms-32">
                    <h3 class="text-[48px] font-bold text-black">HOT</h3>
                    <h3 class="text-[48px] mt-4 font-bold text-black">Romance</h3>
                    <div>
                        <h3 class="text-[32px] mt-4 font-bold text-primary-500">Rp 459.000</h3>
                    </div>

                    <div class="mt-5 w-[496px] h-[84px]">
                        <p class="text-[20px]">Buket mawar merah dengan statice putih, melambangkan cinta sejati dan
                            ketulusan. Hadiah sempurna untuk menyampaikan perasaan tanpa kata.</p>
                    </div>

                    <div class="flex mt-8">
                        <div class="w-[157px] h-[98px] border border-primary-500 rounded-lg mt-2">
                            <div class=" text-black mt-2 text-center text-[20px] font-semibold pt-2">
                                Ukuran
                            </div>
                            <div class="text-center text-[16px]">
                                35 cm X 25 cm
                            </div>
                        </div>

                        <div class="w-[157px] h-[98px] border border-primary-500 rounded-lg m-2">
                            <div class=" text-black mt-2 text-center text-[20px] font-semibold pt-2">
                                Proses
                            </div>
                            <div class="text-center text-[16px]">
                                1-2 Hari Kerja
                            </div>
                        </div>

                        <div class="w-[157px] h-[98px] border border-primary-500 rounded-lg m-2">
                            <div class=" text-black mt-2 text-center text-[20px] font-semibold pt-2">
                                Pembungkus
                            </div>
                            <div class="text-center text-[16px]">
                                Kertas Premium
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between me-2 mt-8">
                        <div class="w-[170px] mt-1">
                            <div class="flex items-center space-x-2 border border-surface-700 rounded-lg justify-between">

                                <button
                                    class="bg-gray-200 text-gray-700 hover:bg-gray-300 bg-surface-700 px-4 py-2   rounded focus:outline-none"
                                    onclick="decrease()">
                                    &minus;
                                </button>

                                <span id="counter" class="text-gray-700 font-semibold w-12 text-center">
                                    0
                                </span>

                                <button
                                    class="bg-gray-200 text-gray-700 hover:bg-gray-300 bg-surface-700 px-4 py-2 rounded focus:outline-none"
                                    onclick="increase()">
                                    &#43;
                                </button>
                            </div>

                            <script>
                                let count = 0;

                                function updateCounter() {
                                    document.getElementById("counter").textContent = count;
                                }

                                function increase() {
                                    count++;
                                    updateCounter();
                                }

                                function decrease() {
                                    if (count > 0) count--;
                                    updateCounter();
                                }
                            </script>
                        </div>

                        <div class="w-[303px] h-[48px] bg-primary-500 text-center p-3 rounded-lg text-[16px] text-white">
                            <a href="">Tambah Ke Keranjang</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    </div>

@endsection
