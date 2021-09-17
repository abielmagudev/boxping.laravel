<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\GuiaImpresion\Application\ModelAttributesPrintableInterface as ModelAttributesPrintable;

class Etapa extends Model implements ModelAttributesPrintable
{
    use SoftDeletes, Modifiers;
    
    const SIN_NOMBRE_MEDICION = null;
    const SIN_CONCEPTO_MEDICION = null;

    protected $fillable = [
        'nombre',
        'slug',
        'orden',
        'mediciones',
        'medicion_peso',
        'medicion_volumen',
        'created_by',
        'updated_by',
    ];

    public $todas_mediciones_peso, 
           $todas_mediciones_volumen,
           $conceptos_medicion;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->todas_mediciones_peso = config('system.mediciones.peso');
        $this->todas_mediciones_volumen = config('system.mediciones.longitud');
        $this->conceptos_medicion = [
            'solo registrar',
            'medición de peso',
            'medición de peso y volúmen',
        ];
    }

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class)->using(EntradaEtapa::class);
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    public function conceptoMedicion(int $nivel = null)
    {
        $nivel_medicion = ! is_null($nivel) ? $nivel : $this->mediciones;

        if( isset($this->conceptos_medicion[$nivel_medicion]) )
            return $this->conceptos_medicion[$nivel_medicion];         
            
        return static::SIN_CONCEPTO_MEDICION;
    }

    public function hasMedicionPeso()
    {
        return ! is_null($this->medicion_peso) && isset($this->todas_mediciones_peso[$this->medicion_peso]);
    }

    public function hasMedicionVolumen()
    {
        return ! is_null($this->medicion_volumen) && isset($this->todas_mediciones_volumen[$this->medicion_volumen]);
    }

    public function getNombreMedicionPeso($abreviacion = null)
    {
        if( ! is_null($abreviacion) )
            return $this->todas_mediciones_peso[$abreviacion];
        
        if( $this->hasMedicionPeso() )
            return $this->todas_mediciones_peso[$this->medicion_peso];
        
        return static::SIN_NOMBRE_MEDICION;
    }

    public function getNombreMedicionVolumen($abreviacion = null)
    {
        if( ! is_null($abreviacion) )
            return $this->todas_mediciones_volumen[$abreviacion];
        
        if( $this->hasMedicionVolumen() )
            return $this->todas_mediciones_volumen[$this->medicion_volumen];   
        
        return static::SIN_NOMBRE_MEDICION;
    }

    public function getMedicionesPesoAttribute()
    {
        if( ! $this->hasMedicionPeso() )
            return $this->todas_mediciones_peso;
        
        return [$this->medicion_peso => $this->getNombreMedicionPeso()];
    }

    public function getMedicionesVolumenAttribute()
    {
        if( ! $this->hasMedicionVolumen() )
            return $this->todas_mediciones_volumen;
        
        return [$this->medicion_volumen => $this->getNombreMedicionVolumen()];
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'slug' => Str::slug($validated['nombre']),
            'orden' => $validated['orden'],
            'mediciones' => $validated['mediciones'] ? $validated['mediciones'] : 0,
            'medicion_peso' => isset($validated['medicion_peso']) ? $validated['medicion_peso'] : null,
            'medicion_volumen' => isset($validated['medicion_volumen']) ? $validated['medicion_volumen'] : null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }

    public static function attributesToPrint(): array
    {
        if( ! $all = self::all()->toArray() )
            return [];

        foreach($all as $etapa) 
            $attributes[$etapa['slug']] = $etapa['nombre'];

        return $attributes;
    }
}
