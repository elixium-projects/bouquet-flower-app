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
            "thumbnail_product" => "file|mimes:png,jpg,jpeg,webp|max:2048",
            "product_name" => "required|regex:/^[a-zA-Z0-9 ]+$/u",
            "description" => "required|min:10",
            "price" => "required",
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

    public function EditPage(Product $product)
    {
        $categories = ProductCategory::all();
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

    public function UpdateProduct(Request $request, Product $product)
    {
        $validate = $request->validate([
            "thumbnail_product" => "max:2048",
            "product_name" => "required|regex:/^[a-zA-Z0-9 ]+$/u",
            "description" => "required|min:10",
            "price" => "required",
            "stock" => "required",
            "category" => "required"
        ]);

        $price = (float) join("", explode(".", $validate["price"]));

        $requestData = [
            "category_id" => $validate["category"],
            "name" => $validate["product_name"],
            "description" => $validate["description"],
            "stock" => $validate["stock"],
            "price" => $price,
        ];

        try {
            if ($request->hasFile("thumbnail_product")) {
                $oldProductURL = "images/thumbnail/" . $request->file("thumbnail_product");
                $requestData["thumbnail"] = $this->Upload($request->file("thumbnail_product"), "images/thumbnail");
                $this->DeleteFile($oldProductURL);
            }

            $product->update($requestData);

            return to_route("dashboard.product.index")->with("message", "Berhasil memperbaharui produk");
        } catch (\Exception $err) {
            return redirect()->back()->withError("Gagal memperbaharui data produk");
        }
    }
}
