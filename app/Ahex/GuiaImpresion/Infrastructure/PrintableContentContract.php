<?php

namespace App\Ahex\GuiaImpresion\Infrastructure;

interface PrintableContentContract
{
    public static function contentForPrintingGuide(): array;
}
