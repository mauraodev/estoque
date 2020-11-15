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

Route::get('/produtos', 'ProductsController@index')->middleware('nosso-middleware');

Route::get('/produtos/mostra/{id}', 'ProductsController@mostra');

Route::get('/produtos/novo', 'ProductsController@novo');

Route::post('/produtos/adiciona', 'ProductsController@adiciona');

Route::get('/produtos/json', 'ProductsController@json');

Route::get('/produtos/remove/{id}', 'ProductsController@remove');

Route::get('/produtos/editar/{id}', 'ProductsController@editar');

Route::post('/produtos/store', 'ProductsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/login', 'LoginController@login');

Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoriesController@index');
    Route::get('/create', 'CategoriesController@create');
    Route::post('/store', 'CategoriesController@store');
    Route::get('/delete/{id}', 'CategoriesController@delete');
});
