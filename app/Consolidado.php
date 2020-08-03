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

    public function creado()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    public function actualizado()
    {
        return $this->belongsTo(User::class, 'updated_by_user');
    }
}
