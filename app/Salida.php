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
        return $this->belongsTo(Transportadora::class);
    }

    public function incidentes()
    {
        return $this->belongsToMany(Incidente::class,'salida_incidente');
    }

    public function getIncidentesHtmlAttribute()
    {
        return $this->incidentes->implode('titulo', '<br>');
    }

    public static function prepare($validated)
    {
        if( $validated['cobertura'] == 'ocurre' )
        {
            $direccion = $validated['direccion'];
            $postal = $validated['postal'];
            $ciudad = $validated['ciudad'];
            $estado = $validated['estado'];
            $pais = $validated['pais'];
        }

        $prepared = [
            'rastreo'      => $validated['rastreo'] ?? null,
            'confirmacion' => $validated['confirmacion'] ?? null,
            'cobertura'    => $validated['cobertura'],
            'direccion'    => $direccion ?? null,
            'postal'       => $postal ?? null,
            'ciudad'       => $ciudad ?? null,
            'estado'       => $estado ?? null,
            'pais'         => $pais ?? null,
            'notas'        => $validated['notas'] ?? null,
            'status'       => $validated['status'],
            'transportadora_id' => $validated['transportadora'] ?? null,
            'updated_by'   => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
