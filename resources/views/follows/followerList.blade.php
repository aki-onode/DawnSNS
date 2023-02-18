@extends('layouts.login')

@section('content')
    <div class="follower-lists-wrapper">
        <div class="follower-lists">
            <div class="follower-list-title">
                <h2>Follower list</h2>
            </div>
            <div class="follower-image-wrapper">
                @foreach ($followerIdLists as $followerIdList)
                    <div class="follower-images">
                        <a href="profile/{{ $followerIdList->id }}">
                            <img src="images/{{ $followerIdList->image }}" class="rounded-circle">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @component('components.timeline')
            @slot('timelines', $timelines)
        @endcomponent
    </div>
@endsection
