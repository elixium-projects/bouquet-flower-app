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
                    <a href="">Kategori</a>
                </div>
                @foreach ($categories as $category)
                    <div class="text-[16px] mt-2 text-black hover:bg-primary-500 p-2 rounded-lg hover:text-white"
                        onclick="filterProducts('{{ $category->id }}')">
                        {{ $category->name }}
                    </div>
                @endforeach

            </div>
        </div>


        <!-- Content -->
        <div class="flex-1 bg-gray-100 p-5 mb-11">
            <div class="relative mt-1">
                <form id="search-form">
                    <input type="text" id="search-input"
                        class="border border-gray-300 rounded-md text-xs px-4 pl-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                        placeholder="Cari Bouquetmu">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 focus:outline-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-500 text-xs"></i>
                    </button>
                </form>
            </div>



            @if ($products->isEmpty())
                <p class="text-center text-black p-5 font-semibold">Produk tidak tersedia</p>
            @else
                <div class="mt-4 grid grid-cols-3 gap-2">

                    @foreach ($products as $product)
                        <div class="card border-solid drop-shadow-lg rounded-lg bg-surface-500 w-[286px] h-[428px] "
                            data-category="{{ $product->category_id }}">
                            <img src="{{ $product->thumbnailURL }}" alt="img1" class="rounded-lg w-[286px] h-[336px]">



                            <div class="flex justify-between">
                                <div>
                                    <h5 class="card-title m-2 text-[20px]">{{ $product->name }}</h5>
                                    <div>
                                        <p class="m-2 flex justify-between text-[20px]">{{ $product->price }}</p>
                                    </div>
                                </div>

                                <div
                                    class="bg-primary-500 m-2 mt-6 rounded-full w-[56px] h-[56px] flex items-center justify-center">
                                    <a href="{{ route('detailProduk', ['id' => $product->id]) }}"
                                        class="w-[24px] h-[24px] flex items-center justify-center">
                                        <i class="text-white fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>


                            </div>

                        </div>
                    @endforeach

                </div>
            @endif


            {{-- pagination --}}
            <div class="flex justify-center mt-10 pb-5">
                <nav aria-label="Pagination">
                    <ul class="inline-flex items-center">

                        <li>
                            <a href="{{ $products->previousPageUrl() }}"
                                class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600"
                                aria-label="Previous">
                                &laquo;
                            </a>
                        </li>

                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page <= 3 || $page > $products->lastPage() - 3)
                                <li>
                                    <a href="{{ $url }}"
                                        class="px-4 py-2 {{ $page == $products->currentPage() ? 'text-black bg-blue-500' : 'text-gray-500 hover:bg-gray-200 hover:text-gray-600' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @elseif ($page == 4 || $page == $products->lastPage() - 3)
                                <li>
                                    <span class="px-4 py-2 text-gray-500">...</span>
                                </li>
                            @endif
                        @endforeach

                        <li>
                            <a href="{{ $products->nextPageUrl() }}"
                                class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600"
                                aria-label="Next">
                                &raquo;
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>


        <script>
            function filterProducts(categoryId) {
                const products = document.querySelectorAll('.card');
                products.forEach((product) => {
                    if (categoryId === 'all' || product.dataset.category === categoryId) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }
        </script>


    </div>




@endsection
