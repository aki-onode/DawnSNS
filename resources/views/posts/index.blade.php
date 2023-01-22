@extends('layouts.login')

@section('content')
    <div id="posts-create-wrapper">
        <form method="POST" action="{{ route('edit.posts') }}" class="form-wrapper">
            @csrf
            <div class="user-icon">
                <img src="images/{{ Auth::user()->image }}" width="51" height="51">
            </div>
            <div class="posts-create">
                <label>
                    <textarea name="posts" placeholder="何をつぶやこうか...？"></textarea>
                </label>
                <button type="submit" class="posts-button">
                    <img src="{{ asset('images/post.png') }}" alt="投稿">
                </button>
            </div>
        </form>
    </div>
@endsection
