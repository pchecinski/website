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

Route::get('/image', 'ImagesController@create');
Route::post('/image', 'ImagesController@store');
Route::delete('/image/{id}', 'ImagesController@destroy');

Route::get('/', 'ImagesController@index')->name('home');