<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrintingRequest;
use Illuminate\Http\Request;
use App\Consolidado;
use App\Entrada;
use App\Salida;
use App\Ahex\Printing\Application\EntradaTemplate;
use App\Ahex\Printing\Application\ConsolidadoTemplate;

class PrintingController extends Controller
{
    public function entrada(Entrada $entrada, PrintingRequest $request)
    {
        $template = new EntradaTemplate($request->input('hoja', 'informacion'), $entrada);
        return view('printing.single', $template->content());
    }

    public function entradas(Request $request)
    {
        $entradas = Entrada::whereIn('id', $request->get('list'))->get();
        $collection = [];
        return view('printing.multiple', [
            'collection' => $collection,
            'sheet' => 'Informacion | Etiquetas | Etapas',
        ]);
    }

    public function salida(Salida $salida)
    {
        return view('printing.single', [
            'salida' => $salida,
            'sheet' => 'informacion',
        ]);
    }

    public function consolidado(Consolidado $consolidado, PrintingRequest $request)
    {
        $sheet    = $request->input('hoja', 'informacion');
        $layout   = $sheet <> 'informacion' ? 'printing.multiple' : 'printing.single';
        $template = new ConsolidadoTemplate($sheet, $consolidado);
        return view($layout, $template->content());
    }
}
