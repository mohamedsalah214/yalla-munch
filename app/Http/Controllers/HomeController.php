<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // المنتجات الجديدة أو المميزة
        $latestProducts = Product::latest()->take(10)->get();

        // التصنيفات الأساسية
        $categories = Category::withCount('products')->get();

        return view('home', compact('latestProducts', 'categories'));
    }
}
