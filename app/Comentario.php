<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
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

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function prepare($validated)
    {
        return [
            'entrada_id' => $validated['entrada'],
            'contenido'  => $validated['contenido'],
            'created_by' => Fakeuser::live(),
        ];
    }
}
