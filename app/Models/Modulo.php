<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $fillable = [
        'nome',
        'desc',
        'curso_id',
        'anexo_id',
    ];

    public function curso()
    {
        $this->belongsTo(Curso::class);
    }
}
