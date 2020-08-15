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

Route::get('/detailKaprodi', function () {
    return view('pages.kaprodi.detail_pengajuan');
});
Route::get('/detailEditAkademik', function () {
    return view('pages.akademik.edit_mahasiswa');
});
Route::get('/detailSidang', function () {
    return view('pages.penguji.detail_sidang');
});

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/profil', 'HomeController@profil')->name('profil');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    //Route yang berada dalam group ini hanya dapat diakses oleh user
    //yang memiliki role admin
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/data-pendaftar', 'HistoryController@index');

        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);

        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
        Route::put('/users/edit/{id}', 'UserController@update')->name('users.updates');
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
        Route::get('/users/kaprodi','AdminKaprodiController@index');
        Route::get('/users/kaprodi/{id}', 'AdminKaprodiController@detailKaprodi');
        Route::get('/users/kaprodi/{id}/setprodi', 'AdminKaprodiController@tambahKaprodi');
    });

    // Route::group(['middleware' => ['role:mahasiswa']], function () {
    //     Route::resource('daftar', 'SidangRegController')->only([
    //         'show', 'create'
    //     ]);
    //     Route::get('/pendaftaran', 'SidangRegController@index')->name('pendaftaran');
    // });

    //route group untuk petugas akademik
    Route::group(['middleware' => ['role:akademik']], function () {
        Route::get('/dashboard/pendaftar-sidang', 'HistoryController@index')->name('akademik.mahasiswa');
        Route::get('/dashboard/pendaftar-sidang/{id}', 'HistoryController@detail')->name('akademik.detailmhs');
        Route::post('/dashboard/akademik/{id}', 'HistoryController@ajukan')->name('akademik.ajukan');
        Route::post('/dashboard/akademik/{id}/cancel', 'HistoryController@cancel')->name('akademik.cancel');
    });
    //route yang berada dalam group ini, hanya bisa diakses oleh user
    //yang memiliki permission yang telah disebutkan dibawah

    //route group untuk mahasiswa
    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::get('/pengajuan', 'SidangRegController@index')->name('pengajuan');
        Route::post('/pengajuan/upload', 'SidangRegController@upload')->name('upload');
    });

    //route group untuk kaprodi
    Route::group(['middleware' => ['role:kaprodi']], function () {
        Route::get('/kaprodi/dashboard/pendaftar-sidang', 'MhsDiajukanController@index')->name('kaprodi');
        Route::get('/kaprodi/dashboard/pendaftar-sidang/{id}', 'HistoryController@detail')->name('kaprodi.detailmhs');
    });

    //route group untuk penguji
    Route::group(['middleware' => ['role:penguji']], function () {
        Route::get('/penguji', 'MhsDiujiController@index')->name('penguji');
    });
});
