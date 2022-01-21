<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');


// Rutas de proveedores
Route::get('/proveedores/index', 'ProveedorController@index')->name('proveedores.index');
Route::get('/proveedores/create', 'ProveedorController@create')->name('proveedor.create');
Route::post('/proveedor/store', 'ProveedorController@store')->name('proveedor.store');
Route::get('/proveedor/edit/{proveedor}', 'ProveedorController@edit')->name('proveedor.edit');
Route::put('/proveedor/update', 'ProveedorController@update')->name('proveedor.update');
Route::delete('/proveedor/delete/{proveedor}', 'ProveedorController@delete')->name('proveedor.delete');
Route::get('/proveedores/eliminados', 'ProveedorController@indexDelete')->name('provedores.index.delete');
Route::get('/proveedores/restablecer/{proveedor}', 'ProveedorController@restore')->name('provedores.restore');




