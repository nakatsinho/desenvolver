<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class UserCurso extends Model
{
    protected $table = 'user_cursos';
    
    protected $fillable = [
        'user_id',
        'curso_id',
    ];
}
