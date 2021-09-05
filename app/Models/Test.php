<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'result'];

    public static function boot()
    {
        parent::boot();

        Test::observe(new \APDS\Observers\UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
