<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/','App\Http\Controllers\AlbumsController@index' );

Route::get('/index', 'App\Http\Controllers\AlbumsController@index')->name('index');;
Route::get('/create', 'App\Http\Controllers\AlbumsController@create')->name('create');
Route::post('/album_store', 'App\Http\Controllers\AlbumsController@store')->name('album-store');
Route::get('/albums/{id}', 'App\Http\Controllers\AlbumsController@show')->name('album-show');



//route for photos gallery
Route::get('photos/create/{albumId}', 'App\Http\Controllers\PhotosController@create')->name('photos-create');
Route::post('store', 'App\Http\Controllers\PhotosController@store')->name('photos-store');
Route::get('show/{id}', 'App\Http\Controllers\PhotosController@show')->name('photo-show');

Route::get('/showphoto/{id}','App\Http\Controllers\PhotosController@showphoto')->name('show-photo');

Route::delete('photo/{id}', 'App\Http\Controllers\PhotosController@destroy')->name('photo-destroy');
