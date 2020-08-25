<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $table = 'entrada_medidas';
    
    protected $fillable = [
        'entrada_id',
        'medidor_id',
        'peso',
        'pesaje',
        'ancho',
        'altura',
        'profundidad',
        'volumen',
        'created_by_user',
        'updated_by_user',
    ];

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }

    public function medidor()
    {
        return $this->belongsTo(Medidor::class);
    }

    public function creater()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by_user');
    }
}
