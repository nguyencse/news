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


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::prefix('theloai')->group(function () {
        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');

        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');
    });

    Route::prefix('loaitin')->group(function () {
        Route::get('danhsach', 'LoaiTinController@getDanhSach');
        Route::get('sua', 'LoaiTinController@getSua');
        Route::get('them', 'LoaiTinController@getThem');
    });

    Route::prefix('tintuc')->group(function () {
        Route::get('danhsach', 'TinTucController@getDanhSach');
        Route::get('sua', 'TinTucController@getSua');
        Route::get('them', 'TinTucController@getThem');
    });
});
