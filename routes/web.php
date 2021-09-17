<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

//halaman awal
Route::get('/', function () {
    return view('home');
});

//verifikasi admin atau user
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['admin'])->group(function () {
    //untuk admin
    Route::get('admin-view', 'AdminController@adminView')->name('admin-view');
    Route::get('/search', [AdminController::class, 'search']);
    Route::get('/ajax-autocomplete-search', [AdminController::class, 'selectSearch']);

    Route::resource('laporans', 'AdminController');
    Route::get('grafiklaporan', 'AdminController@grafiklaporan')->name('grafiklaporan');
    Route::get('diproses', 'AdminController@diproses')->name('diproses');
    Route::get('ditolak', 'AdminController@ditolak')->name('ditolak');
    Route::get('selesai', 'AdminController@selesai')->name('selesai');
    Route::get('jenis/penyimpangan', 'AdminController@penyimpangan')->name('jenis.penyimpangan');
    Route::get('jenis/gratifikasi', 'AdminController@gratifikasi')->name('jenis.gratifikasi');
    Route::get('jenis/benturan', 'AdminController@benturan')->name('jenis.benturan');
    Route::get('jenis/melanggar', 'AdminController@melanggar')->name('jenis.melanggar');
    Route::get('tabeluser', 'AdminController@tabeluser')->name('tabeluser');
    Route::get('kritiksaran', 'AdminController@kritiksaran')->name('kritiksaran');
    Route::delete('laporans/{id}', 'AdminController@destroy');
    Route::delete('users/{id}', 'AdminController@hapus')->name('hapus');
});

//untuk user
Route::get('/informasi', 'InformasiController@index')->name('informasi');
Route::get('/bantuan', 'BantuanController@index')->name('bantuan');
Route::get('/satwa', 'SatwaController@index')->name('satwa');
Route::get('/pantau', 'PantauController@index')->name('pantau');
Route::get('/statistik', 'StatistikController@index')->name('statistik');
Route::get('laporans/create', 'LaporanController@create')->name('laporans.create');
Route::post('laporans/store', 'LaporanController@store')->name('laporans.store');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::post('/bantuan/store','BantuanController@store')->name('bantuan.store');

Route::get('/detail-lapor/{id}', 'LaporanController@detaillapor')->name('detail-lapor');

//dropdown indonesia
Route::get('lapor','LaporanController@getProvinsi')->name('lapor');
Route::get('lapor/getkota/{id}','LaporanController@getKota');
Route::get('lapor/getkec/{id}','LaporanController@getKec');
Route::get('lapor/getdes/{id}','LaporanController@getDes');
