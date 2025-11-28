<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $nameEn = $this->faker->word();
        $nameAr = 'تصنيف ' . fake('ar_SA')->word();

        return [
            'name' => [
                'en' => ucfirst($nameEn),
                'ar' => $nameAr
            ],
            'slug' => Str::slug($nameEn),
        ];
    }
}
