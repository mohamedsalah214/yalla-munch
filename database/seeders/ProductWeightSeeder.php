<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductWeight;

class ProductWeightSeeder extends Seeder
{
    public function run(): void
    {
        $weights = [
            ['label' => '100g', 'price_factor' => 0.8],
            ['label' => '250g', 'price_factor' => 1],
            ['label' => '500g', 'price_factor' => 1.8],
            ['label' => '1kg',  'price_factor' => 3.5],
        ];

        $products = Product::all();

        foreach ($products as $product) {
            foreach ($weights as $weight) {
                ProductWeight::create([
                    'product_id' => $product->id,
                    'label'      => $weight['label'],
                    'price'      => round($product->price * $weight['price_factor'], 2),
                ]);
            }
        }
    }
}
