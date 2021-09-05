<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    protected $table = 'test_types';

    protected $fillable = ['nome'];
}
