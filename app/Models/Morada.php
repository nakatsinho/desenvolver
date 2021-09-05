<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    protected $table = 'moradas';

    protected $fillable = [
        'local',
        'pais_id',
        'provincia_id',
        'distrito_id',
        'user_id'
    ];


    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}
