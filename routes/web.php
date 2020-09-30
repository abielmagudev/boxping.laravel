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

Route::resource('entradas', 'EntradaController');
Route::prefix('entradas')->group( function () {
    Route::resource('{entrada}/etapas', 'EntradaEtapasController')
        ->except(['index', 'show'])
        ->names([
            'create'  => 'entrada.etapas.create',
            'store'   => 'entrada.etapas.store',
            'edit'    => 'entrada.etapas.edit',
            'update'  => 'entrada.etapas.update',
            'destroy' => 'entrada.etapas.destroy',
        ]);
    Route::post('{entrada}/observaciones', 'ObservacionController@store')->name('observaciones.store');
    Route::get('{entrada}/agregar/remitente', 'EntradaController@agregarRemitente')->name('entradas.agregar.remitente');
    Route::get('{entrada}/agregar/destinatario', 'EntradaController@agregarDestinatario')->name('entradas.agregar.destinatario');
});

Route::resources([
    'clientes' => ClienteController::class,
    'consolidados' => ConsolidadoController::class,
    'destinatarios' => DestinatariosController::class,
    'etapas' => EtapaController::class,
    'remitentes' => RemitenteController::class,
]);
