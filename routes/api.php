<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//register and login 

Route::post('/register',[LoginController::class,'register']); 

Route::post('/login',[LoginController::class,'login']);


Route::group(['middleware' => 'auth:api'], function(){
    
    
    Route::get('categorys',[ProductController::class,'getCategoryList']);
    Route::get('products',[ProductController::class,'getProductList']);
    Route::get('category/{id}',[ProductController::class,'getCategory']);
    Route::post('add-product',[ProductController::class,'addProduct']);
    Route::get('user-cart',[ProductController::class,'userCart']);
    
 });