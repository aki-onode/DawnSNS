<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'follow_id',
        'follower_id',
    ];

    public function getFollowId($userId)
    {
        return $this->where('follow_id', $userId)->select('follower_id')->get();
    }
}
