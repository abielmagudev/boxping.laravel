<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\Consolidado\Domain\EntradasHandler;

class Consolidado extends Model implements Search
{
    use EntradasHandler, Modifiers;

    protected $fillable = array(
        'numero',
        'tarimas',
        'status',
        'notas',
        'cliente_id',
        'created_by',
        'updated_by',
    );

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    public function scopeIsAbierto($query, $value, $column = 'numero')
    {
        return $query->where($column, $value)->where('status', 'abierto')->exists();
    }

    public function scopeSearch($query, $value, $order = 'desc')
    {
        return $query->where('numero', 'like', "%{$value}%")->orderBy('id',$order);
    }

    public function getStatusColorAttribute()
    {
        return config("system.consolidados.status.{$this->status}.color");
    }

    public function isReal()
    {
        return ! is_null($this->id);
    }

    /**
     * 
     * En caso de no encontrar un consolidado existente, 
     * retornará un objeto vacio de Consolidado
     * para crear o actualiza una Entrada.
     * 
     * De manera forzada, siempre retornará un objeto de Consolidado
     * 
     * @return new Consolidado || Consolidado existente
     * 
     */
    public static function searchForceToEntrada($needle)
    {
        if( ! self::where('numero', $needle)->orWhere('id', $needle)->exists() )
            return new self; 
        
        return self::where('numero', $needle)->orWhere('id', $needle)->first();
    }

    public static function prepare($validated)
    {
        $prepared = [
            'numero'     => $validated['numero'],
            'tarimas'    => $validated['tarimas'],
            'status'     => isset($validated['status']) ? $validated['status'] : 'abierto',
            'notas'      => $validated['notas'],
            'cliente_id' => $validated['cliente'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
