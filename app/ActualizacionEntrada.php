<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualizacionEntrada extends Model
{
    protected $table = 'actualizaciones_entrada';

    protected $fillable = [
        'descripcion',
        'entrada_id',
        'user_id',
    ];

    public $timestamps = false;
    
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function updater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function getFechaHoraCreadoAttribute()
    {
        return $this->created_at->format('d M, Y g:i a');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
