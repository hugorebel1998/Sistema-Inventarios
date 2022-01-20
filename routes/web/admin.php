<?php
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');


// Rutas de proveedores
Route::get('/proveedores/index', 'ProveedorController@index')->name('proveedores.index');
Route::get('/proveedores/create', 'ProveedorController@create')->name('proveedor.create');
Route::get('/proveedores/edit', 'ProveedorController@edit')->name('proveedores.edit');



