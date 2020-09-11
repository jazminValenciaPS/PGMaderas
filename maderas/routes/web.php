<?php

Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::get('/iniciar-sesion','Auth\LoginClientController@showLoginForm');

});

// Route::post('/login','Auth\LoginController@showLoginForm');

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

Route::get('/Ver-Categoria-Producto', function () {
    return view('tienda.pagina.Productos');
})->name('CategoriaProducto');

Route::get('/productos-Categorias', function () {
    return view('tienda.pagina.Productos');
})->name('CategoriaProductoInicio');

Route::get('/Carrito', function () {
    return view('tienda.pagina.Carrito');
})->name('carrito');

Route::get('/Contra', function () {
    return view('tienda.pagina.contra');
})->name('contra');

Route::get('/Perfil', function () {
    return view('tienda.pagina.Perfil');
})->name('perfil');


Route::get('/registro', function () {
    return view('tienda.pagina.Registro');
})->name('registro');

Route::get('/Ordenar', function () {
    return view('tienda.pagina.Orden');
})->name('Ordenar');

Route::get('/Categorias', function () {
    return view('tienda.pagina.Categorias');
})->name('Categorias');



Auth::routes();

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrar','Auth\RegisterController@register')->name('registrar');
Route::post('/order/registrar','OrderController@store');



Route::group(['middleware'=>['auth']],function(){
    Route::get('/logout','Auth\LoginController@logout')->name('logout');

    Route::post('/salir','Auth\LoginClientController@logout')->name('salir');

    Route::get('/consola', function () {
        return view('contenido/consola');
    })->name('consola');

    // Route::get('/Perfil', function () {
    //     return view('tienda.pagina.Perfil');
    // })->name('perfil');

    Route::group(['middleware'=>['Administrador']],function() {



        Route::get('/categoria','CategorieController@index');
        Route::post('/categoria/registrar','CategorieController@store');
        Route::post('/categoria/actualizar','CategorieController@update');
        Route::put('/categoria/activar','CategorieController@activar');
        Route::put('/categoria/desactivar','CategorieController@desactivar');
        Route::get('/categoriaV','CategorieController@listar');

        Route::get('/categoriaProducto','CategoriesProductsController@index');
        Route::post('/categoriaProducto/registrar','CategoriesProductsController@store');
        Route::post('/categoriaProducto/actualizar','CategoriesProductsController@update');
        Route::put('/categoriaProducto/activar','CategoriesProductsController@activar');
        Route::put('/categoriaProducto/desactivar','CategoriesProductsController@desactivar');
        Route::get('/categoriaProductoV','CategoriesProductsController@listar');
    
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
        Route::get('/producto/info/destacado','ProductController@infoDestacado');
        Route::put('/producto/activarDestacado','ProductController@activarDestacados');
        Route::put('/producto/desactivarDestacado','ProductController@desactivarDestacados');
    
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
        Route::get('/order/status','OrderStatusController@index');


        Route::get('/stock','StockController@index');
        Route::post('/stock/actualizar','StockController@update');
    });
    Route::group(['middleware'=>['Marketing']],function() {

        Route::get('/slider','SliderController@index');
        Route::post('/slider/registrar','SliderController@store');
        Route::post('/slider/actualizar','SliderController@update');
        Route::put('/slider/activar','SliderController@activar');
        Route::put('/slider/desactivar','SliderController@desactivar');

        Route::get('/logout','Auth\LoginController@logout')->name('logout');

        Route::post('/salir','Auth\LoginClientController@logout')->name('salir');

        Route::post('/password/actualizar','PasswordController@update');
    });
});


Route::get('/slider/carrusel','SliderController@mostrar');
Route::get('/productoL','ProductController@listarProductos');
Route::get('/categoriaProductoL','CategoriesProductsController@listarCateP');


Route::get('/productoM', 'ProductController@mostrarProducto')->name('productos');
Route::get('/productosNuevos', 'ProductController@productosNuevos');


Route::get('/categoriasProductos/{id}', 'ProductController@mostrarProducto')->name('categoriaproductos');
Route::get('/productoCategoria', 'ProductController@productosCategoria');



Route::get('/user/cliented/{correo}','UserController@clientData');
Route::post('/user/registrarC','UserController@registroCliente');
Route::post('/cliente/actualizar','UserController@updateClient');
Route::post('/client/passwordUpdate','UserController@passwordUpdate');
Route::get('/order/user','OrderController@clientData');



Route::get('/categoriaV','CategorieController@listar');

Route::post('contact','MessagesController@store');

Route::get('/submenu','SubcategoriesController@menuInicio');
Route::get('/subcategoriaV','SubcategoriesController@listar');
Route::post('/password/actualizar','PasswordController@update');

Route::get('/branches','PGBranchesController@index');

Route::get('/buscar','ProductController@buscar');

Route::get('/user/info','userController@info');
Route::post('/user/update/branch','userController@updateBranch');



Route::get('/descargar/file','DocumentController@optimizador');
Route::get('/descargar/modulos','DocumentController@modulos');
Route::get('/productosCategorias', 'ProductController@productosPorDefecto');


