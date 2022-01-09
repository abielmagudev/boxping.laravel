<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Actions
{
    public function incrementarIntentosImpresion(int $counter = 1)
    {
        $this->intentos_impresion += $counter;
        return $this->save();
    }

    public function obtenerContenidos(\App\Entrada $entrada)
    {
        $self = $this;

        return array_map(function ($classkey_action) use ($self, $entrada) {
            list($classkey, $action) = explode('.', $classkey_action);

            return $self::existsPageContent($classkey, $action)
                    ? $self::callPageContent($classkey, $action, $entrada)
                    : '';
                    
        }, $this->contenido_array);
    }
}
