<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class FollowsController extends Controller
{
    public function followList(User $user, Post $post, Follow $follow)
    {
        $user = auth()->user();
        $followCount = $follow->getFollowCount($user->id);
        $followerCount = $follow->getFollowerCount($user->id);

        $followersId = Follow::where('follow_id', $user->id)->pluck('follower_id')->toArray();
        $followIdLists = User::find($followersId);
        $timelines = $post->getFollowTimelines($followersId);

        return view('follows.followList')
            ->with([
                'followIdLists' => $followIdLists,
                'timelines' => $timelines,
                'followCount' => $followCount,
                'followerCount' => $followerCount,
            ]);
    }
    public function followerList(User $user, Post $post, Follow $follow)
    {
        $user = auth()->user();
        $followCount = $follow->getFollowCount($user->id);
        $followerCount = $follow->getFollowerCount($user->id);

        $followersId = Follow::where('follower_id', $user->id)->pluck('follow_id')->toArray();
        $followIdLists = User::find($followersId);
        $timelines = $post->getFollowTimelines($followersId);

        return view('follows.followerList')
            ->with([
                'followIdLists' => $followIdLists,
                'timelines' => $timelines,
                'followCount' => $followCount,
                'followerCount' => $followerCount,
            ]);
    }
}
