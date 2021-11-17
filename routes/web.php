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

use Illuminate\Support\Facades\Route;


// Guest routes
Route::middleware('guest')->group( function () {

    // Reempaque
    Route::get('reempaque', 'ReempaqueController@index')->name('reempaque.index');
    Route::match(['put','patch'], 'reempaque', 'ReempaqueController@update')->name('reempaque.update');
});


// Auth routes
Route::middleware('auth')->group( function () {

    // Escritorio
    Route::get('/{home?}', fn() => view('app'))
            ->name('escritorio')
            ->where(['home' => 'home|dashboard']);
    
    // Configuracion
    Route::resource('configuraciones', ConfiguracionController::class, [
        'parameters' => [
            'configuraciones' => 'configuracion',
        ],
    ])->except(['create','store','destroy']);
    
    // Entradas
    Route::prefix('entradas')->group( function () {
        // Comentarios
        Route::post('{entrada}/comentarios', 'ComentarioController@store')->name('comentarios.store');
        
        // Imprimir
        Route::get('{entrada}/imprimir/{guia}', 'EntradaController@imprimir')->name('entradas.imprimir');
        Route::get('imprimir', 'EntradaController@imprimirMultiple')->name('entradas.imprimir.multiple');
    
        // EntradaEtapa
        Route::get('{entrada}/etapas/add', 'EntradaEtapaController@add')->name('entradas.etapas.add');
        Route::get('{entrada}/etapas/{etapa}/edit', 'EntradaEtapaController@edit')->name('entradas.etapas.edit');
        Route::post('{entrada}/etapas', 'EntradaEtapaController@store')->name('entradas.etapas.store');
        Route::match(['put','patch'],'{entrada}/etapas/{etapa}', 'EntradaEtapaController@update')->name('entradas.etapas.update');
        Route::delete('{entrada}/etapas/{etapa}', 'EntradaEtapaController@destroy')->name('entradas.etapas.destroy');
    });
    
    // Zonas
    Route::resource('etapas/{etapa}/zonas', 'ZonaController')->except(['index', 'show']);
    
    // Consolidados
    Route::get('consolidados/{consolidado}/print', 'ConsolidadoController@toPrint')->name('consolidados.print');

    // Registrar
    Route::get('registrar', 'RegistrarController@index')->name('registrar.index');
    Route::post('registrar', 'RegistrarController@update')->name('registrar.update');
    // Route::match(['put','patch'], 'registrar', 'RegistrarController@update')->name('registrar.update');

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
        'guias_impresion' => GuiaImpresionController::class,
    ], [
        'parameters' => [
            'codigosr' => 'codigor',
            'conductores' => 'conductor',
            'reempacadores' => 'reempacador',
            'guias_impresion' => 'guia', 
        ]
    ]);
});
