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
                    <textarea name="newPost" placeholder="何をつぶやこうか...？"></textarea>
                </label>
                <button type="submit" class="posts-button">
                    <img src="{{ asset('images/post.png') }}" alt="投稿">
                </button>
            </div>
        </form>
    </div>
    <div id="timelines-wrapper">
        @foreach ($timelines as $timeline)
            <div class=timeline-wrapper>
                <div class="users-icon">
                    <img src="/images/dawn.png" alt="">
                </div>
                <div class="timeline-items">
                    <div class="timeline-info">
                        <p>{{ $timeline->user->username }}</p>
                        <p>{{ $timeline->created_at }}</p>
                    </div>
                </div>
                <div class="timeline">
                    <p>{!! nl2br(e($timeline->post)) !!}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
