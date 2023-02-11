<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTimelines(Int $userId, array $followingId)
    {
        $followingId[] = $userId;
        return $this->whereIn('user_id', $followingId)->latest()->paginate(50);
    }

    public function getFollowTimelines(array $followId)
    {
        return $this->whereIn('user_id', $followId)->latest()->paginate(50);
    }
}
