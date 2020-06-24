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
Route::post('/categoria/actualizar','CategorieController@update');
Route::put('/categoria/activar','CategorieController@activar');
Route::put('/categoria/desactivar','CategorieController@desactivar');


Route::get('/subcategoria','SubcategoriesController@index');
Route::post('/subcategoria/registrar','SubcategoriesController@store');
Route::post('/subcategoria/actualizar','SubcategoriesController@update');
Route::put('/subcategoria/activar','SubcategoriesController@activar');
Route::put('/subcategoria/desactivar','SubcategoriesController@desactivar');


Route::get('/producto','ProductController@index');
Route::post('/producto/registrar','ProductController@store');
Route::post('/producto/actualizar','ProductController@update');
Route::put('/producto/activar','ProductController@activar');
Route::put('/producto/desactivar','ProductController@desactivar');


Route::get('/slider','SliderController@index');
Route::post('/slider/registrar','SliderController@store');
Route::post('/slider/actualizar','SliderController@update');
Route::put('/slider/activar','SliderController@activar');
Route::put('/slider/desactivar','SliderController@desactivar');