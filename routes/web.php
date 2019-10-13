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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::resource('vehiculos', 'VehiculoController')->only([
    'index', 'show'
]);

Route::resource('actividades', 'ActivityController')->only(['index']);
Route::resource('usuarios', 'UserController')->only(['index']);
Route::resource('rutinas', 'MaintenanceController')->only(['index']);
