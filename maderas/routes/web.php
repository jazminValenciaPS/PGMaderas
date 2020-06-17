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
    return view('contenido/consola');
})->name('consola');

Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/categoria','CategorieController@index');
Route::post('/categoria/registrar','CategorieController@store');
Route::put('/categoria/actualizar','CategorieController@update');
Route::put('/categoria/activar','CategorieController@activar');
Route::put('/categoria/desactivar','CategorieController@desactivar');





