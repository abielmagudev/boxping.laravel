<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;
use App\Ahex\Fake\Domain\Fakeuser;

class Consolidado extends Model implements Search
{
    protected $fillable = array(
        'numero',
        'tarimas',
        'abierto',
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
        return $this->belongsTo(Cliente::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeIsAbierto($query, $value, $column = 'numero')
    {
        return $query->where($column, $value)->where('abierto', 1)->exists();
    }

    public function scopeSearch($query, $value, $order = 'desc')
    {
        return $query->where('numero', 'like', "%{$value}%")->orderBy('id',$order);
    }

    public static function prepare($validated)
    {
        $prepared = [
            'numero'     => $validated['numero'],
            'tarimas'    => $validated['tarimas'],
            'notas'      => $validated['notas'],
            'abierto'    => isset($validated['cerrado']) ? 0 : 1,
            'cliente_id' => $validated['cliente'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
