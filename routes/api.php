<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::match(['get'], 'categories', 'CategoriesController@index');
Route::match(['get'], 'products', 'ProductController@index');
Route::match(['post'], 'products/create', 'ProductController@create');
Route::match(['get'], 'products/view/{product_id}', 'ProductController@create');

