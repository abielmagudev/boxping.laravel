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

// Configuracion
Route::resource('configuraciones', ConfiguracionController::class, [
    'parameters' => [
        'configuraciones' => 'configuracion',
    ],
])->except(['create','store','destroy']);

// Resources
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
    'usuarios' => UserController::class,
    'vehiculos' => VehiculoController::class,
], [
    'parameters' => [
        'codigosr' => 'codigor',
        'conductores' => 'conductor',
        'reempacadores' => 'reempacador',
    ]
]);

// Etapas
Route::resource('etapas/{etapa}/zonas', 'ZonaController')->except(['index', 'show']);

// Consolidados
Route::get('consolidados/{consolidado}/print', 'ConsolidadoController@printing')->name('consolidados.printing');

// Entradas
Route::prefix('entradas')->group( function () {
    // Comentarios
    Route::post('{entrada}/comentarios', 'ComentarioController@store')->name('comentarios.store');

    // Printing
    Route::get('{entrada}/print/{hoja}', 'EntradaController@printing')->name('entradas.printing');
    Route::get('print/{hoja?}', 'EntradaController@printingMultiple')->name('entradas.printing.multiple');

    // EntradaEtapa
    Route::get('{entrada}/etapas/add', 'EntradaEtapaController@add')->name('entradas.etapas.add');
    Route::get('{entrada}/etapas/{etapa}/edit', 'EntradaEtapaController@edit')->name('entradas.etapas.edit');
    Route::post('{entrada}/etapas', 'EntradaEtapaController@store')->name('entradas.etapas.store');
    Route::match(['put','patch'],'{entrada}/etapas/{etapa}', 'EntradaEtapaController@update')->name('entradas.etapas.update');
    Route::delete('{entrada}/etapas/{etapa}', 'EntradaEtapaController@destroy')->name('entradas.etapas.destroy');
});
