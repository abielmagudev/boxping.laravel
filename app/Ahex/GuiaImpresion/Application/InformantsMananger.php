<?php 

namespace App\Ahex\GuiaImpresion\Application;

class InformantsMananger
{
    private static $informants = [
        'entrada' => \App\Ahex\GuiaImpresion\Application\Informants\EntradaInformant::class,
        'cliente' => \App\Ahex\GuiaImpresion\Application\Informants\ClienteInformant::class,
        'consolidado' => \App\Ahex\GuiaImpresion\Application\Informants\ConsolidadoInformant::class,
        'confirmado' => \App\Ahex\GuiaImpresion\Application\Informants\ConfirmadoInformant::class,
        'destinatario' => \App\Ahex\GuiaImpresion\Application\Informants\DestinatarioInformant::class,
        'remitente' => \App\Ahex\GuiaImpresion\Application\Informants\RemitenteInformant::class,
        'importado' => \App\Ahex\GuiaImpresion\Application\Informants\ImportadoInformant::class,
        'reempacado' => \App\Ahex\GuiaImpresion\Application\Informants\ReempacadoInformant::class,
        'salida' => \App\Ahex\GuiaImpresion\Application\Informants\SalidaInformant::class,
        'etapa' => \App\Ahex\GuiaImpresion\Application\Informants\EtapaInformant::class,
        'tareas' => \App\Ahex\GuiaImpresion\Application\Informants\EtapaTareasInformant::class,
    ];

    public static function all()
    {
        return self::$informants;
    }

    public static function get(string $name)
    {
        return self::all()[$name];
    }

    public static function exists(string $name)
    {
        return array_key_exists($name, self::all());
    }

    public static function has(string $name, string $action)
    {
        return self::exists($name) && is_callable([self::get($name), $action]);
    }

    public static function call(string $name, string $action, \App\Entrada $entrada)
    {
        return call_user_func([self::get($name), $action], $entrada);
    }
}
