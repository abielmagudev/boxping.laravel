<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrintingRequest;
use Illuminate\Http\Request;
use App\Consolidado;
use App\Entrada;
use App\Salida;
use App\Ahex\Printing\Application\Templates\EntradaTemplate;
use App\Ahex\Printing\Application\Templates\ConsolidadoTemplate;

class PrintingController extends Controller
{
    public function entrada(Entrada $entrada, PrintingRequest $request)
    {
        $sheet = $request->input('hoja', 'informacion');
        $template = new EntradaTemplate($sheet, $entrada);
        return view('printing.single', $template->content());
    }

    public function entradas(PrintingRequest $request)
    {
        $sheet = $request->input('hoja','informacion');
        return view('printing.multiple', [
            'collection' => EntradaTemplate::collection($sheet, $request->lista),
            'sheet' => $sheet,
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
