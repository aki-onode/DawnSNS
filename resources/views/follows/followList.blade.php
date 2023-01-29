@extends('layouts.login')

@section('content')
    <div class="follow-lists-wrapper">
        <div class="follow-lists">
            <div class="follow-list-title">
                <h2>Follow list</h2>
            </div>
            <div class="follow-image-wrapper">
                @foreach ($followIdLists as $followIdList)
                    <div class="follow-images">
                        <a href="profile/{{ $followIdList->id }}">
                            <img src="images/{{ $followIdList->image }}" class="rounded-circle">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="timelines-wrapper">
            @foreach ($timelines as $timeline)
                <div class=timeline-wrapper>
                    <div class="user-items">
                        <div class="users-icon">
                            <img src="images/{{ $timeline->user->image }}" width="45" height="45">
                        </div>
                        <div class="timeline-items">
                            <div class="timeline-info">
                                <p>{{ $timeline->user->username }}</p>
                                <p>{{ $timeline->created_at }}</p>
                            </div>
                            <div class="post">
                                <p>{!! nl2br(e($timeline->post)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
