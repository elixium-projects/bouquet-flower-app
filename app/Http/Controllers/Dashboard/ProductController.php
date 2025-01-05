<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Traits\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use File;

    public function IndexPage()
    {
        $products = Product::with("category")->paginate(5);

        return view("dashboard.product.index", compact('products'));
    }

    public function CreatePage()
    {
        $categories = ProductCategory::all();

        return view("dashboard.product.create", compact('categories'));
    }

    public function CreateProduct(Request $request)
    {
        $validate = $request->validate([
            "thumbnail_product" => "file|mimes:png,jpg,jpeg|max:2048",
            "product_name" => "required|regex:/^[a-zA-Z0-9 ]+$/u",
            "description" => "required|min:10",
            "price" => "required",
            "product_size" => "required",
            "stock" => "required",
            "category" => "required"
        ]);

        if ($validate["thumbnail_product"]) {
            $pathName = $this->Upload($validate['thumbnail_product'], "images/thumbnail");

            if (!$pathName) {
                return redirect()->back()->WithError("Thumbnail gagal di upload");
            }
        }

        $price = (float) join("", explode(".", $validate["price"]));

        $create = Product::create([
            "category_id" => $validate["category"],
            "name" => $validate["product_name"],
            "description" => $validate["description"],
            "stock" => $validate["stock"],
            "price" => $price,
            "product_dimension" => $validate["product_size"],
            "thumbnail" => $pathName,
        ]);

        if (!$create) {
            return redirect()->back()->withError("Produk gagal ditambahkan");
        }

        return to_route("dashboard.product.index")->with("message", "Produk berhasil ditambahkan");
    }

    public function DeleteProduct(Product $product)
    {
        $thumbnailProduct = "images/thumbnail/" . $product->thumbnail;
        try {
            DB::beginTransaction();

            $product->delete();
            $isDeleted = $this->DeleteFile($thumbnailProduct);

            if (!$isDeleted) {
                throw new Exception("Failed delete image");
            }

            DB::commit();

            return response()->json([
                "message" => "Product removed"
            ], 200);
        } catch (\Exception $err) {
            DB::rollBack();
            return response()->json([
                "message" => "Failed remove product"
            ], 500);
        }
    }
}
