@extends('layouts.login')

@section('content')
    <div class="oth-user-wrapper">
        <div>

        </div>
        <div class="oth-user">
            <div class="oth-user-items">
                <div class="oth-user-image">
                    <img src="{{ asset('images/' . $user->image) }}" class="rounded-circle" width="45" height="45">
                </div>
                <div class="oth-user-profile">
                    <div class="oth-column">
                        <p>Name</p>
                        <p>Bio</p>
                    </div>
                    <div class="oth-field">
                        <p>{{ $user->username }}</p>
                        <p>{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
            <div class="oth-button">
                @component('components.follow_button')
                    @slot('id', $user->id)
                @endcomponent
            </div>
        </div>
        @component('components.timeline')
            @slot('timelines', $timelines)
        @endcomponent
    </div>
@endsection
