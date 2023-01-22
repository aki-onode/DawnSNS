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

    public function getTimelines(Int $user_id, array $following_id)
    {
        $following_id[] = $user_id;
        return $this->whereIn('user_id', $following_id)->latest()->paginate(50);
    }
}
