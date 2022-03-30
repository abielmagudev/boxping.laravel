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
    Route::get('/{home?}', function() { return view('app'); })
            ->name('escritorio')
            ->where(['home' => 'home|dashboard']);
    
    // Configuracion
    Route::resource('configuraciones', ConfiguracionController::class, [
        'parameters' => [
            'configuraciones' => 'configuracion',
        ],
    ])->except(['create','store','destroy']);

    // Entradas
    Route::group(['prefix' => 'entradas'], function () {
        
        // Entrada
        Route::get('{entrada}/{show?}', 'EntradaController@show')->name('entradas.show');
        Route::get('{entrada}/edit/{editor}', 'EntradaController@edit')->name('entradas.edit');

        // Comentarios
        Route::post('{entrada}/comentarios', 'ComentarioController@store')->name('comentarios.store');
        
        // Imprimir
        Route::get('{entrada}/imprimir/{guia?}', 'EntradaController@print')->name('entradas.imprimir')->middleware('guia_impresion.activada');
        Route::get('imprimir/{guia?}', 'EntradaController@printMultiple')->name('entradas.imprimir.multiple')->middleware('guia_impresion.activada');

        // Multiple
        Route::post('multiple', 'EntradaController@importMultiple')->name('entradas.import.multiple');
        Route::match(['put','patch'], 'multiple', 'EntradaController@updateMultiple')->name('entradas.update.multiple');
        Route::delete('multiple', 'EntradaController@destroyMultiple')->name('entradas.destroy.multiple');
    });
    Route::resource('entradas.etapas', EntradaEtapaController::class)->except(['index','show']);
    Route::resource('entradas', EntradaController::class)->except(['show','edit']);

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
