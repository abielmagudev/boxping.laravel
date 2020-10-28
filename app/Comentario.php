<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'entrada_comentarios';
    
    protected $with = ['creator'];
    
    protected $fillable = array(
        'contenido',
        'created_by',
        'entrada_id',
    );

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
