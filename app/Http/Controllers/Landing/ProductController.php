<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\File;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        $categories = ProductCategory::all();
        return view('landing.Produk', compact('categories','products'));
    }

    public function productHome()
    {
        $products = Product::paginate(6);
        $categories = ProductCategory::all();
        return view('landing.home', compact('categories', 'products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('landing.detailProduk', compact('product'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->get('query');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();

        return response()->json($products);
    }



}
