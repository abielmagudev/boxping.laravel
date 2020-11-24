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

Route::resources([
    'alertas' => AlertaController::class,
    'clientes' => ClienteController::class,
    'codigosr' => CodigorController::class,
    'conductores' => ConductorController::class,
    'consolidados' => ConsolidadoController::class,
    'destinatarios' => DestinatarioController::class,
    'entradas' => EntradaController::class,
    'etapas' => EtapaController::class,
    'reempacadores' => ReempacadorController::class,
    'remitentes' => RemitenteController::class,
    'transportadoras' => TransportadoraController::class,
    'vehiculos' => VehiculoController::class,
],[
    'parameters' => [
        'codigosr'      => 'codigor',
        'conductores'   => 'conductor',
        'reempacadores' => 'reempacador',
    ],
]);

// Entrada > Comentario, Destinario, Remitente
Route::prefix('entradas')->group( function () {
    Route::post('{entrada}/comentarios', 'ComentarioController@store')->name('comentarios.store');
    Route::get('{entrada}/agregar/remitente', 'EntradaController@agregarRemitente')->name('entradas.agregar.remitente');
    Route::get('{entrada}/agregar/destinatario', 'EntradaController@agregarDestinatario')->name('entradas.agregar.destinatario');
    Route::resource('{entrada}/etapas', 'EntradaEtapasController')
         ->except(['index', 'show'])
         ->names([
            'create'  => 'entrada.etapas.create',
            'store'   => 'entrada.etapas.store',
            'edit'    => 'entrada.etapas.edit',
            'update'  => 'entrada.etapas.update',
            'destroy' => 'entrada.etapas.destroy',
    ]);
});

// Etapa > Zonas
Route::prefix('etapas')->group( function () {
    Route::resource('{etapa}/zonas', 'ZonaController')
         ->except(['index', 'show']);
});
