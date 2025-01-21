<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



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


    public function addToCart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        if ($product->stock < $request->quantity) {
            return redirect()->back()->withError('Stok tidak mencukupi');
        }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);


        return redirect()->route('keranjangBelanja')->with('message', 'Produk berhasil ditambahkan ke keranjang');
    }


    public function keranjangBelanja()
    {
        $carts = Cart::with('products')
            ->where('user_id', auth()->id())
            ->get();

        // Hitung total harga
        $total = $carts->reduce(function ($carry, $cart) {
            return $carry + ($cart->quantity * $cart->products->price);
        }, 0);

        $cart_id = $carts->pluck('id')->toArray();

        return view('landing.keranjangBelanja', compact('carts', 'total', 'cart_id'));
    }


    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart || $cart->user_id !== auth()->id()) {
            return response()->json(['error' => 'Item tidak ditemukan atau akses ditolak'], 403);
        }

        $cart->delete();

        return redirect()->route('keranjangBelanja')->with('message', 'Data Produk Behasil Dihapus');
    }



    public function updateQuantity(Request $request, $id)
    {
        $cart = Cart::find($id);

        if (!$cart || $cart->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan atau akses ditolak.'], 403);
        }

        $newQuantity = $request->input('quantity');
        if ($newQuantity < 1 || $newQuantity > $cart->products->stock) {
            return response()->json(['success' => false, 'message' => 'Jumlah tidak valid.'], 400);
        }

        // Simpan perubahan
        $cart->quantity = $newQuantity;
        $cart->save();

        return response()->json(['success' => true, 'message' => 'Jumlah berhasil diperbarui.']);
    }






    public function showCart()
    {
        return view('landing.keranjangBelanja');
    }


    public function produkDisukai()
    {
        return view('landing.produkDisukai');
    }
}
