<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class FichaApoio extends Model
{
    protected $table =  'ficha_apoios';

    protected $fillable = [
        'nome',
        'path',
        'user_id',
        'curso_id',
        'modulo_id'
    ];


    public function modulos()
    {
        return $this->belongsTo(Modulo::class,'modulo_id','id');
    }
}
