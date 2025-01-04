<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function IndexPage()
    {
        return view("dashboard.product.index");
    }

    public function CreatePage()
    {
        return view("dashboard.product.create");
    }
}
