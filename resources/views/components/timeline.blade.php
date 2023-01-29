<div id="timelines-wrapper">
    @foreach ($timelines as $timeline)
        <div class=timeline-wrapper>
            <div class="user-items">
                <div class="users-icon">
                    <a href="{{ asset('profile/' . $timeline->user->id) }}">
                        <img src="{{ asset('images/' . $timeline->user->image) }}" width="45" height="45"
                            class="rounded-circle">
                    </a>
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
