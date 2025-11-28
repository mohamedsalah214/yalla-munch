<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء منتجات وهمية
        if (Category::count() == 0) {
            $this->call(CategorySeeder::class);
        }

        Product::factory(50)->create(); // هيعمل 50 منتج عشوائي
    }
}
