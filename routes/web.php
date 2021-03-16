<?php

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('main', function () {
//     return view('toko');
// });

Route::get('{nomor}/toko', 'TokoController@index');

Route::get('{nomor}/toko/{id}', 'TokoController@detail');

Auth::routes();

// Profil
Route::get('/toko', 'HomeController@index')->name('home');
Route::patch('/toko', 'HomeController@update');
Route::patch('/ganti', 'HomeController@ganti');

// Produk
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/{id}', 'ProdukController@detail');
Route::post('/produk', 'ProdukController@store');
Route::put('/produk/{id}', 'ProdukController@update');
Route::delete('/produk/{id}', 'ProdukController@delete');

// Kategori
Route::get('/kategori', 'KategoriController@index');
Route::post('/kategori', 'KategoriController@store');
Route::put('/kategori/{id}', 'KategoriController@Update');
Route::delete('/kategori/{id}', 'KategoriController@delete');
