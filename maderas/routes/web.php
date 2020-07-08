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


Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm');
    
});


Route::get('/', function () {
    return view('contenido/ecommerce');
})->name('contenido');

// Route::get('/', function () {
//     return view('contenido/consola');
// })->name('consola');

Auth::routes();



Route::group(['middleware'=>['auth']],function(){

    Route::get('/consola', function () {
        return view('contenido/consola');
    })->name('consola');

    // Route::group(['middleware'=>['Administrador']],function() {
        Route::post('/password/actualizar','PasswordController@update');
        Route::get('/logout','Auth\LoginController@logout')->name('logout');

        Route::get('/categoria','CategorieController@index');
        Route::post('/categoria/registrar','CategorieController@store');
        Route::post('/categoria/actualizar','CategorieController@update');
        Route::put('/categoria/activar','CategorieController@activar');
        Route::put('/categoria/desactivar','CategorieController@desactivar');
        Route::get('/categoriaV','CategorieController@listar');
    
    
    
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
    
        Route::get('/user','UserController@index');
        Route::get('/user/clientes','UserController@customerIndex');
        Route::post('/user/registrar','UserController@store');
        Route::post('/user/actualizar','UserController@update');
        Route::put('/user/desactivar','UserController@desactivar');
    
        Route::get('/rol','RolController@index');
    
        Route::get('/order','OrderController@index');
    

    // });

   
   




});


Route::get('/slider','SliderController@index');
Route::get('/productoL','ProductController@listarProductos');

Route::get('/productoM/{id}', 'ProductController@mostrarProducto')->name('productos');

Route::get('/user/cliented/{id}','UserController@clientData');

Route::get('/categoriaV','CategorieController@listar');

Route::post('contact','MessagesController@store');

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['Cliente']],function() {

});