<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'AdminHomeController@index')->name('admin.home');


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









