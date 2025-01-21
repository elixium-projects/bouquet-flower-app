<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productName = [
            "Bloom In Blue",
            "Royal Red",
            "Pamela",
            "Sunny Garden",
            "Bunch Of Love"
        ];

        foreach ($productName as $name) {
            Product::create([
                "category_id" => 1,
                "name" => $name,
                "stock" => 1,
                "description" => fake()->paragraph(),
                "price" => rand(100000, 1000000),
                "thumbnail" => "1736778355-WLMGWOABXkO2KQoPVtDOQVgPSOzILnZx3nnyOcxxTXpVnkzJBH.webp"
            ]);
        }
    }
}
