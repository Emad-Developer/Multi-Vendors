<?php

use App\Activity;
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

Route::get('/', function () {
    return view('welcome');
});

Route :: middleware('isLogin')->group(function(){
    // Create Activity
    Route::get('/activities/create','ActivityController@create')->name('create_activity');
    Route::post('/activities/store','ActivityController@store')->name('store_activity');

    // Update Activity
    Route::get('/activities/edit/{id}','ActivityController@edit')->name('edit_activity');
    Route::post('/activities/update/{id}','ActivityController@update')->name('update_activity');

    // Delete Activity
    Route::get('/activities/delete/{id}','ActivityController@delete')->name('delete_activity');

    // Create Seller
    Route::get('/sellers/create','SellerController@create')->name('create_seller');
    Route::post('/sellers/store','SellerController@store')->name('store_seller');

    // Update Seller
    Route::get('/sellers/edit/{id}','SellerController@edit')->name('edit_seller');
    Route::post('/sellers/update/{id}','SellerController@update')->name('update_seller');

    // Delete Seller
    Route::get('/sellers/delete/{id}','SellerController@delete')->name('delete_seller');
    
    // Logout
    Route::get('/logout','AuthController@logout')->name('auth_logout');

});

Route :: middleware('isGuest')->group(function(){
    // Authentication
    // Register
    Route::get('/register','AuthController@register')->name('auth_register');
    Route::post('/handleRegister','AuthController@handleRegister')->name('auth_handleRegister');

    // Login
    Route::get('/login','AuthController@login')->name('auth_login');
    Route::post('/handleLogin','AuthController@handleLogin')->name('auth_handleLogin');
});

// Home Page
Route::get('/home', 'AuthController@home')->name('home');

// Read Activities
Route::get('/activities', 'ActivityController@index')->name('show_activities');
Route::get('/activities/show/{id}', 'ActivityController@show')->name('show_activity');

// Read Sellers
Route::get('/sellers', 'SellerController@index')->name('show_sellers');
Route::get('/sellers/show/{id}', 'SellerController@show')->name('show_seller');

