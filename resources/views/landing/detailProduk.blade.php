@extends('layouts.landing')

@section('title', 'Detail Produk')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="xl:mx-2 lg:mx-[185px] font-playfair">
        <div class="text-[40px] font-semibold mt-10">
            Detail Produk
        </div>

        <div class="flex mt-10 mb-20 w-[1,240px] h-[588px]">

            <div class="grid grid-rows-3 gap-5 w-full lg:w-[180px] me-10">
                @for ($a = 1; $a <= 3; $a++)
                    <div class="bg-primary-500 rounded-lg w-[180px] h-[180px] overflow-hidden">
                        <img src="{{ $product->thumbnailURL }}" class="w-full h-full object-cover" alt="Produk 1">
                    </div>
                @endfor
            </div>

            <div class="bg-primary-500 rounded-lg  w-[498px] h-[588px] overflow-hidden me-10">
                <img src="{{ $product->thumbnailURL }}" class="w-full h-full object-cover" alt="Produk besar">
            </div>

            <div class="w-[496px] h-[486px]">
                <h3 class="text-[48px] mt-4 font-bold text-black">{{ $product->name }}</h3>
                <h3 class="text-[32px] mt-4 font-bold text-primary-500">Rp.{{ $product->price }}</h3>

                <p class="mt-5 text-[20px]">
                    {{ $product->description }}
                </p>

                <div>
                    {{-- <div class="flex mt-8 gap-4">
                        <div class="w-[157px] h-[98px] border border-primary-500 rounded-lg p-2 text-center">
                            <p class="text-[20px] font-semibold">Ukuran</p>
                            <p class="text-[16px]">35 cm X 25 cm</p>
                        </div>
                        <div class="w-[157px] h-[98px] border border-primary-500 rounded-lg p-2 text-center">
                            <p class="text-[20px] font-semibold">Proses</p>
                            <p class="text-[16px]">1-2 Hari Kerja</p>
                        </div>
                        <div class="w-[157px] h-[98px] border border-primary-500 rounded-lg p-2 text-center">
                            <p class="text-[20px] font-semibold">Pembungkus</p>
                            <p class="text-[16px]">Kertas Premium</p>
                        </div>
                    </div> --}}

                    <div class="flex items-center mt-8">
                        @if (auth()->check())
                            <div class="flex items-center border border-surface-700 rounded-lg me-6">
                                <button type="button"
                                    class="bg-gray-200 px-6 py-2 text-gray-700 bg-surface-700 rounded-l focus:outline-none"
                                    onclick="decrease()">−</button>
                                <span id="counter" class="px-6 text-gray-700 text-center font-semibold">0</span>
                                <input type="hidden" id="maxStock" value="{{ $product->stock }}">
                                <button type="button"
                                    class="bg-gray-200 px-6 py-2 text-gray-700 bg-surface-700 rounded-r focus:outline-none"
                                    onclick="increase()">+</button>
                            </div>


                            <form action="{{ route('keranjangBelanja') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1" id="quantityField">
                                <input type="hidden" id="maxStock" value="{{ $product->stock }}">

                                <button type="submit"
                                    class="w-[303px] h-[48px] bg-primary-500 text-center p-3 rounded-lg text-[16px] text-white">
                                    Tambah Ke Keranjang
                                </button>
                            </form>
                        @else
                            <div
                                class="w-[303px] h-[48px] bg-primary-500 text-center p-3 rounded-lg text-[16px] text-white">
                                <a href="{{ route('login') }}"
                                    onclick="alert('Silakan login terlebih dahulu untuk menambah ke keranjang')">
                                    Tambah Ke Keranjang
                                </a>
                            </div>
                        @endif

                    </div>




                    <script>
                        let count = 1
                        const maxStock = parseInt(document.getElementById("maxStock").value);

                        function updateCounter() {
                            document.getElementById("counter").textContent = count;

                            document.getElementById('quantityField').value = count;
                        }

                        function increase() {
                            if (count < maxStock) {
                                count++;
                                updateCounter();
                            } else {
                                alert('Jumlah produk tidak boleh lebih dari stok yang tersedia (' + maxStock + ')');
                            }
                        }

                        function decrease() {
                            if (count > 1) { // Minimal 1
                                count--;
                                updateCounter();
                            }
                        }
                        updateCounter();
                    </script>
                </div>
            </div>
        </div>




    </div>
    </form>





@endsection
