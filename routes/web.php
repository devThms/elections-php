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
    return view('welcome');
});


Route::resource('departamentos', 'DepartamentoController');
Route::post('departamentos/delete/{id}', 'DepartamentoController@updateState');

Route::resource('municipios', 'MunicipiosController');
Route::post('municipios/delete/{id}', 'MunicipiosController@updateState');
// Route::get('obtenerMunicipios/{id}', 'MunicipiosController@obtenerMunicipios');


Route::resource('registros', 'VotosController');
Route::post('registro2', 'VotosController@registro2'); /* Ruta para crear el segundo registro de votos */

Route::get('dashboard', 'VotosController@dashboard');
Route::post('resultados', 'VotosController@getResults');


