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
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('daftar', 'SidangRegController')->only([
        'show', 'create'
    ]);
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
    });


    //route yang berada dalam group ini, hanya bisa diakses oleh user
    //yang memiliki permission yang telah disebutkan dibawah
    Route::group(['middleware' => ['permission:show products|create products|delete products']], function () {
        Route::resource('/kategori', 'CategorzyController')->except([
            'create', 'show'
        ]);
        Route::resource('/produk', 'ProductController');
    });

    //route group untuk kasir
    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::get('/pendaftaran', 'SidangRegController@index')->name('pendaftaran');
    });

    //home kita taruh diluar group karena semua jenis user yg login bisa mengaksesnya
    Route::get('/home', 'HomeController@index')->name('home');
});
