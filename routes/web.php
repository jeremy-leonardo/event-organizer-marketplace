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

// HOME
Route::get('/', 'HomeController@index')->name('homePage');

// LOGIN
Route::get('/login', 'Auth\LoginController@index')->name('loginPage');
Route::get('/user/login', 'Auth\LoginController@showUserLogin')->name('userLoginPage');
Route::post('/user/login', 'Auth\LoginController@login');
Route::get('/organizer/login', 'Auth\LoginController@showOrganizerLogin')->name('organizerLoginPage');
Route::post('/organizer/login', 'Auth\LoginController@login');

// REGISTER
Route::get('/register', 'Auth\RegisterController@index')->name('registerPage');
Route::get('/user/register', 'Auth\RegisterController@showUserRegister')->name('registerUserPage');
Route::post('/user/register', 'Auth\RegisterController@createUser');
Route::get('/organizer/register', 'Auth\RegisterController@showOrganizerRegister')->name('registerOrganizerPage');
Route::post('/organizer/register', 'Auth\RegisterController@createOrganizer');

// LOGOUT
Route::get('/logout', 'Auth\LoginController@logout');