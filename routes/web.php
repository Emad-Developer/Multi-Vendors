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

// Read Categories
Route::get('/activities', 'ActivityController@index')->name('show_activities');
Route::get('/activities/show/{id}', 'ActivityController@show')->name('show_activity');

// Create Category
Route::get('/activities/create','ActivityController@create')->name('create_activity');
Route::post('/activities/store','ActivityController@store')->name('store_activity');

// Update Category
Route::get('/activities/edit/{id}','ActivityController@edit')->name('edit_activity');
Route::post('/activities/update/{id}','ActivityController@update')->name('update_activity');

// Delete Category
Route::get('/activities/delete/{id}','ActivityController@delete')->name('delete_activity');
