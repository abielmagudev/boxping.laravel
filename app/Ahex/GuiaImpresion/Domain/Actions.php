<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Actions
{
    public function incrementarIntentos()
    {
        $this->intentos++;
        return $this;
    }

    public static function getModelsContent()
    {
        return [
            'entrada' => \App\Entrada::attributesToPrint(),
            'remitente' => \App\Remitente::attributesToPrint(),
            'destinatario' => \App\Destinatario::attributesToPrint(),
            'salida' => \App\Salida::attributesToPrint(),
            'etapas' => \App\Etapa::attributesToPrint(),
        ];
    }
}
