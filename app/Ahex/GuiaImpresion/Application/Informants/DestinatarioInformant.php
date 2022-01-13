<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class DestinatarioInformant extends Informant
{
    protected static $actions_labels = [
        'informacion' => [
            'completa' => 'Información completa del destinatario (Excepto notas)',
            'compacta' => 'Destinatario',
        ],
        'domicilio' => [
            'completa' => 'Domicilio del destinatario (Calle, número y código postal)',
            'compacta' => 'Destinatario(dirección)',
        ],
        'postal' => [
            'completa' => 'Código postal del destinatario',
            'compacta' => 'Destinatario(postal)',
        ],
        'localidad' => [
            'completa' => 'Localidad del destinatario (Ciudad, estado y pais)',
            'compacta' => 'Destinatario(localidad)',
        ],
        'referencias' => [
            'completa' => 'Referencias del destinatario',
            'compacta' => 'Destinatario(referencias)',
        ],
        'telefono' => [
            'completa' => 'Telefóno(s) del destinatario',
            'compacta' => 'Destinatario(teléfono)',
        ],
        'notas' => [
            'completa' => 'Notas del destinatario',
            'compacta' => 'Destinatario(notas)',
        ],
    ];
    
    public static function informacion(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->informacion_completa : 'informacion?';
    }

    public static function domicilio(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->domicilio_completo : 'domicilio?';
    }

    public static function postal(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->postal : 'postal?';
    }

    public static function localidad(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->localidad : 'localidad?';
    }

    public static function referencias(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->referencias : 'referencias?';
    }

    public static function telefono(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->telefono : 'telefono?';
    }

    public static function notas(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->notas : '';
    }
}
