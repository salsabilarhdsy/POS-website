<?php

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
});

Route::get('/products', 'ProductController@products');
Route::get('/ListProducts', 'ListProductController@listProducts');
Route::get('/login', 'LoginController@index');
Route::get('/details', 'DetailsController@index');
Route::get('/newproduct', 'NewProductController@index');
Route::get('/editproduct/{id}', 'NewProductController@show');
Route::post('/editproduct_proses/{id}', 'NewProductController@editProduct');
Route::get('/deleteproduct_proses/{id}', 'NewProductController@deleteProduct');
Route::post('/newproduct_proses', 'NewProductController@store');
