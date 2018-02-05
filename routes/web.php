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
    return view('initial');
})->name('home');

Route::resource('lawyers','LawyersController');
Route::resource('companies','CompaniesController');
Route::resource('proposals','ProposalsController');
Route::resource('service_orders','Service_ordersController');

Route::get('create-order/{company}', 'Service_ordersController@create')->name('service_orders.create');
Route::get('show-order/{order}/{lawyer}', 'Service_ordersController@show_to_lawyer')->name('service_orders.show_to_lawyer');

Route::get('create-proposal/{order}/{lawyer}', 'ProposalsController@create')->name('proposals.create');
