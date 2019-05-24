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

Route::get('/', function () {
    return view('public/index');
});
Route::resource('/asignaturas','asignaturaController');

Route::delete('/borrarAjax/{idAsignatura}','asignaturaController@destroy');
Route::put('/editarAjax/{idAsignatura}','asignaturaController@update');
Route::post('/crearAjax','asignaturaController@store');
Route::post('/validarAjax','asignaturaController@validacionUsuarioAjax')



?>