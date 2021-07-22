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

// Resources
Route::resources([
    'alertas' => AlertaController::class,
    'clientes' => ClienteController::class,
    'destinatarios' => DestinatarioController::class,
    'incidentes' => IncidenteController::class,
    'remitentes' => RemitenteController::class,
    'salidas' => SalidaController::class,
    'transportadoras' => TransportadoraController::class,
    'vehiculos' => VehiculoController::class,
]);

// Codigos de reempacado
Route::resource('codigosr', CodigorController::class, [
    'parameters' => [
        'codigosr' => 'codigor',
    ],
]);

// Conductores
Route::resource('conductores', ConductorController::class, [
    'parameters' => [
        'conductores' => 'conductor',
    ],
]);

// Consolidados
Route::resource('consolidados', ConsolidadoController::class);
Route::get('consolidados/{consolidado}/print', 'ConsolidadoController@printing')->name('consolidados.printing');

// Entradas
Route::resource('entradas', EntradaController::class);
Route::prefix('entradas')->group( function () {
    // Comentarios
    Route::post('{entrada}/comentarios', 'ComentarioController@store')->name('comentarios.store');

    // Printing
    Route::get('{entrada}/print/{hoja}', 'EntradaController@printing')->name('entradas.printing');
    Route::get('print/{hoja?}', 'EntradaController@printingMultiple')->name('entradas.printing.multiple');

    // EntradaEtapa
    Route::get('{entrada}/etapas/create', 'EntradaEtapaController@create')->name('entradas.etapas.create');
    Route::get('{entrada}/etapas/{etapa}/edit', 'EntradaEtapaController@edit')->name('entradas.etapas.edit');
    Route::post('{entrada}/etapas', 'EntradaEtapaController@store')->name('entradas.etapas.store');
    Route::match(['put','patch'],'{entrada}/etapas/{etapa}', 'EntradaEtapaController@update')->name('entradas.etapas.update');
    Route::delete('{entrada}/etapas/{etapa}', 'EntradaEtapaController@destroy')->name('entradas.etapas.destroy');
});

// Etapas
Route::resource('etapas', EtapaController::class);
Route::prefix('etapas')->group( function () {
    Route::resource('{etapa}/zonas', 'ZonaController')->except(['index', 'show']);
});

// Reempacadores
Route::resource('reempacadores', ReempacadorController::class, [
    'parameters' => [
        'reempacadores' => 'reempacador',
    ],
]);
