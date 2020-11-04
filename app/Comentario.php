<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'entrada_comentarios';
    
    protected $with = ['creator'];
    
    protected $fillable = array(
        'contenido',
        'entrada_id',
        'created_by',
    );

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
