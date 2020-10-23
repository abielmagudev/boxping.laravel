<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etapa extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'slug',
        'realiza_medicion',
        'unica_medida_peso',
        'unica_medida_volumen',
        'created_by',
        'updated_by',
    ];

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
