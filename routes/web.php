<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesDetail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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
    $sales = Sale::select()->orderByDesc('date')->take(10)->get();
    return view('dashboard', ['sales' => $sales]);
});

Route::get('/products', function () {
    $products = Product::all();    
    return view('products', ['products' => $products]);
});

Route::get('/sales', function () {
    // $sales = Sale::paginate(15);
    $sales = Sale::select()->orderByDesc('date')->get();
    return view('sales', ['sales' => $sales]);
});

Route::get('/sales/{id}', function ($id) {
    $sales_detail = DB::table('sales_details as t1')
        ->join('products as t2', 't1.product_code', '=', 't2.code')
        ->join('sales as t3', 't1.sale_id', '=', 't3.id')
        ->select('t1.*', 't2.id as product_id', 't2.name',
            't3.buyer', 't3.buyer_address')
        ->where('t3.id', $id)
        ->get();
        
    return view('sales.detail', [
        'sales_id' => $id,
        'sales_detail' => $sales_detail
    ]);
});
