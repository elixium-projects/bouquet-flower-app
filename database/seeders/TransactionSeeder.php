<?php

namespace Database\Seeders;

use App\Models\cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->limit(5)->get();
        $products = Product::InRandomOrder()->limit(5)->get();
        $usedProductIds = [];

        $requestCart = [];
        $transactionRequest = [];
        $statues = [
            "Proses",
            "Selesai",
            "Dibatalkan",
        ];

        foreach ($users as $user) {
            $requestCart["user_id"] = $user->id;

            foreach ($products as $product) {
                // Skip the product if it has already been used
                if (in_array($product->id, $usedProductIds)) {
                    continue;  // Skip this iteration and move to the next product
                }

                // Mark this product as used
                $usedProductIds[] = $product->id;

                $requestCart["product_id"] = $product->id;
                $requestCart['quantity'] = 1;
                $transactionRequest["total"] = $product->price;
                $transactionRequest["tax"] = $product->price * 0.1;

                // Create the cart
                $cartCreated = Cart::create($requestCart);
                break;  // Exit the inner loop after creating one cart for the user
            }

            // Set the cart_id in the transaction request
            $transactionRequest["cart_id"] = $cartCreated["id"];
            $transactionRequest["payment_method"] = "Pembayaran Transfer";
            $transactionRequest["status"] = $statues[array_rand($statues)];

            // Create the transaction
            Transaction::create($transactionRequest);
        }
    }
}
