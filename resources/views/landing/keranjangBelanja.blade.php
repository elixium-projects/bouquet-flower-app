@extends('layouts.landing')

@section('title', 'Keranjang Belanja')

@section('content')

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="xl:mx-2 lg:mx-[185px] mb-24">

        <div class="text-[40px] mt-5">
            Keranjang Belanja
        </div>

        <div class=" grid grid-cols-3 gap-2">

            <div class="col-span-2 flex  mx-2 mt-5  w-[848px] h-[270px]">
                <table class="table-auto">
                    <thead>
                        <tr class="text-second text-left text-[16px]">
                            <th class="px-7 py-2">Produk</th>
                            <th class="px-4 py-2">Kuantiti</th>
                            <th class="px-4 py-2">Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr class="border-b">
                                <!-- Produk -->
                                <td class="">

                                    <div class="flex items-center space-x-4">
                                        <input type="checkbox" id="" class="">
                                        <img src="{{ $cart->products->thumbnailURL }}" class="w-[66px] h-[55px]"
                                            alt="Produk">
                                        <div class="w-[322px] h-[54px]">
                                            <div class="text-[20px] font-semibold"> {{ $cart->products->name }}</div>

                                        </div>
                                    </div>
                                </td>

                                <!-- Kuantiti -->
                                <td class="px-4 py-2">
                                    <div class="flex items-center border border-surface-700 rounded-lg me-6">
                                        <button type="button"
                                            class="bg-gray-200 px-6 py-2 text-gray-700 bg-surface-700 rounded-l focus:outline-none"
                                            onclick="decrease({{ $cart->id }})">−</button>
                                        <span id="counter-{{ $cart->id }}"
                                            class="px-6 text-gray-700 text-center font-semibold">{{ $cart->quantity }}</span>
                                        <input type="hidden" id="maxStock-{{ $cart->id }}"
                                            value="{{ $cart->products->stock }}">
                                        <button type="button"
                                            class="bg-gray-200 px-6 py-2 text-gray-700 bg-surface-700 rounded-r focus:outline-none"
                                            onclick="increase({{ $cart->id }})">+</button>
                                    </div>
                                </td>



                                <!-- Harga -->
                                <td class="px-4 py-2 text-center">
                                    {{ $cart->products ? number_format($cart->products->price * $cart->quantity, 0, ',', '.') : '-' }}
                                </td>

                                <!-- Aksi -->
                                <td class="px-4 py-2 text-center">
                                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="fa-solid fa-trash cursor-pointer text-red-500 text-[24px]"></button>
                                    </form>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="border rounded-lg w-[358px] h-[165px] mt-10 mb-72 ms-10 ">
                <div class="flex justify-between m-5">
                    <div class="text-[16px] text-second">
                        Total Semua
                    </div>
                    <div class="text-[24px] font-semibold">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </div>
                </div>

                @isset($cart)
                    <div class="rounded-lg bg-primary-500 m-5 text-center p-2 text-white">
                        <button onclick="payNow()" id="BayarSekarang" data-id="{{ $cart->id }}">Bayar Sekarang</button>
                    </div>
                @endisset

            </div>

            <script>
                function payNow() {
                    fetch('/payment/process', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                total: {{ $total }}
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.snapToken) {
                                snap.pay(data.snapToken, {
                                    onSuccess: function(result) {
                                        const request = {
                                            "payment_type": result.payment_type,
                                            "order_id": document.getElementById("BayarSekarang").getAttribute(
                                                "data-id"),
                                            "gross_amount": result.gross_amount,
                                            "transaction_status": result.transaction_status,
                                        };

                                        fetch('/payment/paymentCallback', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': document.querySelector(
                                                            'meta[name="csrf-token"]')
                                                        .getAttribute('content')
                                                },
                                                body: JSON.stringify(request)
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                console.log(data);
                                            })
                                            .catch(error => console.error('Error:', error));

                                        alert('Pembayaran berhasil!');
                                        console.log(result);
                                    },
                                    onPending: function(result) {
                                        alert('Menunggu pembayaran!');
                                        console.log(result);
                                    },
                                    onError: function(result) {
                                        alert('Pembayaran gagal!');
                                        console.log(result);
                                    }
                                });
                            } else {
                                console.error(data.error);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }





                function updateCounter(cartId, newCount) {
                    document.getElementById(`counter-${cartId}`).textContent = newCount;
                }

                function increase(cartId) {
                    console.log('Increase button clicked for cart ID:', cartId);
                    const maxStock = parseInt(document.getElementById(`maxStock-${cartId}`).value, 10);
                    const currentCount = parseInt(document.getElementById(`counter-${cartId}`).textContent, 10);

                    if (currentCount < maxStock) {
                        const newCount = currentCount + 1;
                        updateCounter(cartId, newCount);
                        updateQuantity(cartId, newCount);
                    } else {
                        alert(`Jumlah produk tidak boleh lebih dari stok yang tersedia (${maxStock})`);
                    }
                }

                function decrease(cartId) {
                    console.log('Decrease button clicked for cart ID:', cartId);
                    const currentCount = parseInt(document.getElementById(`counter-${cartId}`).textContent, 10);

                    if (currentCount > 1) { // Minimal 1
                        const newCount = currentCount - 1;
                        updateCounter(cartId, newCount);
                        updateQuantity(cartId, newCount);
                    } else {
                        alert('Jumlah produk tidak boleh kurang dari 1.');
                    }
                }

                function updateQuantity(cartId, newQuantity) {
                    console.log(cartId);
                    fetch(`/cart/update-quantity/${cartId}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                quantity: newQuantity
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) {
                                alert(data.message || 'Terjadi kesalahan saat memperbarui jumlah.');
                                updateCounter(cartId, data.previousQuantity); // Kembalikan ke nilai sebelumnya jika gagal
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat menghubungi server.');
                        });

                }
            </script>



        </div>


    </div>
@endsection
