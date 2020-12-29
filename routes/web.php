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

use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'products' => 'ProductsController'
]);

Route::get('/products/destroy/{id}', 'ProductsController@destroy');
Route::post('/products/update/{id}', 'ProductsController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/login', 'LoginController@login');

Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoriesController@index');
    Route::get('/create', 'CategoriesController@create');
    Route::post('/store', 'CategoriesController@store');
    Route::get('/{id}', 'CategoriesController@edit');
    Route::post('update', 'CategoriesController@update');
    Route::get('/delete/{id}', 'CategoriesController@delete');
});
