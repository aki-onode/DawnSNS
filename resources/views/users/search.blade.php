@extends('layouts.login')

@section('content')
    <div class="search-wrapper">
        <div class="search-form-wrapper">
            <form method="get" action="{{ route('search.users') }}" class="search-form-items">
                @csrf
                <label>
                    <input type="text" class="search-form" placeholder="ユーザー名" name="username">
                </label>
                <label>
                    <button type="submit" class="search-button fa fa-search fa-rotate-90"></button>
                </label>
            </form>
            <div class="search-word-wrapper">
                @if (isset($search))
                    <p>検索ワード：{{ $search }}</p>
                @endif
            </div>
        </div>
        <div class="search-result-wrapper">
            @if (!empty($data))
                @foreach ($data as $userItem)
                    <div class="search-list-wrapper">
                        <div class="search-list-items">
                            <div class="search-list-image">
                                <a href="{{ asset('profile/' . $userItem->id) }}">
                                    <img src="images/{{ $userItem->image }}" class="rounded-circle" width="50"
                                        height="50">
                                </a>
                            </div>
                            <div class="search-list-name">
                                <p class="search-username">{{ $userItem->username }}</p>
                            </div>
                        </div>
                        @component('components.follow_button')
                            @slot('id', $userItem->id)
                        @endcomponent
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
