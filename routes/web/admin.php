<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'AdminHomeController@index')->name('admin.home');

//Rutas General Administracion del sistema
Route::get('/general', 'GeneralController@index')->name('general.index');
Route::get('/geneal/edit/{general}', 'GeneralController@edit')->name('general.edit');
Route::put('/general/update', 'GeneralController@update')->name('general.update');


//Rutas de usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::get('/usuario/create', 'UserController@create')->name('usuario.create');
Route::post('/usuario/store', 'UserController@store')->name('usuario.store');
Route::get('/usuario/edit/{user}', 'UserController@edit')->name('usuario.edit');
Route::put('/usuario/update', 'UserController@update')->name('usuario.update');
Route::delete('/usuario/delete/{usser}', 'UserController@delete')->name('usuario.delete');
Route::get('/usuarios/eliminados', 'UserController@indexDelete')->name('usuarios.index.delete');
Route::get('/usuario/restablecer/{user}', 'UserController@restore')->name('usuario.restore');


//Rutas de colaboradores
Route::get('/colaboradores', 'ColaboradorController@index')->name('colaboradores.index');
Route::get('/colaborador/create', 'ColaboradorController@create')->name('colaborador.create');
Route::post('/colaboradore/store', 'ColaboradorController@store')->name('colaborador.store');
Route::get('/colaboradore/edit/{user}', 'ColaboradorController@edit')->name('colaborador.edit');
Route::put('/colaboradore/update', 'ColaboradorController@update')->name('colaborador.update');
Route::delete('/colaboradore/delete/{usser}', 'ColaboradorController@delete')->name('colaborador.delete');
Route::get('/colaboradores/eliminados', 'ColaboradorController@indexDelete')->name('colaboradores.index.delete');
Route::get('/colaboradore/restablecer/{user}', 'ColaboradorController@restore')->name('colaborador.restore');



// Rutas de proveedores
Route::get('/proveedores/index', 'ProveedorController@index')->name('proveedores.index');
Route::get('/proveedores/create', 'ProveedorController@create')->name('proveedor.create');
Route::post('/proveedor/store', 'ProveedorController@store')->name('proveedor.store');
Route::get('/proveedor/edit/{proveedor}', 'ProveedorController@edit')->name('proveedor.edit');
Route::put('/proveedor/update', 'ProveedorController@update')->name('proveedor.update');
Route::delete('/proveedor/delete/{proveedor}', 'ProveedorController@delete')->name('proveedor.delete');
Route::get('/proveedores/eliminados', 'ProveedorController@indexDelete')->name('provedores.index.delete');
Route::get('/proveedores/restablecer/{proveedor}', 'ProveedorController@restore')->name('provedore.restore');

//Rutas de categorias 
Route::get('/categorias/index', 'CategoryController@index')->name('categorias.index');
Route::get('/categorias/create', 'CategoryController@create')->name('categoria.create');
Route::post('/categorias/store', 'CategoryController@store')->name('categoria.store');
Route::get('/categorias/edit/{categoria}', 'CategoryController@edit')->name('categoria.edit');
Route::put('/categorias/update/{categoria}', 'CategoryController@update')->name('categoria.update');
Route::delete('/categorias/delete/{categoria}', 'CategoryController@delete')->name('categoria.delete');
Route::get('/categorias/eliminados', 'CategoryController@indexDelete')->name('categorias.index.delete');
Route::get('/categorias/restablecer/{categoria}', 'CategoryController@restore')->name('categoria.restore');









