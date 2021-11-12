<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebFrontend\AboutController;
use App\Http\Controllers\WebFrontend\ProductController;
use Illuminate\Support\Facades\Route;

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
    $products = [11,2,3,4,5,6,7,8];
    return view('welcome')->with([
        'data'=>$products
    ]);
});

// Route::get('about', [AboutController::class,'aboutPage'])->middleware('testMw');
Route::get('about', [AboutController::class,'aboutPage'])->name('website.about');

Route::get('/contact',[ContactController::class,'contactPage']);

Route::get('/shop', function () {
    return view('shops.shop');
});

Route::get('/products', [ProductController::class,'productList']);

Route::get('/products/{product_id}', [ProductController::class,'productDetail'])->name('website.product-detail');

Route::get('/products/{product_id}/shop/{shop_id}', [ProductController::class,'productPage']);

Route::post('api/promotions', [Controller::class,'showPromotions']);
