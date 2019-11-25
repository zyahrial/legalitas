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
    return view('auth.login');
});

Auth::routes();

	Route::resource('karyawan','KaryawanController');
	Route::group(['prefix' => 'karyawan'], function(){
	Route::get('/', 'KaryawanController@index');
    Route::get('/create', 'KaryawanController@create');
	Route::post('/store', 'KaryawanController@store');
	Route::get('/show/{kode}', 'KaryawanController@show');
	Route::patch('/update/{kode}', 'KaryawanController@update');
	Route::patch('/destroy/{kode}', 'KaryawanController@destroy');
    Route::get('/query', 'KaryawanController@loadData');  
    Route::get('/karyawan', 'KaryawanController@auth'); 
});

	Route::resource('user','UserController');
	Route::group(['prefix' => 'user'], function(){
	Route::get('/', 'UserController@index');
    Route::get('/create', 'UserController@create');
	Route::post('/store', 'UserController@store');
	Route::get('/show/{kode}', 'UserController@show');
	Route::patch('/update/{kode}', 'UserController@update');
	Route::patch('/destroy/{kode}', 'UserController@destroy');
    Route::get('/query', 'UserController@loadData');  
    Route::get('/user', 'UserController@auth'); 
});

	Route::resource('legalitas','LegalitasController');
	Route::group(['prefix' => 'legalitas'], function(){
	Route::get('/', 'LegalitasController@index');
	Route::get('/create', 'LegalitasController@create');
	Route::post('/store', 'LegalitasController@store');	
	Route::get('/show/{kode}', 'LegalitasController@show');
	Route::patch('/update/{kode}', 'LegalitasController@update');
	Route::patch('/destroy/{kode}', 'LegalitasController@destroy');
	Route::patch('/destroy/notif/{id}', 'LegalitasController@destroy_notif');
    Route::get('/query', 'LegalitasController@loadData');  
    Route::get('/legalitas', 'LegalitasController@auth'); 
    Route::get('/create', 'LegalitasController@kode');
    Route::get('/cetak', 'LegalitasController@pdfview')->name('cetak');

    Route::get('lookup/lookup_karyawan', 'LookupController@legalitas_lookup_karyawan');
    Route::get('upload/form_upload/{kode}', 'LegalitasController@edit_upload');
	Route::put('/update_upload/{kode}', 'LegalitasController@update_upload'); 
});

	Route::resource('inventaris_it','Inventaris_itController');
	Route::group(['prefix' => 'inventaris_it'], function(){
	Route::get('/', 'Inventaris_itController@index');
    Route::get('/create', 'Inventaris_itController@create');
	Route::post('/store', 'Inventaris_itController@store');
	Route::get('/show/{no_inventaris}', 'Inventaris_itController@show');
	Route::patch('/update/{no_inventaris}', 'Inventaris_itController@update');
	Route::patch('/destroy/{no_inventaris}', 'Inventaris_itController@destroy');
    Route::get('/query', 'Inventaris_itController@loadData');  
    Route::get('/inventaris_it', 'Inventaris_itController@auth');
    Route::get('lookup/lookup_karyawan', 'LookupController@inventaris_it_lookup_karyawan');
    Route::get('lookup/lookup_barang', 'LookupController@inventaris_it_lookup_barang');
    Route::get('lookup/lookup_warna', 'LookupController@inventaris_it_lookup_warna');
    Route::get('lookup/lookup_kondisi', 'LookupController@inventaris_it_lookup_kondisi');
});
	Route::resource('lelang_inventaris_it','LelangController');
	Route::group(['prefix' => 'lelang_inventaris_it'], function(){
	Route::get('/', 'LelangController@index');
	Route::post('/lelang', 'LelangController@update');
	Route::get('/show/{no_inventaris}', 'LelangController@show');
	Route::patch('/destroy/{no_inventaris}', 'Inventaris_itController@destroy');
    Route::get('/lelang_inventaris_it', 'LelangController@auth');
    Route::get('lookup/lookup_karyawan', 'LookupController@inventaris_it_lookup_karyawan');
    Route::get('lookup/lookup_barang', 'LookupController@inventaris_it_lookup_barang');
    Route::get('lookup/lookup_warna', 'LookupController@inventaris_it_lookup_warna');
    Route::get('lookup/lookup_kondisi', 'LookupController@inventaris_it_lookup_kondisi');
});

	Route::resource('peminjaman','PeminjamanController');
	Route::group(['prefix' => 'peminjaman'], function(){
	Route::get('/', 'PeminjamanController@index');
    Route::get('/create', 'PeminjamanController@create');
	Route::post('/store', 'PeminjamanController@store');
	Route::get('/show/{kode}', 'PeminjamanController@show');
	Route::patch('/update/{kode}', 'PeminjamanController@update');
	Route::patch('/destroy/{kode}', 'PeminjamanController@destroy');
    Route::get('/query', 'PeminjamanController@loadData');  
    Route::get('/peminjaman', 'PeminjamanController@auth');
    Route::get('lookup/lookup_karyawan', 'LookupController@peminjaman_lookup_karyawan');
    Route::get('lookup/lookup_inventaris', 'LookupController@lookup_inventaris');
});

Route::get('/legalitas/cetak/report', 'CetakController@report_legalitas');
Route::get('/karyawan/cetak/report', 'CetakController@report_karyawan');
Route::get('/inventaris_it/cetak/report', 'CetakController@report_inventaris_it');

Route::get('/mail_legalitas', 'MailerController@mail_legalitas');
Route::get('/mail_peminjaman', 'MailerController@mail_peminjaman');


Route::resource('file','File');

Route::get('/home', 'DashboardController@dashboard');
Route::patch('/notif/destroy', 'DashboardController@destroy');


Route::get('/daftar', 'HomeController@kode');

Route::get('/admin', 'AdminController@index');

Route::get('/superadmin', 'SuperAdminController@index');
