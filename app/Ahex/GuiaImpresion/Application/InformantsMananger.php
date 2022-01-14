<?php 

namespace App\Ahex\GuiaImpresion\Application;

use App\Ahex\GuiaImpresion\Application\Informants\ClienteInformant;
use App\Ahex\GuiaImpresion\Application\Informants\ConfirmadoInformant;
use App\Ahex\GuiaImpresion\Application\Informants\ConsolidadoInformant;
use App\Ahex\GuiaImpresion\Application\Informants\DestinatarioInformant;
use App\Ahex\GuiaImpresion\Application\Informants\EntradaInformant;
use App\Ahex\GuiaImpresion\Application\Informants\EtapaInformant;
use App\Ahex\GuiaImpresion\Application\Informants\ImportadoInformant;
use App\Ahex\GuiaImpresion\Application\Informants\ReempacadoInformant;
use App\Ahex\GuiaImpresion\Application\Informants\RemitenteInformant;
use App\Ahex\GuiaImpresion\Application\Informants\SalidaInformant;
use App\Ahex\GuiaImpresion\Application\Informants\Informant;
use App\Entrada;

class InformantsMananger
{
    private static $all_informants = [
        'entrada' => EntradaInformant::class,
        'cliente' => ClienteInformant::class,
        'consolidado' => ConsolidadoInformant::class,
        'destinatario' => DestinatarioInformant::class,
        'remitente' => RemitenteInformant::class,
        'confirmado' => ConfirmadoInformant::class,
        'importado' => ImportadoInformant::class,
        'reempacado' => ReempacadoInformant::class,
        'salida' => SalidaInformant::class,
        // 'etapas' => EtapaInformant::class,
    ];

    public static function all()
    {
        return self::$all_informants;
    }

    public static function exists(string $informant_key, string $action = null)
    {
        if( is_null($action) )
            return isset( self::$all_informants[$informant_key] );

        return array_key_exists($informant_key, self::$all_informants) && method_exists(self::$all_informants[$informant_key], $action);
    }

    public static function informant(string $key)
    {
        return self::all()[$key];
    }

    public static function action(string $informant_key, string $action, Entrada $entrada)
    {        
        return call_user_func([self::informant($informant_key), $action], $entrada);
    }

    public static function description(string $informant_key, string $action, string $type_description)
    {
        return call_user_func_array([self::informant($informant_key), 'getActionDescription'], [$action, $type_description]);
    }

    public static function descriptionTypes(string $glue = null)
    {
        return isset($glue) ? implode($glue, Informant::$description_types) : Informant::$description_types;
    }

    public static function defaultDescriptionType()
    {
        return Informant::$default_description_type;
    }
}
