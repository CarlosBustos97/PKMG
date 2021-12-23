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

/**Ruta principal para istar todos los usuarios */
Route::get('/', 'UserController@index');
/**Ruta Encargadas de guardar nuevos usuarios */
Route::post('users', 'UserController@store')->name('users.store');
/**Ruta Encargadas de eliminar un respectivo usuario */
Route::delete('user/{user}', 'UserController@destroy')->name('users.destroy');
/**Ruta Encargadas de actualizar un respectivo usuario */
Route::put('user/{user}', 'UserController@update')->name('users.update');
