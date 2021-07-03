<?php

namespace App\Ahex\Entrada\Application\Printing;

interface PrintingInterface
{
    public function content($entrada);
    public function sheet();
}
