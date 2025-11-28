<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $nameEn = $this->faker->words(2, true);
        $nameAr = 'منتج ' . fake('ar_SA')->words(2, true);
        $price = $this->faker->numberBetween(20, 200);

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'name' => [
                'en' => ucfirst($nameEn),
                'ar' => $nameAr,
            ],
            'description' => [
                'en' => $this->faker->sentence(),
                'ar' => fake('ar_SA')->sentence(),
            ],
            'price' => $price,
            'discount_price' => $this->faker->boolean(50) ? $price - rand(5, 20) : null,
            'image' => 'products/sample-' . rand(1, 5) . '.jpg',
            'slug' => Str::slug($nameEn) . '-' . rand(1000, 9999),
        ];
    }
}
