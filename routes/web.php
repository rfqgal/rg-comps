<?php

use App\Http\Controllers\ProductController;
use App\Models\Products;
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
    $products = Products::all();    
    return view('dashboard', ['products' => $products]);
});

Route::get('/products', function () {
    $products = Products::all();    
    return view('products', ['products' => $products]);
});
