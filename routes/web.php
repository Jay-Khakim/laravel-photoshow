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

Route::redirect('/', '/en');
// , 'where'=>['locale'=>'[a-zA-Z]{2}'], 'middleware'=>['setlocale']
Route::group(['prefix' => '{language}'], function () {
    Route::get('/','AlbumsController@index' )->name("album-index");
    Route::get('/albums/create', 'AlbumsController@create')->name('album-create');
    Route::post('/albums/store', 'AlbumsController@store')->name('album-store');
    Route::get('/albums/{id}', 'AlbumsController@show')->name('album-show'); 

    // Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/photos/create/{adminId}', 'PhotosController@create')->name('photo-create');
    Route::post('/photos/store', 'PhotosController@store')->name('photo-store');
    Route::get('/photos/{id}', 'PhotosController@show')->name('photo-show'); 
});