<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class TutorCurso extends Model
{
    protected $table = 'tutor_cursos';

    protected $fillable = [
        'nome',
        'user_id',
        'curso_id'
    ];

    public function cursos()
    {
        return $this->belongsTo(Curso::class,'curso_id','id');
    }
}
