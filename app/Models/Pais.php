<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public function statesInOrder()
    {
        return $this->hasMany(Pais::class, 'code')->orderBy('nome', 'asc');
    }
}
