<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Codigor;
use App\Conductor;
use App\Consolidado;
use App\Destinatario;
use App\Entrada;
use App\Reempacador;
use App\Remitente;
use App\Vehiculo;

class EntradaActualizaciones extends Model
{
    protected $table = 'entrada_actualizaciones';
    
    protected $fillable = [
        'descripcion',
        'entrada_id',
        'user_id',
    ];

    protected static $changes_descriptions = [
        'cliente_id' => 'clienteChanged', 
        'codigor_id' => 'codigorChanged',
        'conductor_id' => 'conductorChanged',
        'confirmado_at' => 'confirmadoChanged',
        'consolidado_id' => 'consolidadoChanged',
        'contenido' => 'contenidoChanged',
        'destinatario_id' => 'destinatarioChanged',
        'importado_fecha' => 'importadoChanged',
        'importado_hora' => 'importadoChanged',
        'numero_cruce' => 'numeroCruceChanged',
        'numero' => 'numeroChanged',
        'reempacado_fecha' => 'reempacadoChanged',
        'reempacado_hora' => 'reempacadoChanged',
        'reempacador_id' => 'reempacadorChanged',
        'remitente_id' => 'remitenteChanged',
        'vehiculo_id' => 'vehiculoChanged',
    ];

    public function updater()
    {
        return $this->hasOne(User::class,'id');
    }

    public static function hasChangeDescription($prop_changed)
    {
        return array_key_exists($prop_changed, self::$changes_descriptions);
    }

    public static function getChangeDescriptionMethod($key)
    {
        return self::$changes_descriptions[$key];
    }

    public static function changeDescription($prop_changed, $entrada)
    {
        $change_description_method = self::getChangeDescriptionMethod($prop_changed);
        return call_user_func([self::class, $change_description_method], $entrada);
    }

    public static function numeroChanged($entrada)
    {
        return "actualizó número {$entrada->getOriginal('numero')} a {$entrada->numero}";
    }

    public static function consolidadoChanged($entrada)
    {
        if( is_null($entrada->getOriginal('consolidado_id')) )
            return "agregó al consolidado {$entrada->consolidado->numero}";

        $consolidated_previous = Consolidado::find( $entrada->getOriginal('consolidado_id') );

        if( is_null($entrada->consolidado_id) )
            return "eliminó del consolidado {$consolidated_previous->numero}";
        
        return "actualizó de consolidado {$consolidated_previous->numero} a {$entrada->consolidado->numero}";
    }

    public static function clienteChanged($entrada)
    {
        $cliente_previous = Cliente::find( $entrada->getOriginal('cliente_id') );
        return "actualizó cliente {$cliente_previous->nombre} a {$entrada->cliente->nombre}";
    }

    public static function contenidoChanged($entrada)
    {
        $contenido_previous = $entrada->getOriginal('contenido') ?? '';
        return "actualizó el contenido: \"{$entrada->contenido}\"";
    }

    public static function remitenteChanged($entrada)
    {
        if( is_null($entrada->getOriginal('remitente_id')) )
            return "actualizó remitente {$entrada->remitente->nombre}";

        $remitente_previous = Remitente::find($entrada->getOriginal('remitente_id'));
        return "cambió remitente {$remitente_previous->nombre} a {$entrada->remitente->nombre}";
    }

    public static function destinatarioChanged($entrada)
    {
        if( is_null($entrada->getOriginal('destinatario_id')) )
            return "actualizó destinatario {$entrada->destinatario->nombre}";

        $destinatario_previous = Destinatario::find($entrada->getOriginal('destinatario_id'));
        return "cambió destinatario {$destinatario_previous->nombre} a {$entrada->destinatario->nombre}";
    }

    public static function conductorChanged($entrada)
    {
        if( is_null($entrada->getOriginal('conductor_id')) )
            return "actualizó conductor {$entrada->conductor->nombre}";

        $conductor_previous = Conductor::find($entrada->getOriginal('conductor_id'));
        return "cambió conductor {$conductor_previous->nombre} a {$entrada->conductor->nombre}";
    } 

    public static function vehiculoChanged($entrada)
    {
        if( is_null($entrada->getOriginal('vehiculo_id')) )
            return "actualizó vehiculo {$entrada->vehiculo->alias}";

        $vehiculo_previous = Vehiculo::find($entrada->getOriginal('vehiculo_id'));
        return "cambió vehiculo {$vehiculo_previous->alias} a {$entrada->vehiculo->alias}";
    } 

    public static function numeroCruceChanged($entrada)
    {
        $numero_cruce_previous = $entrada->getOriginal('numero_cruce') ?? '0';
        return "actualizó número de cruce {$numero_cruce_previous} a {$entrada->numero_cruce}";
    } 

    public static function reempacadorChanged($entrada)
    {
        if( is_null($entrada->getOriginal('reempacador_id')) )
            return "actualizó reempacador {$entrada->reempacador->nombre}";

        $reempacador_previous = Reempacador::find($entrada->getOriginal('reempacador_id'));
        return "cambió reempacador {$reempacador_previous->nombre} a {$entrada->reempacador->nombre}";
    } 

    public static function codigorChanged($entrada)
    {
        if( is_null($entrada->getOriginal('codigor_id')) )
            return "actualizó código de reempacado {$entrada->codigor->nombre}";

        $codigor_previous = Codigor::find($entrada->getOriginal('codigor_id'));
        return "cambió código de reempacado {$codigor_previous->nombre} a {$entrada->codigor->nombre}";
    } 

    public static function confirmadoChanged($entrada)
    {
        return "actualizó confirmación {$entrada->confirmado_at}";
    } 

    public static function importadoChanged($entrada)
    {
        $importacion_previous = !is_null($entrada->getOriginal('importado_fecha')) && !is_null($entrada->getOriginal('importado_hora')) 
                              ? $entrada->getOriginal('importado_fecha') . ' ' . $entrada->getOriginal('importado_hora')
                              : '?';

        $importacion_current = $entrada->importado_fecha . ' ' . $entrada->importado_hora;
        
        return "actualizó importación {$importacion_previous} a {$importacion_current}";
    } 

    public static function reempacadoChanged($entrada)
    {
        $reempacado_previous = !is_null($entrada->getOriginal('reempacado_fecha')) && !is_null($entrada->getOriginal('reempacado_hora')) 
                             ? $entrada->getOriginal('reempacado_fecha') . ' ' . $entrada->getOriginal('reempacado_hora')
                             : '?';

        $reempacado_current = $entrada->reempacado_fecha . ' ' . $entrada->reempacado_hora;
        return "actualizó reempacado {$reempacado_previous} a {$reempacado_current}";
    } 
}
