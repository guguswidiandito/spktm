<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Auth::routes();

Route::get('/', 'GuestController@index');

Route::get('/{id}', 'GuestController@lihat');

Route::get('/home', 'GuestController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::post('mahasiswa/import', [
        'as'   => 'import.mahasiswa',
        'uses' => 'MahasiswaController@importExcel',
    ]);
    Route::delete('hapus', 'MahasiswaController@hapusSemua');
    Route::get('transaksi', [
        'as'   => 'mahasiswa.transaksi',
        'uses' => 'MahasiswaController@transaksi',
    ]);
    Route::get('mahasiswa/prediksi/data-training', [
        'as'   => 'prediksi.training',
        'uses' => 'MahasiswaController@training',
    ]);
    Route::get('mahasiswa/prediksi/ipk/semester1-2', [
        'as'   => 'prediksi.ipk12',
        'uses' => 'MahasiswaController@prediksi12',
    ]);
    Route::get('mahasiswa/prediksi/ipk/semester1-3', [
        'as'   => 'prediksi.ipk123',
        'uses' => 'MahasiswaController@prediksi123',
    ]);
    Route::get('mahasiswa/prediksi/ipk/semester1-4', [
        'as'   => 'prediksi.ipk1234',
        'uses' => 'MahasiswaController@prediksi1234',
    ]);
    Route::get('mahasiswa/prediksi/ipk/semester1-6', [
        'as'   => 'prediksi.ipk123456',
        'uses' => 'MahasiswaController@prediksi123456',
    ]);
    Route::post('mahasiswa/prediksi/ipk/semester1-2/export', [
        'as'   => 'export.prediksi.semester1-2',
        'uses' => 'MahasiswaController@export12',
    ]);
    Route::post('mahasiswa/prediksi/ipk/semester1-3/export', [
        'as'   => 'export.prediksi.semester1-3',
        'uses' => 'MahasiswaController@export13',
    ]);
    Route::post('mahasiswa/prediksi/ipk/semester1-4/export', [
        'as'   => 'export.prediksi.semester1-4',
        'uses' => 'MahasiswaController@export14',
    ]);
});
