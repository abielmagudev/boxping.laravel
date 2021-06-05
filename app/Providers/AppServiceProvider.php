<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('symbols', config('resources.symbols'));
        View::share('svg', config('resources.bootstrap-svg'));
        View::share('icons', config('resources.bootstrap-icons'));
        View::composer('entradas.index', function ($view) {
            View::share('clientes', \App\Cliente::all());
            View::share('etapas', \App\Etapa::all());
        });
    }
}
