<?php 

namespace App\Ahex\GuiaImpresion\Domain;

use App\Ahex\GuiaImpresion\Infrastructure\Contents\ClienteContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\ConfirmadoContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\ConsolidadoContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\DestinatarioContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\EntradaContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\EtapaContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\ImportadoContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\ReempacadoContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\RemitenteContent;
use App\Ahex\GuiaImpresion\Infrastructure\Contents\SalidaContent;
use App\Entrada;

trait PageContent
{
    protected static $all_page_contents = [
        'entrada' => EntradaContent::class,
        'cliente' => ClienteContent::class,
        'consolidado' => ConsolidadoContent::class,
        'destinatario' => DestinatarioContent::class,
        'remitente' => RemitenteContent::class,
        'confirmado' => ConfirmadoContent::class,
        'importado' => ImportadoContent::class,
        'reempacado' => ReempacadoContent::class,
        'salida' => SalidaContent::class,
        // 'etapas' => EtapaContent::class,
    ];

    public static function allPageContents()
    {
        return self::$all_page_contents;
    }

    public static function existsPageContent(string $classkey, string $action = null)
    {
        if( is_null($action) )
            return isset( self::$all_page_contents[$classkey] );

        return array_key_exists($classkey, self::$all_page_contents) && method_exists(self::$all_page_contents[$classkey], $action);
    }

    public static function getPageContent(string $classkey)
    {
        return self::$all_page_contents[$classkey];
    }

    public static function callPageContent(string $classkey, string $action, Entrada $entrada)
    {
        $classname = self::getPageContent($classkey);
        return call_user_func([$classname, $action], $entrada);
    }
}
