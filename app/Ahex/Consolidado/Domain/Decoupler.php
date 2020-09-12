<?php 

namespace App\Ahex\Consolidado\Domain;

use App\Entrada;
use App\Medida;
use App\Observacion;

Abstract class Decoupler
{
    public static function entradas($request, $entradas)
    {
        if( ! count($entradas) )
            return; // Retorna si no contiene entradas

        if( self::willDelete($request) ) 
            return self::delete($entradas); // True: Elimina las entradas
        
        return self::unbind($entradas); // False: Actualiza las entradas
    }

    /**
     * 
     * Valida la petición de eliminar a boleana
     * 
     * @return true: Elimina las entradas
     * 
     * @return false: Actualiza a nulo las entradas
     * 
     */
    private static function willDelete($request)
    {
        return filter_var($request, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * 
     * Elimina las entradas del consolidado
     * 
     */
    private static function delete($entradas)
    {
        Medida::whereIn('entrada_id', $entradas)->delete();
        Observacion::whereIn('entrada_id', $entradas)->delete();
        return Entrada::whereIn('id', $entradas)->delete();
    }

    /**
     * 
     * Actualiza las entradas del consolidado a null
     * 
     */
    private static function unbind($entradas)
    {
        return Entrada::whereIn('id', $entradas)->update(['consolidado_id' => null]);
    }
}
