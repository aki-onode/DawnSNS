@extends('layouts.login')

@section('content')
    <div id="posts-create-wrapper">
        <form method="POST" action="{{ route('create.posts') }}" class="form-wrapper">
            @csrf
            <div class="user-icon">
                <img src="{{ asset('images/' . Auth::user()->image) }}" width="45" height="45">
            </div>
            <div class="posts-create">
                <label>
                    <textarea name="newPost" placeholder="何をつぶやこうか...？"></textarea>
                </label>
                <button type="submit" class="posts-button">
                    <img src="{{ asset('images/post.png') }}" alt="投稿" width="30" height="28">
                </button>
            </div>
        </form>
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
                <div class="timeline-button-wrapper">
                    @if (Auth::id() === $timeline->user_id)
                        <div class="button-items">
                            <button class="edit-button" data-target="edit-post-{{ $timeline->id }}">
                                <img id="open-modal" src="{{ asset('images/edit.png') }}">
                            </button>
                        </div>
                        <div class="button-items">
                            <form method="post" action="{{ route('delete.posts', $timeline->id) }}">
                                @method('delete')
                                @csrf
                                <button class="delete-button" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"></button>
                            </form>
                        </div>

                        <div class="edit-modal-wrapper" id="edit-post-{{ $timeline->id }}">
                            <div class="modal">
                                <div class="close-modal">
                                    <i class="fa fa-2x fa-times" id="close-modal"></i>
                                </div>
                                <div id="edit-modal">
                                    <div class="users-icon">
                                        <img src="images/{{ $timeline->user->image }}" width="45" height="45">
                                    </div>
                                    <div class="edit-timeline-info">
                                        <p>{{ $timeline->user->username }}</p>
                                        <p>{{ $timeline->created_at }}</p>
                                    </div>
                                    <form method="post" action="{{ route('edit.posts', $timeline->id) }}"
                                        class="edit-form-items">
                                        @method('patch')
                                        @csrf
                                        <label>
                                            <input type="hidden" name="id" value="{{ $timeline->id }}">
                                        </label>
                                        <label>
                                            <textarea name="editPost" class="edit-post">{{ $timeline->post }}</textarea>
                                        </label>
                                        <label>
                                            <input id="submit-button" type="submit" value="編集">
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
