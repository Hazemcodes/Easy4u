<?php

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



Route::get('/','App\Http\Controllers\HomeController@index')->name('index');
Route::get('/index','App\Http\Controllers\HomeController@index')->name('index');
//Route::get('/livewire','App\Http\Controllers\HomeController@livewire')->name('livewire');


Route::get('post', 'App\Http\Controllers\HomeController@post')->name('post');



Route::get('/home-02','App\Http\Controllers\HomeController@home_02')->name('home_02');
Route::get('/home-03','App\Http\Controllers\HomeController@home_03')->name('home_03');

Route::get('/login-user','App\Http\Controllers\UserController@show')->name('login-user');
Route::post('/login-user','App\Http\Controllers\UserController@login_user')->name('login-user');

Route::get('/seller-login','App\Http\Controllers\SellerController@index')->name('seller-login');
Route::post('/seller-login','App\Http\Controllers\SellerController@seller_login')->name('seller-login');

Route::get('/admin-login','App\Http\Controllers\AdminController@index')->name('admin-login');
Route::post('/admin-login','App\Http\Controllers\AdminController@admin_login')->name('admin-login');

Route::get('logout','App\Http\Controllers\HomeController@logout')->name('logout');

Route::get('/register','App\Http\Controllers\UserController@register')->name('register');
Route::post('/register','App\Http\Controllers\UserController@store')->name('register');

Route::get('/seller-register','App\Http\Controllers\SellerController@register')->name('seller-register');
Route::post('/seller-register','App\Http\Controllers\SellerController@store')->name('seller-register');

Route::get('/about','App\Http\Controllers\PageController@about')->name('about');


Route::get('/addNewProduct','App\Http\Controllers\ProductController@index')->name('addNewProduct');
Route::post('/addNewProduct','App\Http\Controllers\ProductController@create')->name('addNewProduct');

Route::get('/product','App\Http\Controllers\PageController@product')->name('product');

Route::get('/edit-prod/{id}','App\Http\Controllers\ProductController@edit')->name('edit-prod');
Route::get('/delete-prod/{id}','App\Http\Controllers\ProductController@delete')->name('delete-prod');
Route::put('/update-product/{id}','App\Http\Controllers\ProductController@update')->name('update-product');

Route::get('/contact','App\Http\Controllers\PageController@contact')->name('contact');

Route::get('/product/{id}','App\Http\Controllers\PageController@product_detail')->name('product_detail');

Route::get('/shoping-cart','App\Http\Controllers\PageController@shoping_cart')->name('shoping_cart');

Route::post('/cart', 'App\Http\Controllers\CartController@addToCart')->name('cart.store');

Route::get('/remove/{rowId}', 'App\Http\Controllers\CartController@removeCart')->name('cart.remove');



Route::post('/update-cart', 'App\Http\Controllers\CartController@updateCart')->name('cart.update');

Route::post('/clear', 'App\Http\Controllers\CartController@clearAllCart')->name('cart.clear');



Route::get('/admin','App\Http\Controllers\AdminController@create') -> name('admin');

Route::get('/seller','App\Http\Controllers\SellerController@create') -> name('seller');

