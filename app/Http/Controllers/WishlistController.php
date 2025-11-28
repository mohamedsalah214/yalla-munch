<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function toggle(Request $request)
    {
        $id = $request->product_id;

        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);

            return response()->json([
                'status' => 'removed',
                'message' => 'Removed from wishlist'
            ]);
        }

        $wishlist[$id] = true;
        session()->put('wishlist', $wishlist);

        return response()->json([
            'status' => 'added',
            'message' => 'Added to wishlist'
        ]);
    }
}
