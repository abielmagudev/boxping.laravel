<?php 

namespace App\Ahex\GuiaImpresion\Application;

class InformantsMananger
{
    private static $informants = [
        'cliente' => \App\Ahex\GuiaImpresion\Application\Informants\ClienteInformant::class,
        'confirmado' => \App\Ahex\GuiaImpresion\Application\Informants\ConfirmadoInformant::class,
        'consolidado' => \App\Ahex\GuiaImpresion\Application\Informants\ConsolidadoInformant::class,
        'destinatario' => \App\Ahex\GuiaImpresion\Application\Informants\DestinatarioInformant::class,
        'entrada' => \App\Ahex\GuiaImpresion\Application\Informants\EntradaInformant::class,
        'etapa' => \App\Ahex\GuiaImpresion\Application\Informants\EtapaInformant::class,
        'importado' => \App\Ahex\GuiaImpresion\Application\Informants\ImportadoInformant::class,
        'reempacado' => \App\Ahex\GuiaImpresion\Application\Informants\ReempacadoInformant::class,
        'remitente' => \App\Ahex\GuiaImpresion\Application\Informants\RemitenteInformant::class,
        'salida' => \App\Ahex\GuiaImpresion\Application\Informants\SalidaInformant::class,
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
        return self::exists($name) && method_exists(self::get($name), $action);
    }

    public static function call(string $name, string $action, \App\Entrada $entrada)
    {
        return call_user_func([self::get($name), $action], $entrada);
    }
}
