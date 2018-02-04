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


Route::resource('lawyers','LawyersController');
Route::resource('companies','CompaniesController');
Route::resource('proposals','ProposalsController');
Route::resource('service-orders','Service_ordersController');