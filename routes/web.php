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
    return view('app');
});

Route::resource('consolidados', 'ConsolidadoController');
Route::resource('entradas', 'EntradaController');
Route::resource('clientes', 'ClienteController');
Route::resource('medidores', 'MedidorController', ['parameters' => ['medidores' => 'medidor'], 'except' => ['show']]);

Route::resource('medidas', 'MedidaController', ['except' => ['index', 'show']]);
Route::resource('remitentes', 'RemitenteController', ['except' => ['index', 'show']]);
Route::resource('destinatarios', 'DestinatarioController', ['except' => ['index', 'show', 'destroy']]);
Route::resource('observaciones', 'ObservacionController', ['except' => ['index', 'show', 'destroy']]);
