<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'entrada_comentarios';
    
    protected $fillable = array(
        'entrada_id',
        'contenido',
        'created_by',
    );

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
