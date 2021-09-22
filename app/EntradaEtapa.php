<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class EntradaEtapa extends Pivot
{
    use Modifiers;

    const MEDICION_SIN_NOMBRE = null;

    public $incrementing = true;

    public $todas_mediciones_peso,
           $todas_mediciones_volumen;

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }

    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }

    public function hasZona()
    {
        return (bool) is_numeric($this->zona_id);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function hasAlertas()
    {
        return (bool) is_string($this->alertas_id);
    }

    public function alertas()
    {
        if( ! $this->hasAlertas() )
            return collect([]);

        return Alerta::whereIn('id', json_decode($this->alertas_id))->get();
    }

    public function havePeso()
    {
        return is_numeric($this->peso); 
    }

    public function haveVolumen()
    {
        return !is_null($this->ancho) || !is_null($this->altura) || !is_null($this->largo); 
    }

    public function havePesoAndVolumen()
    {
        return $this->havePeso() === true && $this->haveVolumen() === true;
    }

    public function havePesoOrVolumen()
    {
        return $this->havePeso() === true || $this->haveVolumen() === true;
    }

    public function getPesoCompletoAttribute()
    {
        return "{$this->peso} {$this->medida_peso}";
    }

    public function getVolumenCompletoAttribute()
    {
        return "{$this->ancho} x {$this->altura} x {$this->largo} {$this->medida_volumen}";
    }

    public function getNombreMedicionPesoAttribute()
    {
        if( ! $this->existsNombreMedicionPeso($this->medicion_peso) )
            return self::MEDICION_SIN_NOMBRE;

        return $this->todas_mediciones_peso[$this->medicion_peso];
    }

    public function getNombreMedicionVolumenAttribute()
    {
        if( ! $this->existsNombreMedicionVolumen($this->medicion_volumen) )
            return self::MEDICION_SIN_NOMBRE;

        return $this->todas_mediciones_volumen[$this->medicion_volumen];
    }

    public function existsNombreMedicionPeso($key)
    {
        return isset($this->todas_mediciones_peso[$key]);
    }

    public function existsNombreMedicionVolumen($key)
    {
        return isset($this->todas_mediciones_volumen[$key]);
    }

    public static function prepare($validated)
    {
        $prepared = [
            'peso'             => $validated['peso'] ?? null,
            'medicion_peso'    => $validated['medida_peso'] ?? null,
            'ancho'            => $validated['ancho'] ?? null,
            'altura'           => $validated['altura'] ?? null,
            'largo'            => $validated['largo'] ?? null,
            'medicion_volumen' => $validated['medida_volumen'] ?? null,
            'zona_id'          => $validated['zona'] ?? null,
            'alertas_id'       => isset($validated['alertas']) ? json_encode($validated['alertas']) : null,
            'updated_by'       => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->todas_mediciones_peso = config('system.mediciones.peso');
        $this->todas_mediciones_volumen = config('system.mediciones.longitud');
    }
}
