<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Post $post, Follow $follow)
    {
        $followId = $follow->getFollowId(Auth::id());
        $followingId = $followId->pluck('follower_id')->toArray();
        $timelines = $post->getTimelines(Auth::id(), $followingId);

        return view('posts.index', compact('timelines'));
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
        Post::where('id', $id)->delete();

        return redirect()->route('user.home');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $editPost = $request->input('editPost');
        Post::where('id', $id)->update(['post' => $editPost]);

        return redirect()->route('user.home');
    }
}
