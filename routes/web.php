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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pendaftaran', 'SidangRegController@index')->name('pendaftaran');
Route::post('/pendaftaran/upload', 'SidangRegController@upload')->name('upload');

Route::get('/pendaftaran/history', 'HistoryController@index')->name('history');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
