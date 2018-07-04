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
    return view('pages.dashboard.index');
});

//view datamaster
Route::get('jabatan','PageController@jabatan')->name('jabatan');
Route::get('pegawai','PageController@pegawai')->name('pegawai');
//table
Route::get('table-jabatan','TableController@tableJabatan')->name('table-jabatan');
Route::get('table-pegawai','TableController@tablePegawai')->name('table-pegawai');
//modal
Route::get('/modal/add-jabatan','ModalController@addJabatan')->name('addJabatan');
Route::get('/modal/edit-jabatan/{id}','ModalController@editJabatan')->name('editJabatan');
Route::get('/modal/add-pegawai','ModalController@addPegawai')->name('addPegawai');
Route::get('/modal/edit-pegawai/{id}','ModalController@editPegawai')->name('editPegawai');

//tambah data
Route::post('tambah/jabatan', 'FormController@addJabatan');
Route::post('post/pegawai', 'FormController@addPegawai');
//edit data
Route::post('edit/jabatan/{id}', 'FormController@editJabatan');
Route::post('edit/pegawai/{id}', 'FormController@editPegawai');
//hapus data
Route::get('delete/jabatan/{id}', 'FormController@DeleteJabatan');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
