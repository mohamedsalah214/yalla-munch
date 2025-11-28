<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(Request $request)
    {

        $query = Product::query()->with('category');

        $requestCategory = NULL;

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
            $requestCategory = $request->category;
        }

        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $products   = $query->paginate(12);

        $categories = Category::all();
        // dd($request->category);

        return view('shop.index', compact('products', 'categories', 'requestCategory'));
    }

    public function show($slug)
    {
        // $product    = Product::with('weights')->where('slug', $slug)->firstOrFail();
        $product    = Product::where('slug', $slug)->with('category')->firstOrFail();
        $products   = Product::latest()->take(10)->get();
        // dd($weights->weights);
        return view('shop.show', compact('product', 'products'));
    }
}
