<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Post $post, Follow $follow)
    {
        $followerId = $follow->getFollowId(Auth::id());
        $followingId = $followerId->pluck('follower_id')->toArray();

        $timelines = $post->getTimelines(Auth::id(), $followingId);

        return view('posts.index')->with([
            'timelines' => $timelines,
        ]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        Post::create([
            'user_id' => Auth::id(),
            'post' => $post,
        ]);

        return redirect()->route('user.home');
    }

    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->delete();

        return redirect()->route('user.home');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $editPost = $request->input('editPost');
        DB::table('posts')->where('id', $id)->update(['post' => $editPost]);

        return redirect()->route('user.home');
    }
}
