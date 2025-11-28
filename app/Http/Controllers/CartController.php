<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        $cart   = session()->get('cart', []);
        $total  = collect($cart)->sum('total');
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);
        $key = $product->id . '-' . $request->weight;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
            $cart[$key]['total'] = $cart[$key]['quantity'] * $cart[$key]['price'];
        } else {
            $cart[$key] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'weight' => $request->weight,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total' => $request->price * $request->quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'تمت إضافة المنتج إلى السلة!',
        //     'cart_count' => count($cart),
        // ]);

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Product added to cart',
        //     'cart_count' => count(session('cart', []))
        // ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart',
            'cart_count' => count(session('cart', []))
        ]);
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        $key = $request->product_key;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = $request->quantity;
            $cart[$key]['total'] = $cart[$key]['quantity'] * $cart[$key]['price'];
            session()->put('cart', $cart);
        }

        return response()->json([
            'status' => 'success',
            'total' => collect($cart)->sum('total'),
            'item_total' => $cart[$key]['total']
        ]);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->product_key]);
        session()->put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'total' => collect($cart)->sum('total'),
        ]);
    }

    // public function add(Request $request)
    // {
    //     $product    = Product::findOrFail($request->product_id);
    //     $cart       = session()->get('cart', []);
    //     $key        = $product->id . '-' . $request->weight;
    //     if (isset($cart[$key])) {
    //         $cart[$key]['quantity'] += $request->quantity;
    //         $cart[$key]['total']    = $cart[$key]['quantity'] * $cart[$key]['price'];
    //     } else {
    //         $cart[$key] = [
    //             'product_id'    => $product->id,
    //             'name'          => $product->name,
    //             'weight'        => $request->weight,
    //             'quantity'      => $request->quantity,
    //             'price'         => $request->price,
    //             'total'         => $request->price * $request->quantity,
    //             'image'         => $product->image,
    //         ];
    //     }
    //     session()->put('cart', $cart);
    //     return response()->json([
    //         'status'        => 'success',
    //         'message'       => 'Product added to cart successfully!',
    //         'cart_count'    => count($cart),
    //     ]);
    // }
}
