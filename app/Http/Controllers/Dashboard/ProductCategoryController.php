<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function CreateCategory(Request $request)
    {
        $validate = $request->validate([
            "category_name" => "required|unique:categories,name"
        ]);

        $create = ProductCategory::create([
            "name" => $validate["category_name"]
        ]);

        if (!$create) {
            return redirect()->back()->withError("Category gagal ditambahkan");
        }

        return redirect()->back()->with("message", "Category berhasil ditambahkan");
    }

    public function DeleteCategory(ProductCategory $category)
    {
        try {
            $category->delete();

            return redirect()->back()->with("message", "Category berhasil dihapus");
        } catch (Exception $err) {
            return redirect()->back()->withError("Category gagal dihapus");
        }
    }
}
