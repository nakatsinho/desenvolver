<?php

namespace APDS\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 
        'sobrenome',
        'numero', 
        'whatsapp', 
        'email', 
        'password',
        'nascimento',
        'foto',
        'morada_id',
        'role_id',
        'status_id',
        'facebook_id',
        'google_id',
    ];

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses() : HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function getName()
    {
        if ($this->nome &&  $this->sobrenome)
        {
            return "{$this->nome} {$this->sobrenome}";
        }

        if ($this->nome)
        {
            return $this->nome;
        }

        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->sobrenome;
    }

    public function getFirstNameOrUsername()
    {
        return $this->nome ?: $this->sobrenome;
    }

    public function statuses()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }
    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted',true)->get()->
            merge($this->friendOf()->wherePivot('accepted',true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasfriendRequestsPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasfriendRequestsReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    public function addfriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    public function acceptfriendRequest(User $user)
    {
        $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
            'accepted' => true,
        ]);
    }
    public function isfriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }

    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }

    public function like()
    {
        return $this->morphMany(Like::class,'likes');
    }

    public function hasLikedStatus (Chat $status)
    {
        return (bool) $status->likes->where('user_id', $this->id)->count();
    }
    
    public function dataOfStudent()
    {
        return $this->hasOne(Student::class);
    }
}
