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




Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'home'
]);

Route::get('/shirts', [
   'uses' => 'FrontController@shirts',
    'as' => 'shirts'
]);

Route::get('/shirt', [
   'uses' => 'FrontController@shirt',
    'as' => 'shirt'
]);


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
   Route::get('/', function(){
       return view('admin.index');
   })->name('admin.index');

    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');
});


