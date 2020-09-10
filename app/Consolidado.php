<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;

class Consolidado extends Model implements Search
{
    protected $fillable = array(
        'numero',
        'tarimas',
        'notas',
        'cerrado',
        'cliente_id',
        'created_by_user',
        'updated_by_user',
    );

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by_user');
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('numero', 'like', "%{$value}%")
                     ->orderBy('id','desc')
                     ->get();
    }
}
