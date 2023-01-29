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
        @component('components.timeline')
            @slot('timelines', $timelines)
        @endcomponent
    </div>
@endsection
