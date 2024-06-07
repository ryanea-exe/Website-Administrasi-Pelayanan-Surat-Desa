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
/*
Route::get('/', function () {
    return view('home');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

/*
Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');
*/
Route::resource('user', 'UserController');

Route::resource('kk', 'KKController');

Route::resource('penduduk', 'PendudukController');

Route::resource('buatsurat', 'BuatSuratController');
Route::resource('kematian', 'BuatSurat\KematianController');
Route::post('/kematian/cetak/{id}', 'BuatSurat\KematianController@cetak_surat')->name('kematian.cetak');
Route::resource('kelahiran', 'BuatSurat\KelahiranController');
Route::post('/kelahiran/cetak/{id}', 'BuatSurat\KelahiranController@cetak_surat')->name('kelahiran.cetak');

Route::get('/laporan/penduduk', 'LaporanController@penduduk');
Route::get('/laporan/penduduk/pdf', 'LaporanController@pendudukPdf');
Route::get('/laporan/penduduk/excel', 'LaporanController@pendudukExcel');

Route::get('/laporan/kk', 'LaporanController@kk');
Route::get('/laporan/kk/pdf', 'LaporanController@kkPdf');
Route::get('/laporan/kk/excel', 'LaporanController@kkExcel');

// ajax
Route::get('penduduk/{nik}', 'KematianController@ajax');
