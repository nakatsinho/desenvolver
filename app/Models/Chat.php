<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $fillable = [
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

     public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Chat::class,'parent_id');
    } 

    public function likes()
    {
        return $this->morphMany(Like::class,'likes');
    } 
}
