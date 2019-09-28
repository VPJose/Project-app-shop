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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@show'); // Busqueda

Route::get('/products/{id}', 'ProductController@show'); //
Route::get('/categories/{id}', 'CategoryController@show'); //

Route::post('/cart', 'cartDetailController@store'); // guardar
Route::delete('/cart', 'cartDetailController@destroy'); // eliminar

Route::post('/order', 'cartController@update'); //actualizar el carrito de Compras

// Administrador
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
  // ----- PRODUCTOS -----
  Route::get('/products', 'ProductController@index'); // Listado
  Route::get('/products/create', 'ProductController@create'); // Formulario
  Route::post('/products', 'ProductController@store'); // Registra
  Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario de Editar
  Route::post('/products/{id}/edit', 'ProductController@update'); // Editar
  Route::delete('/products/{id}', 'ProductController@destroy'); // formulario para Eliminar
  // ----- IMAGENES -----
  Route::get('/products/{id}/images', 'ImageController@index'); // Ver Imgaen del Producto
  Route::post('/products/{id}/images', 'ImageController@store'); // Registra
  Route::delete('/products/{id}/images', 'ImageController@destroy'); // Eliminar Imagen
  Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // Ver Imgaen del Producto
  // ----- CATEGORIAS -----
  Route::get('/categories', 'CategoryController@index'); // Listado
  Route::get('/categories/create', 'CategoryController@create'); // Formulario
  Route::post('/categories', 'CategoryController@store'); // Registra
  Route::get('/categories/{categories}/edit', 'CategoryController@edit'); // formulario de Editar
  Route::post('/categories/{id}/edit', 'CategoryController@update'); // Editar
  Route::delete('/categories/{id}', 'CategoryController@destroy'); // formulario para Eliminar
});
