<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Configuracion extends Model
{
    use HasFactory;
    
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
