<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;
        
    protected $with = ['creator'];
    
    protected $fillable = array(
        'contenido',
        'entrada_id',
        'created_by',
    );

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFechaHoraCreadoAttribute()
    {
        return $this->created_at->format('d M, Y g:i a');
    }
    
    public function getContenidoHtmlAttribute()
    {
        return nl2br( e($this->contenido) );
    }

    public static function prepare(array $validated)
    {
        return [
            'entrada_id' => $validated['entrada'],
            'contenido'  => $validated['contenido'],
            'created_by' => auth()->user()->id,
        ];
    }
}
