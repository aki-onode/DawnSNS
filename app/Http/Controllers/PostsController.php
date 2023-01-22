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

        $followerId = $follow->getFollowId($user->id);
        $followingId = $followerId->pluck('follower_id')->toArray();

        $timelines = $post->getTimelines($user->id, $followingId);

        $followCount = $follow->getFollowCount($user->id);
        $followerCount = $follow->getFollowerCount($user->id);

        return view('posts.index')->with([
            'timelines' => $timelines,
            'followCount' => $followCount,
            'followerCount' => $followerCount,
        ]);
    }

    public function edit(Request $request)
    {
        $post = $request->input('newPost');
        Post::create([
            'user_id' => Auth::id(),
            'post' => $post,
        ]);

        return redirect()->route('user.home');
    }
}
