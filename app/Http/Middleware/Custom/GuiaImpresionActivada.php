<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;
use App\GuiaImpresion;

class GuiaImpresionActivada
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $guia = $request->route()->parameter('guia');

        if( is_a($guia, GuiaImpresion::class) && $guia->isDesactivada() )
            return back()->with('failure', 'Selecciona una guía de impresión válida.');
        
        return $next($request);
    }
}
