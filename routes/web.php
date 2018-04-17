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

Route::resource('appetizers', 'AppetizerItemController')->middleware('admin');
Route::resource('drinks',  'DrinkItemController')->middleware('admin');;
Route::resource('desserts', 'DessertItemController')->middleware('admin');;
Route::resource('entrees', 'EntreeItemController')->middleware('admin');;
Route::resource('toppings', 'ToppingItemController')->middleware('admin');;
Route::resource('pizzas', 'PizzaTypeController')->middleware('admin');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/orders/create', 'OrderController@create')->name('orders.create');
