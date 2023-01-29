<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'mail',
        'password',
        'bio',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function getAllUsers(Int $user_id)
    {
        return $this->where('id', '<>', $user_id)->paginate(10);
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'follow_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'follow_id', 'follower_id');
    }

    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('follower_id', $user_id)->exists();
    }

    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('follow_id', $user_id)->exists();
    }
}
