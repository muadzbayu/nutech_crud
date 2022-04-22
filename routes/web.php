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

//Router Product
Route::get('/','ProductController@index');
Route::get('/product/hapus/{id}','ProductController@hapus');
Route::post('/product/tambah','ProductController@tambah');
Route::get('/product/edit/{id}','ProductController@edit');
Route::post('/product/simpan_edit','ProductController@simpan_edit');


//Router Home
Route::get('/home','HomeController@index');

//Tes File
Route::get('/upload', 'FileController@upload');
Route::post('/upload/proses', 'FileController@proses_upload');
