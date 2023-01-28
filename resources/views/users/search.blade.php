@extends('layouts.login')

@section('content')
    <div class="search-wrapper">
        <div class="search-form-wrapper">
            <form method="get" action="{{ route('search.users') }}" class="search-form-items">
                @csrf
                <label>
                    <input type="text" class="search-form" placeholder="ユーザー名" name="username" value="{{ old('username') }}">
                </label>
                <label>
                    <button type="submit" class="search-button fa fa-search fa-rotate-90"></button>
                </label>
            </form>
        </div>
        <div class="search-result-wrapper">
            @if (!empty($data))
                @foreach ($data as $userItem)
                    <div class="search-list-wrapper">
                        <div class="search-list-items">
                            <div class="search-list-image">
                                <img src="images/{{ $userItem->image }}" class="rounded-circle" width="50"
                                    height="50">
                            </div>
                            <div class="search-list-name">
                                <p class="search-username">{{ $userItem->username }}</p>
                            </div>
                        </div>
                        <div class="follow-button">
                            @if (auth()->user()->isFollowing($userItem->id))
                                <form method="post" action="{{ route('unfollow.user', $userItem->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="follow-button btn-red">フォローをはずす</button>
                                </form>
                            @else
                                <form action="{{ route('follow.user', $userItem->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="follow-button btn-blue">フォローする</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
