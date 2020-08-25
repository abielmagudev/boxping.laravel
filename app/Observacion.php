<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'entrada_observaciones';
    
    protected $fillable = array(
        'entrada_id',
        'user_id',
        'contenido',
    );

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
