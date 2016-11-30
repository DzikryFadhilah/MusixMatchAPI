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

Route::get('/', 'AppController@index');
Route::post('/cari', 'AppController@cariRedirect');
Route::get('/cari2/{query}', 'AppController@cari2');
Route::get('/cari/{q}', 'AppController@cari');

Route::get('/lyric/{track_id}', 'AppController@lagu');
Route::get('/lyric2/{track_id}', 'AppController@lagu2');

Route::get('song','AppController@song');
