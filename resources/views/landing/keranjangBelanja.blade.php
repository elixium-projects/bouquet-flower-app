@extends('layouts.landing')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="xl:mx-2 lg:mx-[185px]">

        <div class="text-[40px] mt-5">
            Keranjang Belanja
        </div>

        <div class=" grid grid-cols-3 gap-2">

            <div class="col-span-2 flex  mx-2 mt-5  w-[848px] h-[270px]">
                <table class="table-auto">
                    <thead>
                        <tr class="text-second text-left text-[16px] bg-gray-100">
                            <th class="px-7 py-2">Produk</th>
                            <th class="px-4 py-2">Kuantiti</th>
                            <th class="px-4 py-2">Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @for ($a = 1; $a <= 3; $a++)
                            <tr class="border-b">
                                <!-- Produk -->
                                <td class="">
                                    <div class="flex items-center space-x-4">
                                        <input type="checkbox" id="terms_{{ $a }}" class="">
                                        <img src="{{ asset('images/produk.png') }}" class="w-[66px] h-[55px]"
                                            alt="Produk">
                                        <div class="w-[322px] h-[54px]">
                                            <div class="text-[20px] font-semibold">HOT Romance</div>
                                            <div class="w-[322px] h-[22px] grid grid-cols-3 gap-1 space-x-1">
                                                <div class="list-disc text-[16px] w-[109px] h-[22px] ">Bouque Bunga</div>
                                                <div class="list-disc text-[16px] ">35CmX25Cm</div>
                                                <div class="list-disc text-[16px] ">1-2 Hari Kerja</div>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <!-- Kuantiti -->
                                <td class="px-4 py-2 ">
                                    <div class="flex items-center justify-between w-[170px] h-[40px] ">
                                        <button
                                            class="bg-gray-200 text-gray-700 bg-surface-700 px-4 py-2 w-[60px] h-[40px]  rounded focus:outline-none"
                                            onclick="decrease({{ $a }})">
                                            &minus;
                                        </button>
                                        <span id="counter_{{ $a }}"
                                            class="text-gray-700 font-semibold w-12 text-center">
                                            0
                                        </span>
                                        <button
                                            class="bg-gray-200 text-gray-700 bg-surface-700 px-4 py-2 w-[60px] h-[40px] rounded focus:outline-none"
                                            onclick="increase({{ $a }})">
                                            &#43;
                                        </button>
                                    </div>
                                </td>

                                <!-- Harga -->
                                <td class="px-4 py-2 text-center">
                                    Rp 459.000
                                </td>

                                <!-- Aksi -->
                                <td class="px-4 py-2 text-center">
                                    <i class="fa-solid fa-trash cursor-pointer text-red-500 text-[24px]"
                                        onclick="removeRow(this)"></i>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <script>
                function updateCounter(rowId, count) {
                    document.getElementById(`counter_${rowId}`).textContent = count;
                }

                function increase(rowId) {
                    const counter = document.getElementById(`counter_${rowId}`);
                    let count = parseInt(counter.textContent);
                    count++;
                    updateCounter(rowId, count);
                }

                function decrease(rowId) {
                    const counter = document.getElementById(`counter_${rowId}`);
                    let count = parseInt(counter.textContent);
                    if (count > 0) {
                        count--;
                    }
                    updateCounter(rowId, count);
                }

                function removeRow(element) {
                    element.closest('tr').remove();
                }
            </script>


            <div class="border rounded-lg w-[358px] h-[165px] mt-10 mb-72 ms-10 ">
                <div class="flex justify-between m-5">
                    <div class="text-[16px] text-second">
                        Total Semua
                    </div>
                    <div class="text-[24px] font-semibold">
                        Rp 459.000
                    </div>
                </div>

                <div class="rounded-lg bg-primary-500 m-5 text-center p-2 text-white">
                    <a href="">Bayar Sekarang</a>
                </div>

            </div>
        </div>


    </div>
@endsection
