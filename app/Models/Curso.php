<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nome',
        'desc',
        'lancamento',
        'duracao',
        'status_id',
        'tutor_id',
        'preco',
        'foto',
        'categoria_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }
}
