<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

use \App\Ahex\Zowner\Infrastructure\Graffiti\Graffiti;
use \App\Ahex\Zowner\Infrastructure\Graffiti\Samples\BootstrapIcons;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Actualizacion de Laravel 8: https://laravel.com/docs/8.x/upgrade#pagination-defaults
        Paginator::useBootstrap();

        // Observers
        \App\Entrada::observe(\App\Observers\EntradaObserver::class);
        \App\EntradaEtapa::observe(\App\Observers\EntradaEtapaObserver::class);
        \App\Salida::observe(\App\Observers\SalidaObserver::class);
        \App\SalidaIncidente::observe(\App\Observers\SalidaIncidenteObserver::class);

        // Composers
        View::composer(['entradas.index','consolidados.show'], function ($view) {
            View::share('clientes', \App\Cliente::all());
            View::share('etapas', \App\Etapa::all());
        });

        View::composer(['entradas.index','entradas.show','consolidados.show'], function ($view) {
            View::share('guias_impresion', \App\GuiaImpresion::activadas());
        });

        // Global
        View::share('graffiti', new Graffiti(BootstrapIcons::class, 'vectors'));
    }
}
