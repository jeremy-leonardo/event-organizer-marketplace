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
Route::post('/user/login', 'Auth\LoginController@loginUser');
Route::get('/vendor/login', 'Auth\LoginController@showVendorLogin')->name('vendorLoginPage');
Route::post('/vendor/login', 'Auth\LoginController@loginVendor');

// REGISTER
Route::get('/register', 'Auth\RegisterController@index')->name('registerPage');
Route::get('/user/register', 'Auth\RegisterController@showUserRegister')->name('registerUserPage');
Route::post('/user/register', 'Auth\RegisterController@createUser');
Route::get('/vendor/register', 'Auth\RegisterController@showVendorRegister')->name('registerVendorPage');
Route::post('/vendor/register', 'Auth\RegisterController@createVendor');

// LOGOUT
Route::get('/logout', 'Auth\LoginController@logout');

// PACKAGE
Route::get('/packages', 'PackageController@showAllPackages')->name('packagesPage');
Route::get('/vendor/packages', 'PackageController@showVendorPackages')->name('vendorPackagesPage');
Route::get('/package/create', 'PackageController@showCreatePackage')->name('createPackagePage');
Route::post('/package/create', 'PackageController@createPackage');
// Route::post('/vendor/packages', 'PackageController@showVendorPackages');
Route::get('/package/{package_id}', 'PackageController@showPackageDetail');
// Route::get('/package/{id}/edit', 'PackageController@showEditPackageDetail');
// Route::put('/package/{id}/edit', 'PackageController@editPackageDetail');

// BOOKING
Route::get('/booking/create', 'BookingController@showCreateBooking')->name('createBookingPage');
Route::post('/booking/create', 'BookingController@createBooking');
Route::get('/user/bookings', 'BookingController@showUserBookings')->name('userBookingsPage');
Route::get('/vendor/bookings', 'BookingController@showVendorBookings')->name('vendorBookingsPage');
Route::post('/booking-detail/create', 'BookingController@createBookingDetail');


// WIP -- FOR DEVELOPMENT PURPOSE
Route::get('/wip', function() { return view('booking.create');});