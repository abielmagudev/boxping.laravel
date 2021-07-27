<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\Suppliers\Slugger\Slugger;

class Etapa extends Model
{
    use SoftDeletes, Modifiers;
    
    protected $fillable = [
        'nombre',
        'slug',
        'orden',
        'realiza_medicion',
        'unica_medida_peso',
        'unica_medida_volumen',
        'created_by',
        'updated_by',
    ];

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

    public function getMedidasPesoAttribute()
    {
        if( ! is_null($this->medida_peso) )
            return array($this->medida_peso);

        return config('system.medidas.peso');
    }

    public function getMedidasVolumenAttribute()
    {
        if( ! is_null($this->medida_volumen) )
            return array($this->medida_volumen);

        return config('system.medidas.volumen');
    }

    public static function prepare($validated)
    {
        $slugger = new Slugger;

        $prepared = [
            'nombre' => $validated['nombre'],
            'slug' => $slugger->kebab($validated['nombre']),
            'orden' => $validated['orden'],
            'realiza_medicion' => $validated['realiza_medicion'] ? 1 : 0,
            'medida_peso' => isset($validated['unica_medida_peso']) ? $validated['unica_medida_peso'] : null,
            'medida_volumen' => isset($validated['unica_medida_volumen']) ? $validated['unica_medida_volumen'] : null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
