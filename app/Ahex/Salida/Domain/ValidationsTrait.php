<?php

namespace App\Ahex\Salida\Domain;

trait ValidationsTrait{
    public function isCoberturaOcurre()
    {
        return $this->cobertura === 'ocurre';
    }
}
