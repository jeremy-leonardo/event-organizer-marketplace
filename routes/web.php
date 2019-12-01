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

// Route::get('/welcome', function () {return view('welcome');});
Route::get('/', 'HomeController@index')->name('homePage');
Route::get('/login', 'Auth\LoginController@index')->name('loginPage');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register/user', 'Auth\RegisterUserController@index')->name('registerUserPage');
Route::post('/register/user', 'Auth\RegisterUserController@create');