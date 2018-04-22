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
    $cart = session('cart');
    return view('welcome', compact('cart'));
});

Route::resource('appetizers', 'AppetizerItemController')->middleware('admin');
Route::resource('drinks',  'DrinkItemController')->middleware('admin');;
Route::resource('desserts', 'DessertItemController')->middleware('admin');;
Route::resource('entrees', 'EntreeItemController')->middleware('admin');;
Route::resource('toppings', 'ToppingItemController')->middleware('admin');;
Route::resource('pizzas', 'PizzaTypeController')->middleware('admin');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/menu', 'OrderController@create')->name('orders.create');
Route::post('/orders', 'OrderController@store')->name('orders.store');

Route::post('/cart', 'HomeController@addToCart');
Route::get('/cart', 'HomeController@cart')->name('cart.index');
Route::post('/cart/removeitem', 'HomeController@cartRemove');
Route::get('cart/confirm','HomeController@cartConfirm')->name('cart.confirm');
Route::post('/cart/updatecart', 'HomeController@updateCart');
