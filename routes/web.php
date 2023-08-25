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
// Backend Routing
Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('dasboard', 'DasboardController@index')->name('dasboard');
        Route::resource('categories', CategoriesController::class);
        Route::resource('product', productController::class);
    }
);



Route::get('/home', 'HomeController@index')->name('home');
