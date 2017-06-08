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

// Routes for user registration, login, logout, and password reset
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function () {
//    return view('welcome');
//});
