<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(User $user, Post $post, Follow $follow)
    {

        $user = auth()->user();
        $followCount = $follow->getFollowCount($user->id);
        $followerCount = $follow->getFollowerCount($user->id);

        return view('posts.index')->with([
            'followCount' => $followCount,
            'followerCount' => $followerCount,
        ]);
    }
}
