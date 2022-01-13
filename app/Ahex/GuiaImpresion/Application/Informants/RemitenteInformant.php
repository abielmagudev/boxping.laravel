<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class RemitenteInformant extends Informant
{
    protected static $actions_labels = [
        'informacion' => [
            'completa' => 'Información completa del remitente (Excepto notas)',
            'compacta' => 'Remitente',
        ],
        'domicilio' => [
            'completa' => 'Domicilio del remitente (Calle, número y código postal)',
            'compacta' => 'Remitente(dirección)',
        ],
        'postal' => [
            'completa' => 'Código postal del remitente',
            'compacta' => 'Remitente(postal)',
        ],
        'localidad' => [
            'completa' => 'Localidad del remitente (Ciudad, estado y pais)',
            'compacta' => 'Remitente(localidad)',
        ],
        'telefono' => [
            'completa' => 'Telefóno(s) del remitente',
            'compacta' => 'Remitente(teléfono)',
        ],
        'notas' => [
            'completa' => 'Notas del remitente',
            'compacta' => 'Remitente(notas)',
        ],
    ];

    public static function informacion(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->informacion_completa;
    }

    public static function domicilio(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->domicilio_completo;
    }

    public static function postal(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->postal;
    }

    public static function localidad(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->localidad;
    }

    public static function telefono(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->telefono;
    }

    public static function notas(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->notas;
    }
}
