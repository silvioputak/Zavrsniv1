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



//Route::view('/shop','shop');


Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');


Route::get('checkout','CheckoutController@index')->name('checkout.index');

Route::post('checkout','CheckoutController@store')->name('checkout.store');

Route::get('thankyou','ConfirmationController@index')->name('confirmation.index');

Route::group(['prefix' => 'admin'], function () {
  Voyager::routes();
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');





