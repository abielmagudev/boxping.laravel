<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Salida extends Model
{
    use Modifiers;
    
    protected $fillable = [
        'rastreo',
        'confirmacion',
        'cobertura',
        'direccion',
        'postal',
        'ciudad',
        'estado',
        'pais',
        'notas',
        'status',
        'transportadora_id',
        'entrada_id',
        'created_by',
        'updated_by',
    ];

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }
    
    public function transportadora()
    {
        return $this->belongsTo(Transportadora::class)->withTrashed();
    }

    public function incidentes()
    {
        return $this->belongsToMany(Incidente::class,'salida_incidente');
    }

    public function getIncidentesHtmlAttribute()
    {
        return $this->incidentes->implode('titulo', '<br>');
    }

    public function getMostrarStatusAttribute()
    {
        return ucfirst($this->status);
    }

    public function getMostrarCoberturaAttribute()
    {
        return ucfirst($this->cobertura);
    }

    public function getLocalidadAttribute()
    {
        $filtered = array_filter([$this->ciudad, $this->estado, $this->pais]);
        return implode(', ', $filtered);
    }

    public function scopeExistsWithEntrada($query, $entrada_id)
    {
        return $query->where('entrada_id', $entrada_id)->exists();
    }

    public static function prepare($validated)
    {
        $prepared = [
            'rastreo'      => $validated['rastreo'] ?? null,
            'confirmacion' => $validated['confirmacion'] ?? null,
            'cobertura'    => $validated['cobertura'],
            'direccion'    => isset($validated['direccion']) ? capitalize($validated['direccion']) : null,
            'postal'       => $validated['postal'] ?? null,
            'ciudad'       => isset($validated['ciudad']) ? capitalize($validated['ciudad']) : null,
            'estado'       => isset($validated['estado']) ? capitalize($validated['estado']) : null,
            'pais'         => $validated['pais'] ?? null,
            'notas'        => $validated['notas'] ?? null,
            'status'       => $validated['status'] ?? array_key_first( config('system.salidas.status') ),
            'transportadora_id' => $validated['transportadora'] ?? null,
            'updated_by'   => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
        {
            $prepared = array_merge($prepared, [
                'entrada_id' => $validated['entrada'],
                'created_by' => Fakeuser::live(),
            ]);
        }

        return $prepared;
    }
}