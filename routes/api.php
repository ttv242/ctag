<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web', 'api', StartSession::class])->group(function () {
    // Các route API của bạn
    Route::get('/cart/get', [CartsController::class, 'getItemToCart'])->name('api.cart.get');
    Route::post('/cart/add', [CartsController::class, 'addItemToCart'])->name('api.cart.add');
    Route::put('/cart/update', [CartsController::class, 'updateAmountItem'])->name('api.cart.update');
    Route::post('/cart/delete', [CartsController::class, 'deleteItemToCart'])->name('api.cart.delete');

    Route::get('/categories/get', [ApiController::class, 'getCategories'])->name('api.categories.get');
    Route::get('/subcategories/get', [ApiController::class, 'getSubcategories'])->name('api.subcategories.get');
    Route::get('/brands/get', [ApiController::class, 'getBrands'])->name('api.brands.get');
    Route::get('/featured/brands/get', [ApiController::class, 'getFeaturedBrands'])->name('api.featured.brands.get');
    Route::get('/products/get', [ApiController::class, 'getProducts'])->name('api.products.get');
    Route::get('/featured/products/get', [ApiController::class, 'getFeaturedProducts'])->name('api.featured.products.get');
    Route::get('/monthlyOffer/products/get', [ApiController::class, 'getMonthlyOfferProducts'])->name('api.monthlyOffer.products.get');
    Route::get('/best/seller/get', [ApiController::class, 'getBestSeller'])->name('api.best.seller.get');
    Route::get('/sale/get', [ApiController::class, 'getSale'])->name('api.sale.get');
    Route::get('/views/get', [ApiController::class, 'getViews'])->name('api.views.get');

    Route::get('/clear/data/json/get', [ApiController::class, 'clearDataJson'])->name('api.clear.data.json.get');
    Route::get('/home/get', [ApiController::class, 'getHome'])->name('api.home.get');
    Route::get('/shop/get', [ApiController::class, 'getShop'])->name('api.shop.get');
});
