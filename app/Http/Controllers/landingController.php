<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingController extends Controller
{

    public function home()
    {
        return view('landing.home');
    }

    public function Produk()
    {
        return view('landing.Produk');
    }

    public function AboutUs()
    {
        return view('landing.AboutUs');
    }

    public function Gallery()
    {
        return view('landing.Gallery');
    }

    public function ContactUs()
    {
        return view('landing.ContactUs');
    }

    public function detailProduk()
    {
        return view('landing.detailProduk');
    }
}
