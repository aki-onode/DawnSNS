<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

use App\Http\Requests\ProfileRequest;

class UsersController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('users.profile')
            ->with([
                'user' => $user,
            ]);
    }

    public function edit(ProfileRequest $request)
    {
        if ($request->isMethod('patch')) {

            $user = Auth::user();
            $data = $request->all();

            $user->fill([
                'username' => $data['username'],
                'mail' => $data['mail'],
                'password' => Hash::make($data['password']),
                'bio' => $data['bio'],
            ]);

            if (isset($data['image'])) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/images', $fileName);
                Image::make($file)->resize(55, 55)->save(public_path('images/' . $fileName));
                $user->fill([
                    'image' => $fileName,
                ]);
            }
            $user->save();
        }
        return redirect()->route('user.profile');
    }

    public function search(User $user, Request $request)
    {
        $search = $request->input('username');

        if ($request->has('username') && $search != '') {
            $users = User::where('username', 'like', "%{$search}%")->where('id', '<>', $user->id)->get();
            $data = $users;
        } else {
            $users = $user->getAllUsers(Auth::id());
            $data = $users;
        }

        return view('users.search')->with([
            'user' => $user,
            'users' => $users,
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function follow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);

        if (!$is_following) {
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);

        if ($is_following) {
            $follower->unfollow($user->id);
            return back();
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $timelines = Post::where('user_id', $id)->get();

        return view('users.show')
            ->with([
                'user' => $user,
                'timelines' => $timelines,
            ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show.login');
    }
}
