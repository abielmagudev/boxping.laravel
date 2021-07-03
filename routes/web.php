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

// Escritorio
Route::get('/', fn() => view('app'))->name('escritorio');

// CRUDs
Route::resources([
    'alertas' => AlertaController::class,
    'clientes' => ClienteController::class,
    'codigosr' => CodigorController::class,
    'conductores' => ConductorController::class,
    'consolidados' => ConsolidadoController::class,
    'destinatarios' => DestinatarioController::class,
    'entradas' => EntradaController::class,
    'etapas' => EtapaController::class,
    'incidentes' => IncidenteController::class,
    'reempacadores' => ReempacadorController::class,
    'remitentes' => RemitenteController::class,
    'salidas' => SalidaController::class,
    'transportadoras' => TransportadoraController::class,
    'vehiculos' => VehiculoController::class,
], [
    'parameters' => [
        'codigosr'      => 'codigor',
        'conductores'   => 'conductor',
        'reempacadores' => 'reempacador',
    ],
]);

// Entrada
Route::prefix('entradas')->group( function () {
    Route::get('{entrada}/print/{hoja}', 'EntradaController@printing')->name('entradas.printing');
    Route::get('print/{hoja?}', 'EntradaController@printingMultiple')->name('entradas.printing.multiple');
    Route::post('{entrada}/comentarios', 'ComentarioController@store')->name('comentarios.store');
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

// Consolidado
Route::get('consolidados/{consolidado}/print', 'ConsolidadoController@printing')->name('consolidados.printing');
