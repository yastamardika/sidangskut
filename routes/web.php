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
Route::post('/pendaftaran/upload', 'SidangRegController@upload')->name('upload');
Route::get('/pendaftaran/history', 'HistoryController@index')->name('history');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    //Route yang berada dalam group ini hanya dapat diakses oleh user
    //yang memiliki role admin
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);

        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
        Route::get('/users/kaprodi','AdminKaprodiController@index');
        Route::get('/users/kaprodi/{id}', 'AdminKaprodiController@detailKaprodi');
        Route::get('/users/kaprodi/{id}/setprodi', 'AdminKaprodiController@tambahKaprodi');
    });

    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::resource('daftar', 'SidangRegController')->only([
            'show', 'create'
        ]);
        Route::get('/pendaftaran', 'SidangRegController@index')->name('pendaftaran');
    });

    //route group untuk petugas akademik
    Route::group(['middleware' => ['role:akademik']], function () {
        Route::get('/dashboard/akademik', 'HistoryController@index')->name('akademik.mahasiswa');
        Route::post('/dashboard/akademik/{id}', 'HistoryController@ajukan')->name('akademik.ajukan');
    });
    //route yang berada dalam group ini, hanya bisa diakses oleh user
    //yang memiliki permission yang telah disebutkan dibawah

    //route group untuk mahasiswa
    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::get('/pendaftaran', 'SidangRegController@index')->name('pendaftaran');
        Route::post('/pendaftaran/upload', 'SidangRegController@upload')->name('upload');
    });

    //route group untuk kaprodi
    Route::group(['middleware' => ['role:kaprodi']], function () {
        Route::get('/kaprodi', 'MhsDiajukanController@index')->name('kaprodi');
    });

    //route group untuk penguji
    Route::group(['middleware' => ['role:penguji']], function () {
        Route::get('/penguji', 'MhsDiujiController@index')->name('penguji');
    });
});
