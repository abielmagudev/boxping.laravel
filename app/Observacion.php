<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observaciones';
    
    protected $fillable = array(
        'entrada_id',
        'contenido',
        'user_id',
    );

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
