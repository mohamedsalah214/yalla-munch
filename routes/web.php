<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('setLocale');

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/roasted-nuts', function () {
    request()->merge(['category' => 'roasted-nuts']);
    return app(ShopController::class)->index(request());
})->name('shop.roasted-nuts');

Route::get('/raw-nuts', function () {
    request()->merge(['category' => 'raw-nuts']);
    return app(ShopController::class)->index(request());
})->name('shop.raw-nuts');

Route::get('/crackers', function () {
    request()->merge(['category' => 'crackers']);
    return app(ShopController::class)->index(request());
})->name('shop.crackers');

Route::get('/seeds', function () {
    request()->merge(['category' => 'seeds']);
    return app(ShopController::class)->index(request());
})->name('shop.seeds');

Route::get('/candies', function () {
    request()->merge(['category' => 'candies']);
    return app(ShopController::class)->index(request());
})->name('shop.candies');

Route::get('/chocolates', function () {
    request()->merge(['category' => 'chocolates']);
    return app(ShopController::class)->index(request());
})->name('shop.chocolates');

Route::get('/healthy-range', function () {
    request()->merge(['category' => 'healthy-range']);
    return app(ShopController::class)->index(request());
})->name('shop.healthy-range');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/checkout/payment/{order}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/payment/{order}', [CheckoutController::class, 'processPayment'])->name('checkout.processPayment');

Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

Route::get('/cookie-guidelines', function () {
    return view('cookie-guidelines');
})->name('cookie-guidelines');

Route::get('/delivery-Information', function () {
    return view('delivery-Information');
})->name('delivery-Information');

Route::get('/returns-refunds', function () {
    return view('returns-refunds');
})->name('returns-refunds');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/terms-conditions', function () {
    return view('terms-conditions');
})->name('terms-conditions');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');
