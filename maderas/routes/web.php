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
    Route::get('/iniciar-sesion','Auth\LoginClientController@showLoginForm');

});


Route::post('/iniciar-sesion','Auth\LoginClientController@login');


Route::get('/', function () {
    return view('tienda.pagina.Inicio');
})->name('contenido');

Route::get('/Quienes-Somos', function () {
    return view('tienda.pagina.QuienesSomos');
})->name('quienes');

Route::get('/Contacto', function () {
    return view('tienda.pagina.Contacto');
})->name('contacto');

Route::get('/Productos', function () {
    return view('tienda.pagina.Productos');
})->name('productos');

Route::get('/Ver-Producto', function () {
    return view('tienda.pagina.Producto');
})->name('producto');

Route::get('/Carrito', function () {
    return view('tienda.pagina.Carrito');
})->name('carrito');

Route::get('/Perfil', function () {
    return view('tienda.pagina.Perfil');
})->name('perfil');


Route::get('/registro', function () {
    return view('tienda.pagina.Registro');
})->name('registro');

// Auth::routes();


Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrar','Auth\RegisterController@register')->name('registrar');


Route::group(['middleware'=>['auth']],function(){

    Route::get('/consola', function () {
        return view('contenido/consola');
    })->name('consola');

    // Route::get('/Perfil', function () {
    //     return view('tienda.pagina.Perfil');
    // })->name('perfil');

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
Route::post('/user/registrarC','UserController@registroCliente');


Route::get('/categoriaV','CategorieController@listar');

Route::post('contact','MessagesController@store');

