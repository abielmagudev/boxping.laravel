<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consolidado;
use App\Entrada;
use App\Salida;
use App\Http\Requests\ConsolidadoPrintingRequest;
use App\Http\Requests\EntradaPrintingRequest;
use App\Http\Requests\EntradasPrintingRequest;
use App\Ahex\Printing\Application\ConsolidadoSheet;
use App\Ahex\Printing\Application\EntradaSheet;
use App\Ahex\Printing\Application\TrayManager;

class PrintingController extends Controller
{
    public function entrada(Entrada $entrada, EntradaPrintingRequest $request)
    {
        $template = new EntradaSheet($entrada, $request);
        
        return view(
            TrayManager::layout('single'), 
            $template->content()
        );
    }

    public function entradas(EntradasPrintingRequest $request)
    {
        $entradas   = Entrada::whereIn('id', $request->lista)->get();
        $collection = EntradaSheet::collection($entradas, $request);

        return view(
            TrayManager::layout('multiple'),
            compact('collection')
        );
    }

    public function consolidado(Consolidado $consolidado, ConsolidadoPrintingRequest $request)
    {
        $template = new ConsolidadoSheet($request, $consolidado);
        return view($template->layout, $template->content);
    }

    public function salida(Salida $salida, SalidaPrintingRequest $request)
    {
        // $template = new SalidaSheet($request, $salida);
        // return view($template->layout, $template->content);
    }
}
