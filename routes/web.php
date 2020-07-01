<?php

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

Route::get('/', 'CallbackController@index')->name('index');
Route::post('add_callback', 'CallbackController@add')->name('addCallback');

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/callbacks', 'CallbackController@show')->name('showCallbacks');
    Route::match(['get', 'post'], 'edit_callback/{id?}', 'CallbackController@edit')->name('editCallback');
    Route::get('/delete_callback', 'CallbackController@delete')->name('deleteCallback');
});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
