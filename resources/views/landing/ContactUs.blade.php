@extends('layouts.landing')

@section('title', 'ContactUs')

@section('content')
    <div class="mx-2 mt-11 mb-52 ">
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
                    <p class="text-[24px] font-bold font-playfair text-black p-5">Hubungi kami lewat
                        formulir
                        berikut: </p>



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
