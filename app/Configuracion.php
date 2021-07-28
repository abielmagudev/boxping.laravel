<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuraciones';

    protected $fillable = [
        'cliente_alias_numero',
    ];

    public static function prepare($validated)
    {
        return [
            'cliente_alias_numero' => isset($validated['cliente_alias_numero']) ? 1 : 0,
        ];
    }
}
