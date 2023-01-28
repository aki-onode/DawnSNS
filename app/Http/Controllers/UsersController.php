<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class UsersController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function search(User $user, Follow $follow, Request $request)
    {
        $user = auth()->user();
        $search1 = $request->input('username');

        $followCount = $follow->getFollowCount($user->id);
        $followerCount = $follow->getFollowerCount($user->id);

        if ($request->has('username') && $search1 != '') {
            $users = User::where('username', 'like', "%{$search1}%")->where('id', '<>', $user->id)->get();
            $data = $users;
        } else {
            $users = $user->getAllUsers(auth()->user()->id);
            $data = $users;
        }

        return view('users.search')->with([
            'user' => $user,
            'users' => $users,
            'followCount' => $followCount,
            'followerCount' => $followerCount,
            'data' => $data,
            'search1' => $search1,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show.login');
    }
}
