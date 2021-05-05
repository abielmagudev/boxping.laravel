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
        $relations = [
            'consolidado',
            'cliente',
            'remitente',
            'destinatario',
            'conductor',
            'vehiculo',
            'reempacador',
            'codigor',
            'salida',
            'creator',
            'updater'
        ];

        $entradas   = Entrada::with($relations)->whereIn('id', $request->lista)->distinct('user_id')->get();
        $collection = EntradaSheet::collection($entradas, $request);

        return view(
            TrayManager::layout('multiple'),
            compact('collection')
        );
    }

    public function consolidado(Consolidado $consolidado, ConsolidadoPrintingRequest $request)
    {
        $layout = ConsolidadoSheet::isCollectionSheet($request->hoja) 
                ? TrayManager::layout('multiple')
                : TrayManager::layout('single');

        $template = new ConsolidadoSheet($consolidado, $request);

        return view($layout, $template->content());
    }

    public function salida(Salida $salida, SalidaPrintingRequest $request)
    {
        // $template = new SalidaSheet($salida, $request);
        // return view(TrayManager::layout('single'), $template->content());
    }
}
