<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

class Etapa extends Model implements ModifierIdentifiable
{
    use HasFactory,
        HasModifiers,
        SoftDeletes;
    
    const MEDICION_SIN_NOMBRE = null;

    const ETAPA_SIN_TAREAS = [];

    /**
     * Todas las tareas disponibles para cada etapa
     * [nombre de la tarea => descripción de la tarea]
     * 
     * @var array
     */
    public static $tareas = [
        'pesaje' => 'Medidas de pesaje',
        'volumen' => 'Medidas de volúmen',
        'conteo' => 'Conteo de artículos',
    ];

    protected $fillable = [
        'nombre',
        'slug',
        'orden',
        'tareas_encoded',
        'unica_medicion_peso',
        'unica_medicion_volumen',
        'created_by',
        'updated_by',
    ];



    public static function prepare(array $validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'slug' => Str::slug($validated['nombre']),
            'orden' => $validated['orden'],
            'tareas_encoded' => isset($validated['tareas']) ? json_encode($validated['tareas']) : null,
            'unica_medicion_peso' => isset($validated['medicion_peso']) ? $validated['medicion_peso'] : null,
            'unica_medicion_volumen' => isset($validated['medicion_volumen']) ? $validated['medicion_volumen'] : null,
            'updated_by' => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }


    
    // Tareas

    public static function tareas(bool $only_names = null)
    {
        if( is_bool($only_names) )
            return $only_names ? array_keys(self::$tareas) : array_values(self::$tareas);
        
        return self::$tareas;
    }

    public static function filterTareas(array $etapa_tareas)
    {
        return array_filter(self::tareas(), function ($tarea) use ($etapa_tareas) {
            return in_array($tarea, $etapa_tareas);
        }, ARRAY_FILTER_USE_KEY);
    }

    public static function existsTarea(string $key)
    {
        return isset( self::tareas()[$key] );
    }



    // Mediciones

    public static function medicionesPeso(bool $only_shortnames = null)
    {
        $mediciones = config('system.mediciones.peso');

        if( is_bool($only_shortnames) )
            return $only_shortnames ? array_keys($mediciones) : array_values($mediciones);

        return $mediciones;
    }

    public static function medicionesVolumen(bool $only_shortnames = null)
    {
        $mediciones = config('system.mediciones.longitud');
        
        if( is_bool($only_shortnames) )
            return $only_shortnames ? array_keys($mediciones) : array_values($mediciones);

        return $mediciones;
    }

    public static function nombreMedicionPeso(string $key)
    {
        if( ! self::existsMedicionPeso($key) )
            return self::MEDICION_SIN_NOMBRE;

        return self::medicionesPeso()[$key];
    }

    public static function nombreMedicionVolumen(string $key)
    {
        if( ! self::existsMedicionVolumen($key) )
            return self::MEDICION_SIN_NOMBRE;

        return self::medicionesVolumen()[$key];
    }

    public static function existsMedicionPeso(string $key)
    {
        return isset( self::medicionesPeso()[$key] );
    }

    public static function existsMedicionVolumen(string $key)
    {
        return isset( self::medicionesVolumen()[$key] );
    }



    // Attributes

    public function getTareasArrayAttribute()
    {
        return json_decode($this->tareas_encoded, true) ?? [];
    }

    public function getTareasAttribute()
    {
        if(! $this->hasTareas() )
            return 'ninguna';

        return implode(', ', $this->tareas_array);
    }

    public function getDescripcionesTareasAttribute()
    {
        if(! $this->hasTareas() )
            return self::ETAPA_SIN_TAREAS;

        $tareas_filtradas = self::filterTareas( $this->tareas_array );
        return array_values($tareas_filtradas);
    }

    public function descripcionesTareas(string $glue = null)
    {
        return is_string($glue) &&! empty($glue) 
                ? implode($glue, $this->descripciones_tareas) 
                : $this->descripciones_tareas;
    }

    public function getNombreUnicaMedicionPesoAttribute()
    {
        if(! $this->hasUnicaMedicionPeso() )
            return 'cualquiera';
        
        return self::medicionesPeso()[$this->unica_medicion_peso];
    }

    public function getNombreUnicaMedicionVolumenAttribute()
    {
        if(! $this->hasUnicaMedicionVolumen() )
            return 'cualquiera';

        return self::medicionesVolumen()[$this->unica_medicion_volumen];
    }

    public function getMedicionesPesoAttribute()
    {
        if(! $this->hasMedicionUnicaPeso() )
            return self::medicionesPeso();
        
        return [$this->unica_medicion_peso => $this->nombreMedicionUnicaPeso];
    }

    public function getMedicionesVolumenAttribute()
    {
        if(! $this->hasMedicionUnicaVolumen() )
            return self::medicionesVolumen();
        
        return [$this->unica_medicion_volumen => $this->nombreMedicionUnicaVolumen];
    }



    // Validations

    public function isReal()
    {
        return isset($this->id) && is_int($this->id);
    }

    public function hasTareas()
    {
        return count($this->tareas_array) > 0;
    }

    public function hasTarea(string $key)
    {
        if(! $this->hasTareas() )
            return (bool) self::ETAPA_SIN_TAREAS;

        return in_array($key, $this->tareas_array);
    }

    public function hasUnicaMedicionPeso()
    {
        return ! is_null($this->unica_medicion_peso) && isset( self::medicionesPeso()[ $this->unica_medicion_peso ] );
    }

    public function hasUnicaMedicionVolumen()
    {
        return ! is_null($this->unica_medicion_volumen) && isset( self::medicionesVolumen()[ $this->unica_medicion_volumen ] );
    }



    // Relations

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class)->using(EntradaEtapa::class);
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }



    /** SCOPES */

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }
}
