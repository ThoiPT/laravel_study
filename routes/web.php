<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\Shop;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // $shop = Shop::find(1);
    // $shop->products()->attach(['1','3']);

    // $product = Product::find(2);
    // $product->shops()->attach(['1','2']);

    // $shop = Shop::find(1);
    // $shop->products()->detach(['1','2','3']);
});

Route::get('/shop',[ShopController::class, 'index'])->name('shop.index'); // List of Shop
Route::post('/shop-new',[ShopController::class, 'store'])->name('shop.post'); // List of Shop

// Route::get('shop-add-product/{id}',[ShopController::class, 'addProduct'])->name('shop.add');
Route::get('shop-add-product/{idShop}',[ShopController::class, 'addProduct'])->name('shop.add_get');
Route::post('shop-add-product/{idShop}',[ShopController::class, 'storeProduct'])->name('shop.add_post');
Route::post('shop-delete-product/{idProduct}',[ShopController::class, 'deleteProduct'])->name('shop.delete_post');


Route::get('/product',[ProductController::class, 'index'])->name('product.index'); // List of Product
Route::post('/product-new',[ProductController::class, 'store'])->name('product.post');

