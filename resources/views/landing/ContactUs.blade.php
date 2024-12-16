@extends('layouts.landing')

@section('title', 'ContactUs')

@section('content')
    <div class="p-5 mt-11" id="hubungiKami">
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
                        <li><i class="fa-regular fa-envelope text-customePurple"></i> Alamat Email : example@gmail.com</li>
                        <li><i class="fa-solid fa-phone text-customePurple"></i> Nomor Telepon : +123 45678910</li>
                        <li><i class="fa-regular fa-clock text-customePurple"></i> Jam Buka : Setiap Hari, 08.00 - 20.00
                        </li>
                    </ul>
                </div>



            </div>
            <div class=" border border-solid rounded-lg mb-52 ">
                <p class="text-2xl font-bold text-black p-5">Hubungi kami lewat formulir berikut: </p>
                <form action="">
                    <div class="grid grid-cols-2 gap-2 m-5 drop-shadow-lg">
                        <div>
                            <input type="text" class="w-full px-3 py-2 text-xs border rounded-lg border-black text-black"
                                placeholder="Tulis Nama Lengkap Anda" />
                        </div>
                        <div>
                            <input type="text" class="w-full px-3 py-2 text-xs border rounded-lg border-black text-black"
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
