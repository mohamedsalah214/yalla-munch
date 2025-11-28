<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'مكسرات', 'slug' => 'nuts'],
            ['name' => 'لب', 'slug' => 'seeds'],
            ['name' => 'مقرمشات', 'slug' => 'snacks'],
            ['name' => 'شوكولاتة', 'slug' => 'chocolate'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
