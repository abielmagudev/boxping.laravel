<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrintingRequest;
use Illuminate\Http\Request;
use App\Entrada;
use App\Consolidado;
use App\Etapa;
use App\Salida;

class PrintingController extends Controller
{
    public function consolidado(Consolidado $consolidado, PrintingRequest $request)
    {
        $contenido = $request->input('contenido',null);

        if( $contenido === 'entradas' )
            return view('printing.consolidado-entradas')->with('entradas', $consolidado->entradas);
            
        if( $contenido === 'etiquetas' )
            return view('printing.consolidado-etiquetas')->with('entradas', $consolidado->entradas);
        
        if( $contenido === 'etapas' )
            return view('printing.consolidado-etapas')->with('entradas', $consolidado->entradas);
            
        return view('printing.consolidado')->with('consolidado', $consolidado);
    }

    public function entrada(Entrada $entrada, PrintingRequest $request)
    {
        $contenido = $request->input('contenido',null);

        if( $contenido === 'etiquetas' )
        {
            return view('printing.entrada-etiqueta', [
                'entrada' => $entrada,
            ]);
        }
    
        if( $contenido === 'etapas' )
        {
            return view('printing.entrada-etapas', [
                'entrada' => $entrada,
            ]);
        }
        
        return view('printing.entrada')->with('entrada', $entrada);
    }

    public function salida(Salida $salida)
    {
        return view('printing.salida', [
            'salida' => $salida,
        ]);
    }
}
