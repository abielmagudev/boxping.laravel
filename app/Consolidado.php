<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consolidado extends Model
{
    protected $fillable = array(
        'numero',
        'tarimas',
        'notas',
        'cerrado',
        'cliente_id',
    );

    public function cliente()
    {
        return $this->BelongsTo(Cliente::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
