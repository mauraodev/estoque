<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('company_token')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', 'Api\\ProductsController@index');
        Route::get('/{id}', 'Api\\ProductsController@show');
        Route::post('/', 'Api\\ProductsController@store');
        Route::put('/{id}', 'Api\\ProductsController@update');
        Route::delete('/{id}', 'Api\\ProductsController@destroy');
    });

    Route::prefix("categories")->group(function () {
        Route::get("/", "Api\\CategoriesController@index");
    });
});
