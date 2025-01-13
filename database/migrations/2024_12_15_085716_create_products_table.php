<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("categories", function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->references("id")->on("categories");
            $table->string("name");
            $table->string("slug");
            $table->longText("description");
            $table->decimal("price");
            $table->integer("stock")->default(0);
            $table->string("thumbnail");
            $table->enum("status", ["active", "inactive"]);
            $table->timestamps();
        });

        Schema::create("carts", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users");
            $table->foreignId("product_id")->references("id")->on("products");
            $table->integer("quantity")->default(1);
        });


        Schema::create("transactions", function (Blueprint $table){
            $table->id();
            $table->foreignId("cart_id")->references("id")->on("carts");
            $table->decimal("tax");
            $table->decimal("total");
            $table->string("payment_method");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
