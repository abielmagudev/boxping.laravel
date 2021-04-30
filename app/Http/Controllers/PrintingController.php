<?php

namespace App\Http\Controllers;

use App\Consolidado;
use App\Entrada;
use App\Salida;
use Illuminate\Http\Request;
use App\Http\Requests\EntradaPrintingRequest;
use App\Http\Requests\ConsolidadoPrintingRequest;

use App\Ahex\Printing\Application\EntradaSheet;
use App\Ahex\Printing\Application\ConsolidadoSheet;

class PrintingController extends Controller
{
    public function entrada(Entrada $entrada, EntradaPrintingRequest $request)
    {
        $template = new EntradaSheet($request, $entrada);
        return view($template->layout, $template->content);
    }

    public function entradas(EntradasPrintingRequest $request)
    {
        $template = new EntradasSheet($request);
        return view($template->layout, $template->content);
    }

    public function salida(Salida $salida, SalidaPrintingRequest $request)
    {
        // $template = new SalidaSheet($request, $salida);
        // return view($template->layout, $template->content);
    }

    public function consolidado(Consolidado $consolidado, ConsolidadoPrintingRequest $request)
    {
        $template = new ConsolidadoSheet($request, $consolidado);
        return view($template->layout, $template->content);
    }
}
