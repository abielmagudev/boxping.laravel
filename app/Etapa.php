<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\GuiaImpresion\Application\ModelAttributesPrintableInterface as ModelAttributesPrintable;

class Etapa extends Model implements ModelAttributesPrintable
{
    use SoftDeletes, 
        Modifiers; 
    
    const MEDICION_SIN_NOMBRE = null;
    const SIN_TAREAS = null;

    protected $fillable = [
        'nombre',
        'slug',
        'orden',
        'json_tareas',
        'medicion_unica_peso',
        'medicion_unica_volumen',
        'created_by',
        'updated_by',
    ];

    public static $todas_tareas = [
        'peso'    => 'Medición de peso',
        'volumen' => 'Medición de volúmen',
        'conteo'  => 'Conteo de artículos',
    ];

    public $todas_mediciones_peso, 
           $todas_mediciones_volumen;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->todas_mediciones_peso = config('system.mediciones.peso');
        $this->todas_mediciones_volumen = config('system.mediciones.longitud');
    }



    /** TODAS LAS TAREAS */

    public function getTodasTareasAttribute()
    {
        return self::$todas_tareas;
    }

    public function existsInTodasTareas($key)
    {
        return isset( $this->todas_tareas[$key] );
    }

    public function filterTodasTareas()
    {
        $model = $this;

        return array_filter($this->todas_tareas, function ($tarea) use ($model) {
            return in_array($tarea, $model->tareas);
        }, ARRAY_FILTER_USE_KEY);
    }


    /** TAREAS */

    public function getTareasAttribute()
    {
        return json_decode($this->json_tareas);
    }

    public function getTareasTextoAttribute()
    {
        if( ! $this->hasTareas() )
            return 'ninguna';

        return implode(', ', $this->tareas);
    }

    public function descripcionesTareas($glue = false)
    {
        if( ! $this->hasTareas() )
            return is_string($glue) ? self::SIN_TAREAS : [];
        
        $descripciones = array_values( $this->filterTodasTareas() );

        return is_string($glue) ? implode($glue, $descripciones) : $descripciones;
    }

    public function hasTareas()
    {
        return is_array($this->tareas) && count($this->tareas) > 0;
    }

    public function hasTarea(string $key)
    {
        if( ! $this->hasTareas() )
            return self::SIN_TAREAS;

        return in_array($key, $this->tareas);
    }



    /** MEDICIONES UNICAS */

    public function hasMedicionUnicaPeso()
    {
        return ! is_null($this->medicion_unica_peso) && isset( $this->todas_mediciones_peso[ $this->medicion_unica_peso ] );
    }

    public function hasMedicionUnicaVolumen()
    {
        return ! is_null($this->medicion_unica_volumen) && isset( $this->todas_mediciones_volumen[ $this->medicion_unica_volumen ] );
    }

    public function getNombreMedicionUnicaPesoAttribute()
    {
        if( ! $this->hasMedicionUnicaPeso() )
            return 'cualquiera';
        
        return $this->todas_mediciones_peso[$this->medicion_unica_peso];
    }

    public function getNombreMedicionUnicaVolumenAttribute()
    {
        if( ! $this->hasMedicionUnicaVolumen() )
            return 'cualquiera';

        return $this->todas_mediciones_volumen[$this->medicion_unica_volumen];
    }

    public function getMedicionesPesoAttribute()
    {
        if( ! $this->hasMedicionUnicaPeso() )
            return $this->todas_mediciones_peso;
        
        return [$this->medicion_unica_peso => $this->nombreMedicionUnicaPeso];
    }

    public function getMedicionesVolumenAttribute()
    {
        if( ! $this->hasMedicionUnicaVolumen() )
            return $this->todas_mediciones_volumen;
        
        return [$this->medicion_unica_volumen => $this->nombreMedicionUnicaVolumen];
    }



    /** MEDICIONES GENERALES */

    public function existsMedicionPeso($key)
    {
        return isset( $this->todas_mediciones_peso[$key] );
    }

    public function existsMedicionVolumen($key)
    {
        return isset( $this->todas_mediciones_volumen[$key] );
    }
    
    public function nombreMedicionPeso($key)
    {
        if( ! $this->existsMedicionPeso($key) )
            return self::MEDICION_SIN_NOMBRE;

        return $this->todas_mediciones_peso[$key];
    }

    public function nombreMedicionVolumen($key)
    {
        if( ! $this->existsMedicionVolumen($key) )
            return self::MEDICION_SIN_NOMBRE;

        return $this->todas_mediciones_peso[$key];
    }



    /** SCOPES */

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }



    /** RELATIONSHIPS */

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class)->using(EntradaEtapa::class);
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }



    // ESTATICAS

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'slug' => Str::slug($validated['nombre']),
            'orden' => $validated['orden'],
            'json_tareas' => $validated['tareas'] ? json_encode($validated['tareas']) : null,
            'medicion_unica_peso' => isset($validated['medicion_peso']) ? $validated['medicion_peso'] : null,
            'medicion_unica_volumen' => isset($validated['medicion_volumen']) ? $validated['medicion_volumen'] : null,
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
