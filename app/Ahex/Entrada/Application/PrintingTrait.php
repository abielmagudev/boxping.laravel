<?php 

namespace App\Ahex\Entrada\Application;

use App\Entrada;
use App\Salida;
use App\Etapa;
use Illuminate\Http\Request;

Trait PrintingTrait
{
    public function imprimir(Entrada $entrada, $hoja)
    {
        if( is_null($entrada->id) || ! in_array($hoja,['informacion','etiqueta']) )
            return back()->with('Selecciona una opción válida de impresión');

        if( $hoja === 'informacion' )
            return $this->imprimirInformacion($entrada);
        
        return $this->imprimirEtiqueta($entrada);
    }
    
    private function imprimirInformacion($entrada)
    {
        return view('entradas.printing.informacion', [
            'entrada' => $entrada,
            'salida'  => Salida::where('entrada_id', $entrada->id)->first() ?? new Salida,
            'etapas'  => $entrada->etapas,
        ]);  
    }
    
    private function imprimirEtiqueta($entrada)
    {
        return view('entradas.printing.etiqueta')->with('entrada',$entrada);
    }
}
